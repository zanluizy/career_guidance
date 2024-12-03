<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    // Fillable properties
    protected $fillable = [
        'student_id',
        'course_id',
        'institution_id',
        'status', // E.g., 'admitted', 'rejected', 'pending'
    ];

    // Define relationships

    // An admission belongs to a student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // An admission belongs to a course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // An admission belongs to an institution
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
