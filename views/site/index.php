<?php

/** @var yii\web\View $this */
/** @var bool $isGuest */

use yii\helpers\Html;
use yii\helpers\Url;

$isGuest = $isGuest ?? Yii::$app->user->isGuest;
$this->title = 'Trang chủ - Web GIS Cầu Ông Lãnh';
?>
<div class="site-index">

    <?php if ($isGuest): ?>
        <!-- Trang giới thiệu chung cho người chưa đăng nhập -->
        <div class="p-5 mb-4 bg-white rounded-4 shadow-sm border">
            <div class="container-fluid py-3">
                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 rounded-pill mb-3">
                    Cổng giới thiệu hệ thống
                </span>
                <h1 class="display-5 fw-bold text-primary">
                    <i class="fa-solid fa-map-location-dot me-2"></i>Web GIS Cầu Ông Lãnh
                </h1>
                <p class="col-md-9 fs-5 text-secondary mt-3">
                    Hệ thống thông tin địa lý hỗ trợ quản lý dữ liệu không gian, doanh nghiệp và hộ kinh doanh trên địa bàn khu vực Cầu Ông Lãnh.
                </p>
                <p class="col-md-9 text-muted">
                    Các chức năng tra cứu chi tiết và quản lý dữ liệu nghiệp vụ chỉ dành cho tài khoản nội bộ đã được cấp quyền. Vui lòng đăng nhập để tiếp tục làm việc.
                </p>
                <hr class="my-4">
                <div class="d-flex flex-wrap gap-3 mt-3">
                    <a class="btn btn-primary btn-lg px-4 shadow-sm" href="<?= Url::to(['/site/login']) ?>" role="button">
                        <i class="fa-solid fa-right-to-bracket me-2"></i>Đăng nhập hệ thống
                    </a>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0 rounded-4">
                    <div class="card-body p-4">
                        <h3 class="h5 fw-bold text-dark">
                            <i class="fa-solid fa-circle-info text-primary me-2"></i>Tổng quan hệ thống
                        </h3>
                        <p class="text-muted small mb-0 mt-2">
                            Kết hợp bản đồ số Leaflet và cơ sở dữ liệu địa lý nhằm trực quan hóa thông tin phân bố cơ sở kinh doanh trên địa bàn.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0 rounded-4">
                    <div class="card-body p-4">
                        <h3 class="h5 fw-bold text-dark">
                            <i class="fa-solid fa-shield-halved text-success me-2"></i>Quyền truy cập dữ liệu
                        </h3>
                        <p class="text-muted small mb-0 mt-2">
                            Khách chưa đăng nhập chỉ xem thông tin giới thiệu chung. Sau khi đăng nhập hợp lệ, bạn mới truy cập các phân hệ Doanh nghiệp và Hộ kinh doanh.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <!-- Giao diện dành cho người dùng đã đăng nhập -->
        <div class="p-5 mb-4 bg-white rounded-4 shadow-sm border">
            <div class="container-fluid py-3">
                <h1 class="display-5 fw-bold text-primary">
                    <i class="fa-solid fa-map-location-dot me-2"></i>Web GIS Cầu Ông Lãnh
                </h1>
                <p class="col-md-9 fs-5 text-secondary mt-3">
                    Xin chào <strong><?= Html::encode(Yii::$app->user->identity->username ?? '') ?></strong> — hệ thống thông tin địa lý tích hợp cơ sở dữ liệu quản lý không gian, doanh nghiệp và hộ kinh doanh khu vực Cầu Ông Lãnh.
                </p>
                <hr class="my-4">
                <div class="d-flex flex-wrap gap-3 mt-3">
                    <a class="btn btn-primary btn-lg px-4 shadow-sm" href="<?= Url::to(['/doanh-nghiep/index']) ?>" role="button">
                        <i class="fa-solid fa-building me-2"></i>Quản lý Doanh nghiệp
                    </a>
                    <a class="btn btn-success btn-lg px-4 shadow-sm" href="<?= Url::to(['/ho-kinh-doanh/index']) ?>" role="button">
                        <i class="fa-solid fa-store me-2"></i>Quản lý Hộ kinh doanh
                    </a>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
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
                        <a href="<?= Url::to(['/doanh-nghiep/index']) ?>" class="btn btn-outline-primary btn-sm mt-auto px-3 rounded-pill">
                            Truy cập <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

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
                        <a href="<?= Url::to(['/ho-kinh-doanh/index']) ?>" class="btn btn-outline-success btn-sm mt-auto px-3 rounded-pill">
                            Truy cập <i class="fa-solid fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

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
    <?php endif; ?>

</div>