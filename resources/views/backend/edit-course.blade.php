@extends('backend.master')

@section('main-contain')

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('backend.shared.navbar-top');
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
                                    <h4 class="mb-0 font-size-18">គ្រប់គ្រងមុខវិជ្ជា</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">ទំព័រដើម</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">គ្រប់គ្រងសិស្ស</a></li>
                                            <li class="breadcrumb-item active">កែសម្រួលមុខវិជ្ជា</li>
                                        </ol>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('update_course',$course_detail[0]->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-md-12 col-form-label">លេខកូដសម្គាល់</label>
                                                <div class="col-md-12">
                                                    <input name="code_course" class="form-control" type="text" value="{{ $course_detail[0]->code_course }}"  disabled>
                                                    @error('code_course')
                                                        <span style="font-size:16px;" class="text-danger">{{ $message }}</span>
                                                    @enderror 
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-12 col-form-label">មុខវិជ្ជា</label>
                                                <div class="col-md-12">
                                                    <input name="course" class="form-control" type="text" placeholder="បញ្ជូលមុខវិជ្ជា" value="{{ $course_detail[0]->course }}">
                                                    @error('course')
                                                        <span style="font-size:16px;" class="text-danger">{{ $message }}</span>
                                                    @enderror 
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <input type="submit" class="btn btn-primary"  value="កែសម្រួល">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
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