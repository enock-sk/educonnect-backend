<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TransferMySQLData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transfer:mysql-sqlite';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transfer data from MySQL to SQLite database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting data transfer from MySQL to SQLite...');
        
        $tables = ['users', 'courses', 'enrollments'];

        foreach ($tables as $table) {
            try {
                // Clear existing data in SQLite
                DB::connection('sqlite')->table($table)->truncate();
                $this->info("Cleared existing data from {$table} table in SQLite.");
                
                // Get data from MySQL
                $data = DB::connection('mysql')->table($table)->get();
                $this->info("Found " . $data->count() . " records in {$table} table from MySQL.");

                // Insert data into SQLite
                foreach ($data as $row) {
                    DB::connection('sqlite')->table($table)->insert((array) $row);
                }

                $this->info("✔ {$table} data migrated successfully.");
            } catch (\Exception $e) {
                $this->error("✗ Failed to migrate {$table}: " . $e->getMessage());
                return 1;
            }
        }

        $this->info('✔ All data transferred successfully from MySQL to SQLite!');
        return 0;
    }
}
