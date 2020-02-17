<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <base href="{{ asset('') }}"/>
        <title>@yield('title')</title> 
        <link href="public/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    </head>
    <body class="sb-nav-fixed">
        @include("admin.layout.header")
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{route('thongke')}}"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div> Dashboard</a>
                            <div class="sb-sidenav-menu-heading">Managerment</div>
                       
                        <!-- List-menu-managament -->
                            <!-- One-managament -->
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div> Sinh Viên 
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="sinhvien/danhsach">Danh sách</a>
                                    <a class="nav-link" href="sinhvien/them">Thêm</a>
                                  
                                </nav>
                            </div>
                            <!-- End-One-managament -->
                              <!-- One-managament -->
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                                <div class="sb-nav-link-icon">
                                   <i class="fas fa-book"></i>
                                </div> Môn học 
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="monhoc/danhsach">Danh sách</a>
                                    <a class="nav-link" href="monhoc/them">Thêm</a>
                                
                                </nav>
                            </div>
                            <!-- End-One-managament -->
                               <!-- One-managament -->
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts5" aria-expanded="false" aria-controls="collapseLayouts5">
                                <div class="sb-nav-link-icon">
                                   <i class="fas fa-book-reader"></i>
                                </div> Điểm 
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapseLayouts5" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="diem/danhsach">Danh sách</a>
                                    <a class="nav-link" href="diem/them">Thêm</a>
                               
                                </nav>
                            </div>
                            <!-- End-One-managament -->
                              <!-- One-managament -->
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
                                <div class="sb-nav-link-icon">
                                   <i class="fas fa-warehouse"></i>
                                </div> Lớp 
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="lop/danhsach">Danh sách</a>
                                    <a class="nav-link" href="lop/them">Thêm</a>
                               
                                </nav>
                            </div>
                            <!-- End-One-managament -->
                              <!-- One-managament -->
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts4">
                                <div class="sb-nav-link-icon">
                                   <i class="fas fa-university"></i>
                                </div> Khoa
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="khoa/danhsach">Danh sách</a>
                                    <a class="nav-link" href="khoa/them">Thêm</a>
                                
                                </nav>
                            </div>
                            <!-- End-One-managament -->
                         <!-- End List-menu-managament -->




                          <!--   <div class="sb-sidenav-menu-heading">Addons</div> -->
                                 <!-- <a class="nav-link" href="charts.html"
                                                                 ><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                                                 Charts</a> -->
                               <!--  <a class="nav-link" href="tables.html"
                               ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                               Tables</a> -->
                             </div>
                    </div>
                    <div class="sb-sidenav-footer " style="color: white;">
                        <div class="small" >Logged in as:</div>
                      {{Auth::user()->name}} 
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">

                @yield('content')
                @include('admin.layout.footer')
            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="public/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="public/assets/demo/chart-area-demo.js"></script>
        <script src="public/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="public/assets/demo/datatables-demo.js"></script>
    </body>
</html>
