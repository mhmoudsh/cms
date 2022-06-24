<?php

namespace App\Http\Controllers\Courses;
use Illuminate\Http\Request;
use App\Models\Courses\lecturer;
use Illuminate\Routing\Controller;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($request->ajax()){
        $data = lecturer::select([
        'id',
        'lecturer_email',
        'lecturer_phone',
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
        ->addColumn('action', function ($row) {
        $btn = '<a href="' . route('tender.show', [$row->id]) . '" class="dropdown-item" title="view"
            style="display: contents">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-file-text font-small-4 mr-50">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
                <polyline points="10 9 9 9 8 9"></polyline>
            </svg></a>';
        ->addColumn('action',function ($row){
        $btn = '<a href="'.route('course.edit',[$row->id]).'"
            class="edit btn btn-primary btn-sm editcourse">'.__('messages.edit').'</a>';
        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'"
            data-original-title="Delete" class="btn btn-danger btn-sm deletecourse">'.__('messages.delete').'</a>';
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courses\lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show(lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courses\lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit(lecturer $lecturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courses\lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lecturer $lecturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courses\lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(lecturer $lecturer)
    {
        //
    }
}
