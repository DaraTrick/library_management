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
                                    <h4 class="mb-0 font-size-18">ចុះឈ្មោះអ្នកប្រើប្រាស់</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">ទំព័រដើម</a></li>
                                            {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">គ្រប់គ្រងសិស្ស</a></li> --}}
                                            <li class="breadcrumb-item active">ចុះឈ្មោះអ្នកប្រើប្រាស់</li>
                                        </ol>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row m-auto">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('register_submit') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group row">
                                                        <label class="col-md-12 col-form-label">លេខសម្គាល់</label>
                                                        <div class="col-md-12">
                                                            <input name="staff_id" class="form-control" type="text" placeholder="បញ្ជូលលេខសម្គាល់" value="{{ $staff_id }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-12 col-form-label">ឈ្មោះអ្នកប្រើប្រាស់</label>
                                                        <div class="col-md-12">
                                                            <input name="username" class="form-control" type="text" placeholder="បញ្ជូលឈ្មោះអ្នកប្រើប្រាស់" value="{{ old('username') }}">
                                                            @error('username')
                                                                <span style="font-size:16px;" class="text-danger">{{ $message }}</span>
                                                            @enderror 
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-12 col-form-label">លេខទូរស័ព្ទ</label>
                                                        <div class="col-md-12">
                                                            <input name="user_contact" class="form-control" type="text" placeholder="បញ្ចូលលេខទូរស័ព្ទ" value="{{ old('user_contact') }}">
                                                            @error('user_contact')
                                                                <span style="font-size:16px;" class="text-danger">{{ $message }}</span>
                                                            @enderror 
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-12 col-form-label">អ៊ីម៉ែល</label>
                                                        <div class="col-md-12">
                                                            <input name="user_email" class="form-control" type="text" placeholder="បញ្ជូលអុីម៉ែល" value="{{ old('user_email') }}">
                                                            @error('user_email')
                                                                <span style="font-size:16px;" class="text-danger">{{ $message }}</span>
                                                            @enderror 
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-12 col-form-label">អាសយដ្ឋាន</label>
                                                        <div class="col-md-12">
                                                            
                                                            <textarea name="user_address" class="form-control" type="text" placeholder="បញ្ជូលអាសយដ្ឋាន" rows="5">{{ old('user_address') }}</textarea>
                                                            @error('user_address')
                                                                <span style="font-size:16px;" class="text-danger">{{ $message }}</span>
                                                            @enderror 
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-12 col-form-label">ពាក្យសម្ងាត់</label>
                                                        <div class="col-md-12">
                                                            <input name="user_password" class="form-control" type="password" placeholder="បញ្ជូលពាក្យសម្ងាត់" value="{{ old('user_password') }}">
                                                            @error('user_password')
                                                                <span style="font-size:16px;" class="text-danger">{{ $message }}</span>
                                                            @enderror 
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-12 col-form-label">មុខងារ</label>
                                                        <div class="col-md-12">
                                                            <select name="user_role" class="form-control">
                                                                <option disabled selected>ជ្រើសរើសមុខងារ</option>
                                                                <option value="1">បណ្ណារក្ស</option>
                                                                <option value="2">សិស្ស</option>
                                                            </select>
                                                            {{-- <input name="user_role" class="form-control" type="text" placeholder="បញ្ជូលឈ្មោះអ្នកនិពន្ធ" value="{{ old('user_role') }}"> --}}
                                                            @error('user_role')
                                                                <span style="font-size:16px;" class="text-danger">{{ $message }}</span>
                                                            @enderror 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group mb-3">
                                                        <label for="">រូបថត ( Optional )</span></label>
                                                        <div class="file-upload">
                                                            <div class="image-upload-wrap">
                                                                <input name="user_photo" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                                                <div class="drag-text">
                                                                    <h3>Drag and drop a file or select add Image</h3>
                                                                </div>
                                                            </div>
                                                            <div class="file-upload-content">
                                                                <img class="file-upload-image" src="#" alt="your image" />
                                                                <div class="image-title-wrap">
                                                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('book_cover')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <input type="submit" class="btn btn-primary"  value="ចុះឈ្មោះ">
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