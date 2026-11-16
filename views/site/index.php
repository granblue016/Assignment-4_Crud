<?php

/** @var yii\web\View $this */

$this->title = 'Hệ thống Quản lý Kinh tế - Web GIS Cầu Ông Lãnh';
?>
<div class="site-index">

    <!-- Hero Banner Section -->
    <div class="p-5 mb-4 bg-dark text-white rounded-3 shadow-sm border border-secondary" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%) !important;">
        <div class="container-fluid py-3">
            <h1 class="display-5 fw-bold mb-3">Web GIS Cầu Ông Lãnh</h1>
            <p class="col-md-8 fs-5 text-light">
                Hệ thống thông tin quản lý, số hóa và tra cứu dữ liệu không gian kết hợp thuộc tính kinh tế đô thị (Doanh nghiệp & Hộ kinh doanh) phục vụ công tác phát triển hạ tầng thông minh.
            </p>
            <!-- <div class="mt-4">
                <?= \yii\helpers\Html::a('Quản lý Doanh Nghiệp', ['/doanh-nghiep/index'], ['class' => 'btn btn-success btn-lg me-2 mb-2']) ?>
                <?= \yii\helpers\Html::a('Quản lý Hộ Kinh Doanh', ['/ho-kinh-doanh/index'], ['class' => 'btn btn-outline-light btn-lg mb-2']) ?>
            </div> -->
        </div>
    </div>

    <!-- Quick Info Cards Section -->
    <div class="body-content">
        <div class="row">
            
            <!-- Card 1: Doanh Nghiệp -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100 bg-dark text-light border-secondary shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-success"><i class="bi bi-building"></i> Doanh Nghiệp</h3>
                        <p class="card-text text-muted">Quản lý danh sách các công ty, vốn điều lệ, mã số thuế, đại diện pháp luật và tọa độ trụ sở chính.</p>
                    </div>
                    <div class="card-footer bg-transparent border-secondary">
                        <?= \yii\helpers\Html::a('Truy cập danh sách &raquo;', ['/doanh-nghiep/index'], ['class' => 'btn btn-sm btn-outline-success']) ?>
                    </div>
                </div>
            </div>

            <!-- Card 2: Hộ Kinh Doanh -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100 bg-dark text-light border-secondary shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-info"><i class="bi bi-shop"></i> Hộ Kinh Doanh</h3>
                        <p class="card-text text-muted">Quản lý thông tin hộ cá thể, giấy chứng nhận đăng ký kinh doanh, chủ hộ và nguồn vốn kinh doanh.</p>
                    </div>
                    <div class="card-footer bg-transparent border-secondary">
                        <?= \yii\helpers\Html::a('Truy cập danh sách &raquo;', ['/ho-kinh-doanh/index'], ['class' => 'btn btn-sm btn-outline-info']) ?>
                    </div>
                </div>
            </div>

            <!-- Card 3: Hạ tầng & CSDL -->
            <!-- <div class="col-lg-4 mb-4">
                <div class="card h-100 bg-dark text-light border-secondary shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-warning"><i class="bi bi-database"></i> Cơ Sở Dữ Liệu</h3>
                        <p class="card-text text-muted">Hệ thống kết nối trực tiếp PostgreSQL / PostGIS quản lý dữ liệu thuộc tính không gian đô thị đồng bộ.</p>
                    </div>
                    <div class="card-footer bg-transparent border-secondary">
                        <span class="badge bg-warning text-dark">Trạng thái: Đang kết nối ổn định</span>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
</div>