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
                                    <h4 class="mb-0 font-size-18">ធ្វើបច្ចប្បន្នភាពប្រភេទសៀវភៅ</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">ទំព័រដើម</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">គ្រប់គ្រងសៀវភៅ</a></li>
                                            <li class="breadcrumb-item active">ធ្វើបច្ចប្បន្នភាពប្រភេទសៀវភៅ</li>
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
                                        <form action="{{ route('update_book_category',$book_category_detail[0]->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-md-12 col-form-label">ប្រភេទសៀវភៅ</label>
                                                <div class="col-md-12">
                                                    <input name="book_category" class="form-control" type="text" placeholder="បញ្ជូលប្រភេទសៀវភៅ" value="{{ $book_category_detail[0]->book_category }}">
                                                    @error('book_author')
                                                        <span style="font-size:16px;" class="text-danger">{{ $message }}</span>
                                                    @enderror 
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <input type="submit" class="btn btn-primary"  value="ធ្វើបច្ចប្បន្នភាព">
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