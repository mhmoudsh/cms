<?php

namespace App\Models\Courses;

use App\Models\Courses\Course;
use App\Models\Courses\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class lecturer extends Model
{
    use HasFactory;
     protected $guarded = [];
    public function course()
    {
        return $this->belongstoMany(Course::class, 'courses__lecturer__students', 'lecturer_id', 'course_id', 'id', 'id');
    }

    public function student()
    {
        return $this->belongstoMany(Student::class, 'courses__lecturer__students', 'lecturer_id', 'student_id', 'id', 'id');
    }
}
