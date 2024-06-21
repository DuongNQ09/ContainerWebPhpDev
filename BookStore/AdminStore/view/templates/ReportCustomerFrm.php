<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Thống kê khách hàng </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="view/static/assets/img/favicon/5.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="view/static/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="view/static/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="view/static/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="view/static/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="view/static/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="view/static/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="view/static/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="view/static/assets/js/config.js"></script>
  </head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
			<?php require 'view/templates/menu.php'; ?>
            
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php require 'view/templates/header.php'; ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                <div class="container-fluid flex-grow-1 container-p-y">
                    <!--                     Striped Rows -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Thống kê khách hàng  
                                <?php 
                                    if($datestart != null){
                                        echo "từ " . $datestart . " ";
                                    }
                                    if($dateend != null){
                                        echo "đến " . $dateend;
                                    }
                                ?>
                            </h4>
							<div class="col-lg-6 col-md-12 col-6 mb-4">
                                <form action="?route=reportcustomer" method="post">
                                <div class="row g-4 justify-content-center">
                                    <div class="col-md-12 col-lg-6">
                                        <label for="pricestart" class="form-label my-3">Từ:</label>
                                        <span id="error_pricestart" class="error_span"></span><br>
                                        <input type="date" name="datestart" id="datestart" class="form-control">
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <label for="priceend" class="form-label my-3">Đến:</label>
                                        <span id="error_priceend" class="error_span"></span><br>
                                        <input type="date" name="dateend" id="dateend" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="width: 30%;">Tìm kiếm</button>
                                </div>
                                </form> 
                            </div>
                            <?php if (count($listcus)==0) { ?>
                                <p>Không có khách hàng </p>
                            <?php } ?>
                        </div>

                        <div class="table-responsive text-nowrap">
                            <?php if (count($listcus)>0) { ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên khách hàng</th>
                                        <th>Tên đăng nhập </th>
                                        <th>
                                            Doanh thu
                                            <a href="?route=reportcustomer&sort=down">&#9660;</a>
                                            <a href="?route=reportcustomer&sort=up">&#9650;</a>
                                        </th>
                                        <th>Thao tác </th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php 
                                    $index = 0;
                                    foreach ($listcus as $cus):
                                    $index = $index + 1;    
                                    ?>
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            <strong><?php echo $index ?></strong></td>
                                        <td>
                                            <?php echo $cus->getFullName() ?>
                                        </td>
                                        <td><?php echo $cus->getUserName() ?></td>
                                        <td><?php echo number_format($cus->getTotalbook()) . " đ" ?></td>
                                        <td><a type="button"
                                            class="btn rounded-pill btn-success"
                                            href="?route=customerview&userid=<?php echo $cus->getUserId() ?>">Xem</a></td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <?php } ?>
                        </div>
                        
                    <!--                     / Striped Rows -->
                    


                </div>
                <?php if (!empty($listcus) && empty($datestart) && empty($dateend)): ?>                    
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <!-- Basic Pagination -->
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <?php if ($currentPage != 0): ?>
                                        <li class="page-item">
                                            <a href="?route=reportcustomer&page=<?php echo $currentPage - 1; ?>" class="page-link">Trước</a>
                                        </li>
                                    <?php endif; ?>
                                    
                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <li class="page-item <?php echo ($currentPage == $i - 1) ? 'active' : ''; ?>">
                                            <a href="?route=reportcustomer&page=<?php echo $i - 1; ?>" class="page-link"><?php echo $i; ?></a>
                                        </li>
                                    <?php endfor; ?>
                                    
                                    <?php if ($currentPage + 1 != $totalPages): ?>
                                        <li class="page-item">
                                            <a href="?route=reportcustomer&page=<?php echo $currentPage + 1; ?>" class="page-link">Sau</a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                            <!-- / Basic Pagination -->
                        </div>
                    </footer>
                    <?php endif ?>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

      <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="view/static/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="view/static/assets/vendor/libs/popper/popper.js"></script>
    <script src="view/static/assets/vendor/js/bootstrap.js"></script>
    <script src="view/static/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="view/static/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="view/static/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
