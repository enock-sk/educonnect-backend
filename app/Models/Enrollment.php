<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrollment extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'user_id',
        'course_id',
        'status',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the user that owns the enrollment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the course that the enrollment belongs to.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
