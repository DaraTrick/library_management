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
                                    <h4 class="mb-0 font-size-18">សិស្សទាំងអស់</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">ទំព័រដើម</a></li>
                                            <li class="breadcrumb-item active">សិស្សទាំងអស់</li>
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
                                        
                                        

           
            <!-- Nav tabs -->
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab">
                        <i class="dripicons-home mr-1 align-middle"></i> <span class="d-none d-md-inline-block">សិស្ស</span> 
                    </a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab">
                        <i class="dripicons-user mr-1 align-middle"></i> <span class="d-none d-md-inline-block">សៀវភៅ</span>
                    </a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-toggle="tab" href="#messages-1" role="tab">
                        <i class="dripicons-mail mr-1 align-middle"></i> <span class="d-none d-md-inline-block">ការខ្ចីសៀវភៅ</span>
                    </a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-toggle="tab" href="#settings-1" role="tab">
                        <i class="dripicons-gear mr-1 align-middle"></i> <span class="d-none d-md-inline-block">អ្នកប្រើប្រាស់</span>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-3">
                <div class="tab-pane active" id="home-1" role="tabpanel">
                    <table id="datatable-buttons" class="table table-bordered table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>លេខសម្គាល់</th>
                                <th>នាមត្រកូល</th>
                                <th>នាមខ្លួន</th>
                                <th>ភេទ</th>
                                <th>មុខវិជ្ជា</th>
                                <th>ឆ្នាំទី</th>
                                <th>ថ្ងៃខែឆ្នាំកំណើត</th>
                                <th>លេខទូរស័ព្ទ</th>
                                <th>អ៊ីម៉ែល</th>
                                <th>ប៊ូតុង</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($trashed_students as $student)
                            <tr>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->stfname }}</td>
                                <td>{{ $student->stlname }}</td>
                                <td>{{ $student->stgender }}</td>
                                <td>{{ $student->rCourse->course }}</td>
                                <td>{{ $student->rGrade->grade }}</td>
                                <td>{{ $student->stDOB }}</td>
                                <td>{{ $student->stphone }}</td>
                                <td>{{ $student->stemail }}</td>
                                <td>
                                    <a href="{{ route('restore_student',$student->id) }}" class="btn btn-info"><span class="mdi mdi-pencil"></span>ស្តារ</a>
                                    <a href="{{ route('force_delete_student',$student->id) }}" onclick="return confirm('​តើអ្នកពិតជាចង់លុបទិន្នន័យនេះ?')" class="btn btn-danger"><span class="mdi mdi-delete-empty"></span>លុប</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="profile-1" role="tabpanel">
                    {{-- <table id="datatable-buttons" class="table table-bordered table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                                    <a href="{{ route('edit_book',$book->id) }}" class="btn btn-info" style="margin:5px 0;"><span class="mdi mdi-pencil"></span></a>
                                    <a href="{{ route('delete_book',$book->id) }}" onclick="return confirm('​តើអ្នកពិតជាចង់លុបទិន្នន័យនេះ?')" class="btn btn-danger"><span class="mdi mdi-delete"></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                </div>
                <div class="tab-pane" id="messages-1" role="tabpanel">
                    <p class="mb-0">
                        Etsy mixtape wayfarers, ethical wes anderson tofu before they
                        sold out mcsweeney's organic lomo retro fanny pack lo-fi
                        farm-to-table readymade. Messenger bag gentrify pitchfork
                        tattooed craft beer, iphone skateboard locavore carles etsy
                        salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                        Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                        mi whatever gluten carles.
                    </p>
                </div>
                <div class="tab-pane" id="settings-1" role="tabpanel">
                    <p class="mb-0">
                        Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                        art party before they sold out master cleanse gluten-free squid
                        scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                        art party locavore wolf cliche high life echo park Austin. Cred
                        vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                        farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                        mustache.
                    </p>
                </div>
            </div>


                                        {{-- <table id="datatable-buttons" class="table table-bordered table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="bg-dark text-white">
                                                <tr>
                                                    <th>លេខសម្គាល់</th>
                                                    <th>នាមត្រកូល</th>
                                                    <th>នាមខ្លួន</th>
                                                    <th>ភេទ</th>
                                                    <th>មុខវិជ្ជា</th>
                                                    <th>ឆ្នាំទី</th>
                                                    <th>ថ្ងៃខែឆ្នាំកំណើត</th>
                                                    <th>លេខទូរស័ព្ទ</th>
                                                    <th>អ៊ីម៉ែល</th>
                                                    <th>ប៊ូតុង</th>
                                                </tr>
                                            </thead>
        
                                            <tbody>
                                                @foreach($students as $student)
                                                <tr>
                                                    <td>{{ $student->student_id }}</td>
                                                    <td>{{ $student->stfname }}</td>
                                                    <td>{{ $student->stlname }}</td>
                                                    <td>{{ $student->stgender }}</td>
                                                    <td>{{ $student->rCourse->course }}</td>
                                                    <td>{{ $student->rGrade->grade }}</td>
                                                    <td>{{ $student->stDOB }}</td>
                                                    <td>{{ $student->stphone }}</td>
                                                    <td>{{ $student->stemail }}</td>
                                                    <td>
                                                        <a href="{{ route('edit_student',$student->id) }}" class="btn btn-info"><span class="mdi mdi-pencil"></span></a>
                                                        <a href="{{ route('delete_student',$student->id) }}" onclick="return confirm('​តើអ្នកពិតជាចង់លុបទិន្នន័យនេះ?')" class="btn btn-danger"><span class="mdi mdi-delete"></span></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table> --}}
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



