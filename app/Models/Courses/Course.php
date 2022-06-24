<?php

namespace App\Models\Courses;

use App\Models\Courses\Student;
use App\Models\Courses\lecturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];
   /*  protected $fillable = [
        'course_name', 'course_description', 'course_price', 'category_id',
    ]; */
    public function lecturer()
    {
        return $this->belongstoMany(lecturer::class,'courses__lecturer__students','course_id', 'lecturer_id', 'id','id');
    }

    public function student()
    {
        return $this->belongstoMany(Student::class,'courses__lecturer__students','course_id', 'student_id', 'id','id');
    }

}
