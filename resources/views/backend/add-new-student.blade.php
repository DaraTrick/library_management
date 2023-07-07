@extends('backend.master')

@section('main-contain')

 <!-- Begin page -->
 <div id="layout-wrapper">

    
    @include('backend.shared.navbar-top')

    @include('backend.shared.navbar-leftside')

            

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">បន្ថែមសិស្សថ្មី</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">ទំព័រដើម</a></li>
                                    <li class="breadcrumb-item active">បន្ថែមសិស្សថ្មី</li>
                                </ol>
                            </div>
                            
                        </div>
                    </div>
                </div>     
                <!-- end page title -->

                <div class="row">
                    
                    
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('store_student') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">លេខកូដសម្គាល់</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="student_id" type="text" placeholder="បញ្ជូលលេខកូដសម្ងាត់" value="{{ $student_id_generator }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">នាមត្រកូល</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="student_first_name" type="text" value="{{ old('student_first_name') }}" placeholder="បញ្ជូលនាមត្រកូល" value="">
                                                @error('student_first_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">នាមខ្លួន</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="student_last_name" value="{{ old('student_last_name') }}" type="text" placeholder="បញ្ជូលនាមខ្លួន" value="">
                                                @error('student_last_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">ភេទ</label>
                                            <div class="col-md-10 d-flex">
                                                <div class="custom-control custom-radio mr-5">
                                                    <input type="radio" id="customRadio2" name="student_gender" value="ប្រុស" class="custom-control-input" checked>
                                                    <label class="custom-control-label" for="customRadio2">ប្រុស</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="student_gender" value="ស្រី" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">ស្រី</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-url-input" class="col-md-2 col-form-label">ថ្ងៃខែឆ្នាំកំណើត</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="student_dob" type="date" placeholder="បញ្ជូលអាយុ" value="{{ old('student_dob') }}" >
                                                @error('student_dob')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">ឆ្នាំទី</label>
                                            <div class="col-md-10">
                                                <select class="custom-select" name="grade">
                                                    <option disabled selected>ជ្រើសរើសឆ្នាំទី</option>
                                                    @foreach($grades as $grade)
                                                    <option value="{{ $grade->id }}">{{ $grade->grade }}</option>
                                                    @endforeach
                                                </select>
                                                @error('student_year')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">មុខវិជ្ជា</label>
                                            <div class="col-md-10">
                                                <select class="custom-select" name="student_course">
                                                    <option disabled selected>ជ្រើសរើសមុខវិជ្ជាសិក្សា</option>
                                                    @foreach($courses as $course)
                                                        <option value="{{ $course->id }}">{{ $course->course }}</option>
                                                    @endforeach
                                                    @error('student_course')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-md-2 col-form-label">លេខទូរស័ព្ទ</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="student_phone" type="tel" placeholder="បញ្ជូលលេខទូរស័ព្ទ" value="{{ old('student_phone') }}" >
                                                @error('student_phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">អ៊ីម៉ែល</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="student_email" type="text" placeholder="បញ្ជូលអ៊ីម៉ែល" value="{{ old('student_email') }}" >
                                                @error('student_email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <label class="col-md-2 col-form-label">លេខកូដសម្ងាត់</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="student_password" type="password" placeholder="បញ្ជូលលេខកូដសម្ងាត់" value="{{ old('student_password') }}" >
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <div class="col-lg-2"></div>
                                            <div class="col-md-10">
                                                <input class="btn btn-primary" type="submit" value="បន្ថែមថ្មី">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                   
                    <!-- end col -->
                    

                    

                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

@endsection