<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin.head')

</head>

<body>




    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">



            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->

                <!-- /page header -->


                <!-- Content area -->
                <!-- Error title -->
                <div class="text-center content-group">
                    <h1 class="error-title">403</h1>
                    <h5>Oops, an error has occurred. Forbidden!</h5>
                </div>
                <!-- /error title -->
                <!-- Error content -->
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
                       
                           

                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="{{route('admin.dashboard')}}" class="btn btn-primary btn-block content-group"><i class="icon-circle-left2 position-left"></i> Go to dashboard</a>
                                </div>

                                
                            </div>
                       
                    </div>
                </div>
                <!-- /error wrapper -->
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

</body>

</html>