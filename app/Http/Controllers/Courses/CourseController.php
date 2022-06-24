<?php

namespace App\Http\Controllers\Courses;
use Illuminate\Http\Request;
use App\Models\Courses\Course;
use Illuminate\Routing\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Courses\CourseCategorie;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
        if ($request->ajax()){
            $data = Course::select([
                'id',
                'course_name',
                'course_price',
                /* 'name_'.LaravelLocalization::getCurrentLocale().' as name', */
            ])/* ->orderby('course_name', 'asc')->get() */;
            return DataTables::of($data)
                ->addIndexColumn()
                /* ->addColumn('parentCategories' , function (Category $category){
                    if($category->parent != null) {
                        if (LaravelLocalization::getCurrentLocale() == 'en') {
                            return $category->parent->name_en;
                        } else if (LaravelLocalization::getCurrentLocale() == 'ar') {
                            return $category->parent->name_ar;
                        } else {
                            return $category->parent->name_fr;
                        }
                    }
                    return '-';
                }) */
                
                ->addColumn('action',function ($row){
                    $btn = '<a href="'.route('course.edit',[$row->id]).'" class="edit btn btn-primary btn-sm editcourse">'.__('messages.edit').'</a>';
                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletecourse">'.__('messages.delete').'</a>';
                    return $btn;
                })
                ->rawColumns(['course','action'])
                ->make(true);
        }

       return view('Course_system.courses.courses_index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(CourseCategorie::all());
        return view('Course_system.courses.course_add',[
            'categories'=> CourseCategorie::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
         Course::Create(
         [
         'course_name'=>$request->course_name,
         'course_description'=>$request->course_description,
         'course_price'=>$request->course_price,
         'category_id'=>$request->category_id,

         ]);
         return redirect()->route('course.index')->with(['success' => __('messages.user saved
         successfully')]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courses\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        /* $course = Course::find($id);
        return view('Course_system.courses.course_edit',[
            'course'=>$course ,
            'categories'=> CourseCategorie::all(),
        ]); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courses\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('Course_system.courses.course_edit',[
        'course'=>$course ,
        'categories'=> CourseCategorie::all(),
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courses\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {

        $course->update([
        'course_name'=>$request->course_name,
        'course_description'=>$request->course_description,
        'course_price'=>$request->course_price,
        'category_id'=>$request->category_id,

        ]);
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courses\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $course = Course::find($id);
       // $image = $course->image;
       // Storage::disk('photos')->delete($image);
       $course->delete();
       return response()->json(['success'=>__('messages.user deleted successfully.')]);;
    }
}
