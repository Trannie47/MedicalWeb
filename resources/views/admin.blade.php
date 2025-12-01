<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Quản Lý Thuốc</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" integrity="sha512-jQY3S9o+E0zRM+psIoLVp9dF/t1h4lX99Dd2JZSlmD5sZ4aS6+PfxU1c3gROlX6Z8/E6+Yy+9sqQh6x0+o0C2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,900" rel="stylesheet">

    <!-- SB Admin 2 CSS -->
    <link href="https://cdn.jsdelivr.net/gh/startbootstrap/sb-admin-2@4.1.4/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Optional custom CSS -->
    {{-- <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> --}}
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-pills"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Thuốc</div>
            </a>

            <hr class="sidebar-divider my-0">

            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Bảng điều khiển</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">Quản lý thuốc</div>

            <!-- Quản lý thuốc -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThuoc" aria-expanded="true" aria-controls="collapseThuoc">
                    <i class="fas fa-capsules"></i>
                    <span>Quản lý thuốc</span>
                </a>
                <div id="collapseThuoc" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Danh mục thuốc:</h6>
                        <a href="#" class="collapse-item">Danh sách thuốc</a>
                        <a href="#" class="collapse-item">Thêm thuốc</a>
                        <a href="#" class="collapse-item">Loại thuốc</a>
                        <a href="#" class="collapse-item">Nhà cung cấp</a>
                        <a href="#" class="collapse-item">Kho – tồn kho</a>
                    </div>
                </div>
            </li>

            <!-- Quản lý đơn thuốc -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDonThuoc" aria-expanded="true" aria-controls="collapseDonThuoc">
                    <i class="fas fa-file-medical"></i>
                    <span>Quản lý đơn thuốc</span>
                </a>
                <div id="collapseDonThuoc" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Đơn thuốc:</h6>
                        <a href="#" class="collapse-item">Đơn chờ duyệt</a>
                        <a href="#" class="collapse-item">Đơn đã duyệt</a>
                        <a href="#" class="collapse-item">Đơn bị hủy</a>
                        <a href="#" class="collapse-item">Lịch sử đơn thuốc</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">Tài khoản</div>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-users-cog"></i>
                    <span>Quản lý nhân viên</span>
                </a>
            </li>

            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Đăng xuất</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Tìm kiếm...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Right Menu -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="https://via.placeholder.com/60">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Hồ sơ
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cài đặt
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>

                <!-- Main Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto text-center">
                    <span>© Quản Lý Thuốc 2025</span>
                </div>
            </footer>

        </div>
    </div>

    <!-- Scroll to Top-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- jQuery & Bootstrap Bundle (Popper) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SB Admin 2 JS -->
    <script src="https://cdn.jsdelivr.net/gh/startbootstrap/sb-admin-2@4.1.4/js/sb-admin-2.min.js"></script>

</body>
</html>
