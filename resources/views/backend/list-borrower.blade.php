@extends('backend.master')
@section('css')
{{-- select2 --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

{{-- datimepicker --}}

<style>
    .select2-selection__rendered {
    line-height: 31px !important;
}
.select2-container .select2-selection--single {
    height: 35px !important;
}
.select2-selection__arrow {
    height: 34px !important;
}

</style>
@endsection
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
                            <h4 class="mb-0 font-size-18">គ្រប់គ្រងការខ្ចីសៀវភៅ</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">ទំព័រដើម</a></li>
                                    <li class="breadcrumb-item active">គ្រប់គ្រងការខ្ចីសៀវភៅ</li>
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
                                    
                                    <table id="datatable-buttons" class="table table-bordered table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr class="bg-soft-dark text-center" >
                                                <th style="vertical-align: middle;">លេខសម្គាល់</th>
                                                <th style="vertical-align: middle;">លេខសម្គាល់សិស្ស (ID Card)</th>
                                                <th style="vertical-align: middle;">ឈ្មោះសិស្ស</th>
                                                <th style="vertical-align: middle;">ចំណងជើងសៀវភៅ</th>
                                                <th style="vertical-align: middle;">ចំនួនខ្ចីសៀវភៅ</th>
                                                <th style="vertical-align: middle;">កាលបរិច្ឆេទខ្ចី</th>
                                                <th style="vertical-align: middle;">កាលបរិច្ឆេទសង</th>
                                                <th style="vertical-align: middle;">អ្នកប្រើប្រាស់</th>
                                                {{-- <th style="vertical-align: middle;">ប៊ូតុង</th> --}}
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            @foreach($list_borrower as $item)
                                            <tr>
                                                <td>{{ $item->borrower_id }}</td>
                                                <td>{{ $item->student_id }}</td>
                                                <td>{{ $item->stfname }} {{ $item->stlname }}</td>
                                                <td>{{ $item->book_title }}</td>
                                                <td>{{ $item->student_NOcopies }}</td>
                                                <td>{{ $item->releaseDate }}</td>
                                                <td>{{ $item->dueDate }}</td>
                                                {{-- <td>{{ $TimePosting }}</td> --}}
                                                <td>{{ $item->name }}</td>
                                                {{-- <td class="d-flex flex-wrap justify-content-start">
                                                    <a href="{{ route('approve_borrower', $item->id) }}" class="btn btn-info m-1">Edit</a>
                                                    <a href="" onclick="return confirm('​តើអ្នកពិតជាចង់លុបទិន្នន័យនេះ?')" class="btn btn-danger m-1">Delete</a>
                                                </td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

@section('java')

{{-- select2 --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
{{-- datetimepicker --}}

<script type="text/javascript">
    $("#bookid").select2({
        placeholder: "ជ្រើសរើសចំណងជើង",
        allowClear: true
    });
    $("#studentid").select2({
        placeholder: "ជ្រើសរើសលេខកូដសម្គាល់សិស្ស",
        allowClear: true
    });
</script>
@endsection

@endsection