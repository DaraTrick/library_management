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
                                    <h4 class="mb-0 font-size-18">បញ្ជីព័ត៌មានសៀវភៅ</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">ទំព័រដើម</a></li>
                                            <li class="breadcrumb-item active">បញ្ជីព័ត៌មានសៀវភៅ</li>
                                        </ol>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <table id="datatable-buttons" class="table table-bordered table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="bg-dark text-white">
                                                <tr>
                                                    <th>លេខសម្គាល់</th>
                                                    <th>ចំណងជើង</th>
                                                    <th>ប្រភេទសៀវភៅ</th>
                                                    <th>ការបោះពុម្ពលើកទី</th>
                                                    <th>ឈ្មោះអ្នកនិពន្ធ</th>
                                                    <th>អ្នកបោះពុម្ពផ្សាយ</th>
                                                    <th>ចំនួនកុពី</th>
                                                    <th>ចំណាំ</th>
                                                    <th>តម្លៃសៀវភៅ</th>
                                                    <th>គម្របសៀវភៅ</th>
                                                    <th>ប៊ូតុង</th>
                                                </tr>
                                            </thead>
        
                                            <tbody>
                                                @foreach($trashed_books as $book)
                                                <tr>
                                                    <td>{{ $book->book_id }}</td>
                                                    <td>{{ $book->book_title }}</td>
                                                    <td>{{ $book->rBookCategory->book_category }}</td>
                                                    <td>{{ $book->book_edition }}</td>
                                                    <td>{{ $book->rBookAuthor->book_author }}</td>
                                                    <td>{{ $book->book_publisher }}</td>
                                                    <td>{{ $book->book_copies }}</td>
                                                    <td>
                                                        @if($book->book_remark == 'InStock')
                                                            <span class="btn btn-success btn-sm no-pointer-events" style="cursor: text;">{{ $book->book_remark }}</span>
                                                        @else 
                                                            <span class="btn btn-danger btn-sm no-pointer-events" style="cursor: text;">{{ $book->book_remark }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $book->book_cost }}</td>
                                                    <td>
                                                        <img src="{{ asset('uploads/book_covers/'.$book->book_cover) }}" width="50px" alt="">
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('restore_book',$book->id) }}" class="btn btn-info" style="margin:5px 0;"><span class="mdi mdi-pencil"></span>ស្តារ</a>
                                                        <a href="{{ route('force_delete_book',$book->id) }}" onclick="return confirm('​តើអ្នកពិតជាចង់លុបទិន្នន័យនេះ?')" class="btn btn-danger"><span class="mdi mdi-delete-empty"></span>លុប</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



@endsection