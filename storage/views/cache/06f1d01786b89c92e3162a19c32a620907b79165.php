<!doctype html>
<html lang="en">

<head>
    <title><?php echo e($_ENV['APP_NAME']); ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo e(BASE_URL . 'admin/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo e(BASE_URL . 'admin/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo e(BASE_URL . 'chat/js/jquery.js'); ?>"> </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap CSS -->
</head>

<body>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="users">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Admin</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="users">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Interface
                </div>

                <!-- Nav Item - Pages Collapse Menu -->

                <li class="nav-item">
                    <a class="nav-link" href="/admin/users">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>User</span>
                    </a>
                    <a class="nav-link" href="/admin/categories">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Category</span>
                    </a>
                    <a class="nav-link" href="/admin/events">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Event</span>
                    </a>
                    <a class="nav-link" href="/admin/posts">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Post</span>
                    </a>
                    <a class="nav-link" href="/admin/jobs">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Jobs</span>
                    </a>
                    <a class="nav-link" href="/admin/carts">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Carts</span>
                    </a>

                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->

                    <!-- /.container-fluid -->
                    <?php echo $__env->yieldContent('content'); ?>

                </div>
                <!-- End of Main Content -->
                <!-- Footer -->
                <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="/admin/logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: {
                        items: [
                            'heading', '|',
                            'fontfamily', 'fontsize', '|',
                            'alignment', '|',
                            'fontColor', 'fontBackgroundColor', '|',
                            'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                            'link', '|',
                            'outdent', 'indent', '|',
                            'bulletedList', 'numberedList', 'todoList', '|',
                            'code', 'codeBlock', '|',
                            'insertTable', '|',
                            'uploadImage', 'blockQuote', '|',
                            'undo', 'redo', 'ckfinder'
                        ],
                        shouldNotGroupWhenFull: true

                    },
                    ckfinder: {
                        // Upload the images to the server using the CKFinder QuickUpload command.
                        uploadUrl: 'http:localhost/upload-event?command=QuickUpload&type=Images&responseType=json',
                        options: {
                            resourceType: 'Images'
                        }
                    },
                    heading: {
                        options: [{
                                model: 'paragraph',
                                title: 'Paragraph',
                                class: 'ck-heading_paragraph'
                            },
                            {
                                model: 'heading1',
                                view: 'h1',
                                title: 'Heading 1',
                                class: 'ck-heading_heading1'
                            },
                            {
                                model: 'heading2',
                                view: 'h2',
                                title: 'Heading 2',
                                class: 'ck-heading_heading2'
                            }
                        ]
                    }
                })
                .catch(error => {
                    console.log(error);
                });

        </script>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="<?php echo e(BASE_URL . 'chat/js/jquery-3.6.0.slim.min.js'); ?>"> </script>
        <script src="<?php echo e(BASE_URL . 'chat/js/jquery-3.6.0.min.js'); ?>"> </script>
        <script src="<?php echo e(BASE_URL . 'admin/vendor/jquery/jquery.min.js'); ?>"></script>
        <script src="<?php echo e(BASE_URL . 'admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo e(BASE_URL . 'admin/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo e(BASE_URL . 'admin/js/sb-admin-2.min.js'); ?>"></script>
        <script src="<?php echo e(BASE_URL . 'vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo e(BASE_URL . 'vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

        <!-- Page level custom scripts -->
        <script src="<?php echo e(BASE_URL . 'js/demo/datatables-demo.js'); ?>"></script>

    </body>

</html>
<?php /**PATH C:\xampp\htdocs\resources\views/layouts/master.blade.php ENDPATH**/ ?>