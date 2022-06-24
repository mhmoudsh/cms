@extends('Course_system.layouts.app')
@section('title')
Course Managment
@stop
    @section('content')

    <div class="wrapper">



        <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
            <div class="container">
                <div class="row g-3 mb-3 align-items-center">

                    <div class="col text-md-end">
                        <a class="btn btn-primary" href="form-wizard-validate.html"><i
                                class="fa fa-long-arrow-left me-2"></i>Form wizard validate</a>

                    </div>
                </div>
            </div>
        </div>

        <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
            <div class="container">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Edit Course</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('course.update',$course->id) }}"
                                    method="POST" enctype="multipart/form-data" class="row g-3 ">
                                    @method('PUT')

                                    @csrf

                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <label class="form-label">Course Name</label>
                                        <fieldset class="form-icon-group left-icon position-relative">
                                            <input type="text" value="{{$course->course_name}}" name="course_name"
                                                class="form-control">
                                            <div class="form-icon position-absolute">
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <label class="form-label">Course Description</label>
                                        <fieldset class="form-icon-group left-icon position-relative">
                                            <input type="text" name="course_description"
                                                value="{{$course->course_description}}" class="form-control">
                                            <div class="form-icon position-absolute">
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <label class="form-label">Course Price</label>
                                        <fieldset class="form-icon-group left-icon position-relative">
                                            <input type="text" class="form-control" placeholder=""
                                                value="{{$course->course_price}}" name="course_price"
                                                id="course_price">
                                            <div class="form-icon position-absolute">
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                                        <label class="form-label">Categroy</label>
                                        <div class="input-group">
                                            <select name="category_id" id="category_id" class="form-control">
                                                @foreach($categories as $item)
                                                    <option @if($item->id == old('category_id')) selected @endif
                                                        value="{{ $item->id }}">{{ $item->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 form-group mt-3">
                                            <button class="btn btn-primary">Save</button>
                                            <a onclick="history.back()" class="btn btn-outline-secondary">Cancle</a>
                                        </div>

                                </form>
                            </div>
                        </div>
                    </div>






                </div>


            </div>
        </div>


    </div>
    @stop
        @section('js')
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
 <script>
     var route_prefix = "/filemanager";
 </script>
<script>
    {
        !!\File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!
    }
</script>
<script>
    $('#lfm').filemanager('image', {
        prefix: route_prefix
    });
    // $('#lfm').filemanager('file', {prefix: route_prefix});
</script> -->
        @stop
