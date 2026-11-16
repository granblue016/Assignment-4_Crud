<?php

/** @var yii\web\View $this */

$this->title = 'Trang chủ - Web GIS Cầu Ông Lãnh';
?>
<div class="site-index">

    <!-- Hero Section / Banner Tổng quan -->
    <div class="p-5 mb-4 bg-white rounded-4 shadow-sm border">
        <div class="container-fluid py-3">
            <h1 class="display-5 fw-bold text-primary">
                <i class="fa-solid fa-map-location-dot me-2"></i>Web GIS Cầu Ông Lãnh
            </h1>
            <p class="col-md-9 fs-5 text-secondary mt-3">
                Hệ thống thông tin địa lý tích hợp cơ sở dữ liệu quản lý không gian, doanh nghiệp và hộ kinh doanh khu vực Cầu Ông Lãnh một cách trực quan, chính xác và hiệu quả.
            </p>
            <hr class="my-4">
            <div class="d-flex flex-wrap gap-3 mt-3">
                <a class="btn btn-primary btn-lg px-4 shadow-sm" href="<?= \yii\helpers\Url::to(['/doanh-nghiep/index']) ?>" role="button">
                    <i class="fa-solid fa-building me-2"></i>Quản lý Doanh nghiệp
                </a>
                <a class="btn btn-success btn-lg px-4 shadow-sm" href="<?= \yii\helpers\Url::to(['/ho-kinh-doanh/index']) ?>" role="button">
                    <i class="fa-solid fa-store me-2"></i>Quản lý Hộ kinh doanh
                </a>
            </div>
        </div>
    </div>

    <!-- Khối Thẻ Chức Năng (Cards Grid) -->
    <div class="row g-4 mb-4">
        <!-- Card 1: Doanh Nghiệp -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 transition-hover">
                <div class="card-body text-center p-4 d-flex flex-column align-items-center">
                    <div class="feature-icon bg-primary bg-gradient text-white rounded-circle shadow-sm mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                        <i class="fa-solid fa-building fa-2x"></i>
                    </div>
                    <h3 class="card-title h5 fw-bold text-dark">Doanh Nghiệp</h3>
                    <p class="card-text text-muted small mt-2">
                        Quản lý danh sách, mã số, thông tin chi tiết và vị trí của các doanh nghiệp hoạt động trên địa bàn.
                    </p>
                    <a href="<?= \yii\helpers\Url::to(['/doanh-nghiep/index']) ?>" class="btn btn-outline-primary btn-sm mt-auto px-3 rounded-pill">
                        Truy cập <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Card 2: Hộ Kinh Doanh -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 transition-hover">
                <div class="card-body text-center p-4 d-flex flex-column align-items-center">
                    <div class="feature-icon bg-success bg-gradient text-white rounded-circle shadow-sm mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                        <i class="fa-solid fa-store fa-2x"></i>
                    </div>
                    <h3 class="card-title h5 fw-bold text-dark">Hộ Kinh Doanh</h3>
                    <p class="card-text text-muted small mt-2">
                        Theo dõi thông tin chủ hộ, ngành nghề, mã số và tình trạng hoạt động của các hộ cá thể.
                    </p>
                    <a href="<?= \yii\helpers\Url::to(['/ho-kinh-doanh/index']) ?>" class="btn btn-outline-success btn-sm mt-auto px-3 rounded-pill">
                        Truy cập <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Card 3: Bản đồ GIS -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 transition-hover">
                <div class="card-body text-center p-4 d-flex flex-column align-items-center">
                    <div class="feature-icon bg-info bg-gradient text-white rounded-circle shadow-sm mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                        <i class="fa-solid fa-map-location-dot fa-2x"></i>
                    </div>
                    <h3 class="card-title h5 fw-bold text-dark">Bản Đồ Không Gian (GIS)</h3>
                    <p class="card-text text-muted small mt-2">
                        Tương tác trực quan trên nền bản đồ Leaflet, tích hợp GeoServer tra cứu ranh giới, thửa đất và lớp chuyên đề.
                    </p>
                    <span class="badge bg-info text-dark mt-auto px-3 py-2 rounded-pill">Hệ thống bản đồ trực tuyến</span>
                </div>
            </div>
        </div>
    </div>

</div>