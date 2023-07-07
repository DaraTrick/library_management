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
                                    <form action="{{ route('store_borrower') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">លេខកូដសម្គាល់</label>
                                                    <div class="">
                                                        <input class="form-control" name="borrower_id" type="text" value="{{ $borrower_id }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">កាលបរិច្ឆេទខ្ចី</label>
                                                    <div>
                                                        <input class="form-control datetimepicker" name="releaseDate" type="datetime-local" placeholder="បញ្ជូលកាលបរិច្ឆេទខ្លី" value="{{ old('releaseDate') }}" >
                                                        @error('releaseDate')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-url-input" class="col-form-label">កាលបរិច្ឆេទសង</label>
                                                    <div>
                                                        <input class="form-control" name="dueDate" type="datetime-local" placeholder="បញ្ជូលកាលបរិច្ឆេទសង" value="{{ old('dueDate') }}" >
                                                        @error('dueDate')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">លេខសម្គាល់សិស្ស (ID Card)</label>
                                                    <div>
                                                        <select id="studentid" name="student_id" class="form-control">
                                                            <option></option>
                                                            @foreach($students as $item)
                                                            <option value="{{ $item->student_id }}">{{ $item->student_id }} {{ $item->stfname }} {{ $item->stlname }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('student_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror                                              
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">ចំនួនខ្ចីសៀវភៅ</label>
                                                    <div>
                                                        <input class="form-control" name="student_NOcopies" value="{{ old('student_NOcopies') }}" type="text" placeholder="បញ្ជូលចំនួនខ្ចីសៀវភៅ" value="{{ old('student_NOcopies') }}">
                                                        @error('student_NOcopies')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">ចំណងជើងសៀវភៅ</label>
                                                    <div>
                                                        <select id="book_title" name="book_title" class="form-control">
                                                            <option></option>
                                                            @foreach($books as $item)
                                                            <option value="{{ $item->book_id }}">{{ $item->book_title}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('book_title.*'))
                                                            @foreach($errors->get('book_title.*') as $key => $error)
                                                                <span class="text-danger">{{ $errors->first($key) }}</span>
                                                            @endforeach
                                                        @endif
                                                        {{-- <input type="text" class="form-control" placeholder="ជ្រើសរើសចំណងជើងសៀវភៅ" name="book_title" list="book_title">
                                                        <datalist id="book_title">
                                                            @foreach($books as $item)
                                                                <option value="{{ $item->book_title }}">{{ $item->book_title}}</option>
                                                            @endforeach
                                                        </datalist> --}}
                                                        @if($errors->has('book_title.*'))
                                                            @foreach($errors->get('book_title.*') as $key => $error)
                                                                <span class="text-danger">{{ $errors->first($key) }}</span>
                                                            @endforeach
                                                        @endif
                                                        {{-- @error('book_title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror                                               --}}
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <div class="form-group col-lg-12">
                                                <div class="d-flex justify-content-end">
                                                    <input class="btn btn-primary" type="submit" value="បញ្ជូលថ្មី">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                   
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
                                                <th style="vertical-align: middle;">ប៊ូតុង</th>
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            @foreach($borrowers as $item)
                                            <tr>
                                                <td>{{ $item->borrower_id }}</td>
                                                <td>{{ $item->student_id }}</td>
                                                <td>{{ $item->stfname }} {{ $item->stlname }}</td>
                                                <td>
                                                    {{ $item->book_title }}
                                                </td>
                                                <td>{{ $item->student_NOcopies }}</td>
                                                <td>{{ $releaseDate }}</td>
                                                <td>{{ $dueDate }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <a href="{{ route('approve_borrower', $item->id) }}" class="btn btn-info m-1">Approve</a>
                                                    <a href="" class="btn btn-warning m-1">Trash</a>
                                                    {{-- <a href="" onclick="return confirm('​តើអ្នកពិតជាចង់លុបទិន្នន័យនេះ?')" class="btn btn-danger"><span class="mdi mdi-delete-empty"></span></a> --}}
                                                </td>
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
    $("#book_title").select2({
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