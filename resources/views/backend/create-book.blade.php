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
                            <h4 class="mb-0 font-size-18">បន្ថែមសៀវភៅថ្មី</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">ទំព័រដើម</a></li>
                                    <li class="breadcrumb-item active">បន្ថែមសៀវភៅថ្មី</li>
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
                                    <form action="{{ route('store_book') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label">លេខកូដសម្គាល់</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" name="book_id" type="text" placeholder="បញ្ជូលលេខកូដសម្ងាត់" value="{{ $book_id_generator }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label">ចំណងជើង</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" name="book_title" type="text" value="{{ old('book_title') }}" placeholder="បញ្ជូលចំណងជើងសៀវភៅ" >
                                                        @error('book_title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label">ប្រភេទសៀវភៅ</label>
                                                    <div class="col-md-10">
                                                        <select name="book_categories" class="form-control">
                                                            <option disabled selected>ជ្រើសរើសប្រភេទសៀវភៅ</option>
                                                            @foreach($book_categories as $bCategory)
                                                                <option value="{{ $bCategory->id }}">{{ $bCategory->book_category }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('book_categories')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label">ការបោះពុម្ពលើកទី</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" name="book_edition" value="{{ old('book_edition') }}" type="text" placeholder="បញ្ជូលការបោះពុម្ពលើកទី">
                                                        @error('book_edition')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-url-input" class="col-md-2 col-form-label">ឈ្មោះអ្នកនិពន្ធ</label>
                                                    <div class="col-md-10">
                                                        <select name="book_author" class="form-control">
                                                            <option disabled selected>ជ្រើសរើសឈ្មោះអ្នកនិពន្ធ</option>
                                                            @foreach($book_authors as $bAuthor)
                                                                <option value="{{ $bAuthor->id }}">{{ $bAuthor->book_author }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('book_author')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-url-input" class="col-md-2 col-form-label">អ្នកបោះពុម្ព</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" name="book_publisher" type="text" placeholder="បញ្ជូលឈ្មោះអ្នកបោះពុម្ព" value="{{ old('book_publisher') }}" >
                                                        @error('book_publisher')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-url-input" class="col-md-2 col-form-label">ចំនួនកុពី</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" name="book_copies" type="text" placeholder="បញ្ជូលចំនួនកុពី" value="{{ old('book_copies') }}" >
                                                        @error('book_copies')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-tel-input" class="col-md-2 col-form-label">ប្រភពសៀវភៅ</label>
                                                    <div class="col-md-10">
                                                        <input class="form-control" name="book_source" type="tel" placeholder="បញ្ជូលប្រភពសៀវភៅ" value="{{ old('book_source') }}" >
                                                        @error('book_source')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-2"></div>
                                                    <div class="col-md-10">
                                                        <input class="btn btn-primary" type="submit" value="បញ្ចូលថ្មី">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label for="">គម្របសៀវភៅ</span></label>
                                                    <div class="file-upload">
                                                        <div class="image-upload-wrap">
                                                            <input name="book_cover" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
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