<!doctype html>
<html lang="en">

<head>
    <title>{{ $_ENV['APP_NAME'] }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ BASE_URL . 'admin/vendor/fontawesome-free/css/all.min.css' }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ BASE_URL . 'admin/css/sb-admin-2.min.css' }}" rel="stylesheet">


    <!-- Bootstrap CSS -->
</head>

<body>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Begin Page Content -->

                    <!-- /.container-fluid -->
                    @yield('content')

                </div>
                <!-- End of Main Content -->
                <!-- Footer -->
                @include('layouts.footer')
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ BASE_URL . 'admin/vendor/jquery/jquery.min.js' }}"></script>
        <script src="{{ BASE_URL . 'admin/vendor/bootstrap/js/bootstrap.bundle.min.js' }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ BASE_URL . 'admin/vendor/jquery-easing/jquery.easing.min.js' }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ BASE_URL . 'admin/js/sb-admin-2.min.js' }}"></script>
        <script src="{{ BASE_URL . 'vendor/datatables/jquery.dataTables.min.js' }}"></script>
        <script src="{{ BASE_URL . 'vendor/datatables/dataTables.bootstrap4.min.js' }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ BASE_URL . 'js/demo/datatables-demo.js' }}"></script>
    </body>

</html>