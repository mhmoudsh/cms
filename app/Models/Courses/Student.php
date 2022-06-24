<?php

namespace App\Models\Courses;

use App\Models\Courses\Course;
use App\Models\Courses\lecturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
     protected $guarded = [];
    public function lecturer()
    {
        return $this->belongstoMany(lecturer::class, 'courses__lecturer__students', 'student_id', 'lecturer_id', 'id', 'id');
    }
    public function course()
    {
        return $this->belongstoMany(Course::class, 'courses__lecturer__students', 'student_id', 'course_id', 'id', 'id');
    }
}
