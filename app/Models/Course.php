<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Course extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'status',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the enrollments for the course.
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    /**
     * Get the users enrolled in this course.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'enrollments');
    }
}
