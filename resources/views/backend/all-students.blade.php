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
                                                        <a href="{{ route('edit_student',$student->id) }}" class="btn btn-info"><span style="font-size: 18px;" class="mdi mdi-pencil"></span></a>
                                                        <a href="{{ route('delete_student',$student->id) }}" class="btn btn-warning"><span style="font-size: 18px;" class="mdi mdi-delete"></span></a>
                                                        <a href="{{ route('force_delete_student',$student->id) }}" onclick="return confirm('​តើអ្នកពិតជាចង់លុបទិន្នន័យនេះ?')" class="btn btn-danger"><span style="font-size: 18px;" class="mdi mdi-delete-empty"></span></a>
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