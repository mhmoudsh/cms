<?php

namespace App\Models\Courses;

use App\Models\Courses\Course;
use App\Models\Courses\lecturer;
use App\Models\Courses\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Courses_Lecturer_Student extends Model
{
    use HasFactory;
     protected $guarded = [];
     public function course()
    {
        return $this->belongsto(Course::class, 'course_id', 'id');
    }
     public function lecturer()
    {
        return $this->belongsto(lecturer::class, 'lecturer_id', 'id');
    }
     public function student()
    {
        return $this->belongsto(Student::class, 'student_id', 'id');
    }
}
