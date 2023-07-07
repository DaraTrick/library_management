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
                                    <h4 class="mb-0 font-size-18">បញ្ជីបុគ្គលិក</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">ទំព័រដើម</a></li>
                                            <li class="breadcrumb-item active">បញ្ជីបុគ្គលិក</li>
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
                                                    <th>ឈ្មោះ</th>
                                                    <th>លេខទូរស័ព្ទ</th>
                                                    <th>អុីម៉ែល</th>
                                                    <th>អាសយដ្ឋាន</th>
                                                    <th>ស្ថានភាព</th>
                                                    <th>មុខងារ</th>
                                                    <th>រូបភាព</th>
                                                    <th>ប៊ូតុង</th>
                                                </tr>
                                            </thead>
        
                                            <tbody>
                                                @foreach($users as $item)
                                                <tr>
                                                    <td>{{ $item->staff_id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->address }}</td>
                                                    <td>
                                                        @if($item->status == 'Active')
                                                          {{ $item->status }} 
                                                        @else 
                                                          <span class="btn-warning btn-sm">{{ $item->status }} </span> 
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($item->role == 1)
                                                            បណ្ណារក្ស
                                                        @else
                                                            សិស្ស
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('uploads/uers/'.$item->photo) }}" width="50px" alt="">
                                                    </td>
                                                    <td>
                                                        <a href="" class="btn btn-info" style="margin:5px 0;"><span class="mdi mdi-pencil"></span></a>
                                                        <a href="" class="btn btn-warning" style="margin:5px 0;"><span class="mdi mdi-delete"></span></a>
                                                        <a href="" onclick="return confirm('​តើអ្នកពិតជាចង់លុបទិន្នន័យនេះ?')" class="btn btn-danger" style="margin:5px 0;"><span class="mdi mdi-delete-empty"></span></a>
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