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
                            <h4 class="mb-0 font-size-18">ផ្ទាំងគ្រប់គ្រង</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">ទំព័រដើម</li>
                                    {{-- <li class="breadcrumb-item ">ផ្ទាំងគ្រប់គ្រង</li> --}}
                                </ol>
                            </div>
                            
                        </div>
                    </div>
                </div>     
                <!-- end page title -->

                <div class="row">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="font-size-14">ចំនួនសិស្សសរុប</h5>
                                    </div>
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="dripicons-box"></i>
                                        </span>
                                    </div>
                                </div>
                                <h4 class="m-0 align-self-center">{{ $total_students }}</h4>
                                {{-- <p class="mb-0 mt-3 text-muted"><span class="text-success">1.23 % <i class="mdi mdi-trending-up mr-1"></i></span> From previous period</p> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="font-size-14">ចំនួនសៀវភៅសរុប</h5>
                                    </div>
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="dripicons-briefcase"></i>
                                        </span>
                                    </div>
                                </div>
                                <h4 class="m-0 align-self-center">{{ $total_books }}</h4>
                                {{-- <p class="mb-0 mt-3 text-muted"><span class="text-success">2.73 % <i class="mdi mdi-trending-up mr-1"></i></span> From previous period</p> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="font-size-14">ចំនួនសៀវភៅដែលកំពុងបានខ្លីសរុប</h5>
                                    </div>
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="dripicons-tags"></i>
                                        </span>
                                    </div>
                                </div>
                                <h4 class="m-0 align-self-center">{{ $total_borrower }}</h4>
                                {{-- <p class="mb-0 mt-3 text-muted"><span class="text-danger">4.35 % <i class="mdi mdi-trending-down mr-1"></i></span> From previous period</p> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="font-size-14">ចំនួនអ្នកប្រើប្រាស់សរុប</h5>
                                    </div>
                                    <div class="avatar-xs">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="dripicons-cart"></i>
                                        </span>
                                    </div>
                                </div>
                                <h4 class="m-0 align-self-center">{{ $total_user }}</h4>
                                {{-- <p class="mb-0 mt-3 text-muted"><span class="text-success">7.21 % <i class="mdi mdi-trending-up mr-1"></i></span> From previous period</p> --}}
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->

                {{-- <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                
                                <h4 class="header-title mb-4">របាយការណ៍ខ្ចីសៀវភៅប្រចាំខែ</h4>
                                <div id="piechart" style="width: 500px; height: 500px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                
                                <h4 class="header-title mb-4">របាយការណ៍ខ្ចីសៀវភៅប្រចាំខែ</h4>
                                <div id="piechart1" style="width: 500px; height: 500px;"></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->
@section('java')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        
        var data = google.visualization.arrayToDataTable([
          ['Borrower', 'Amount of the Day'],
          <?php echo($borrower_report); ?>
        ]);

        var data1 = google.visualization.arrayToDataTable([
          ['Student', 'Amount of the Day'],
          <?php echo($student_report); ?>
        ]);

        var options = {
        //   title: 'របាយការណ៍ខ្ចីសៀវភៅប្រចាំខែ'
        pieHole: 0.4,
        };

        var options1 = {
        //   title: 'របាយការណ៍ខ្ចីសៀវភៅប្រចាំខែ'
        pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart.draw(data, options);
        chart1.draw(data1, options1);
      }
    </script>
    @endsection
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
@endsection