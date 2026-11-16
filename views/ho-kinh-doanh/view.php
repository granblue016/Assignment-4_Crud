<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HoKinhDoanh $model */

$this->title = $model->chu_ho_ho_va_ten;
$this->params['breadcrumbs'][] = ['label' => 'Quản lý Hộ Kinh Doanh', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ho-kinh-doanh-view">

    <!-- Header & Nút thao tác trên cùng -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 p-4 bg-dark text-white rounded-4 shadow-sm border border-secondary gap-3">
        <div class="d-flex align-items-center">
            <div class="bg-success bg-gradient text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm me-3" style="width: 55px; height: 55px; min-width: 55px;">
                <i class="fa-solid fa-shop fa-lg"></i>
            </div>
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-info text-dark px-2 py-1 fw-bold">Mã HKD: <?= Html::encode($model->ma_so_ho_kinh_doanh) ?></span>
                    <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-50 px-2 py-1">
                        <?= Html::encode($model->trang_thai_hoat_dong ?: 'Đang hoạt động') ?>
                    </span>
                </div>
                <h1 class="h4 fw-bold text-white mb-0">Chủ hộ: <?= Html::encode($model->chu_ho_ho_va_ten) ?></h1>
            </div>
        </div>
        <div class="d-flex gap-2">
            <?= Html::a('<i class="fa-solid fa-pen-to-square me-1"></i> Cập nhật', ['update', 'id' => $model->id], ['class' => 'btn btn-primary rounded-pill px-4 shadow-sm']) ?>
            <?= Html::a('<i class="fa-solid fa-trash me-1"></i> Xóa', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-outline-danger rounded-pill px-4',
                'data' => [
                    'confirm' => 'Bạn có chắc chắn muốn xóa hộ kinh doanh này không?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('<i class="fa-solid fa-arrow-left me-1"></i> Danh sách', ['index'], ['class' => 'btn btn-outline-secondary rounded-pill px-4']) ?>
        </div>
    </div>

    <!-- Bố cục hiển thị chi tiết chia thành các Card song song -->
    <div class="row g-4">
        
        <!-- Cột trái: Thông tin định danh & Giấy phép -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0 rounded-4 bg-dark text-white">
                <div class="card-header bg-dark border-bottom border-secondary py-3">
                    <h6 class="fw-bold mb-0 text-uppercase" style="color: #38bdf8 !important;">
                        <i class="fa-solid fa-store me-2"></i> Thông tin định danh & Cấp phép
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-borderless align-middle mb-0">
                        <tr>
                            <th class="text-secondary w-45">Mã số hộ kinh doanh:</th>
                            <td class="fw-bold text-info"><?= Html::encode($model->ma_so_ho_kinh_doanh) ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Số giấy chứng nhận ĐKKD:</th>
                            <td class="text-light"><?= Html::encode($model->so_giay_cn_dkkd ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Ngày cấp giấy chứng nhận:</th>
                            <td class="text-light"><?= Html::encode($model->ngay_cap_giay_cn_dkkd ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Nơi cấp giấy chứng nhận:</th>
                            <td class="text-light"><?= Html::encode($model->noi_cap ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Mã số thuế:</th>
                            <td class="text-light"><?= Html::encode($model->ma_so_thue ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Ngày cấp mã số thuế:</th>
                            <td class="text-light"><?= Html::encode($model->ngay_cap_ma_so_thue ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Vốn kinh doanh:</th>
                            <td class="text-success fw-bold">
                                <?= $model->von_kinh_doanh ? number_format($model->von_kinh_doanh, 0, ',', '.') . ' VNĐ' : 'Chưa cập nhật' ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Số lượng lao động:</th>
                            <td class="text-light"><?= $model->so_lao_dong ? $model->so_lao_dong . ' người' : 'Chưa cập nhật' ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Số lần thay đổi:</th>
                            <td class="text-light"><?= Html::encode($model->so_lan_thay_doi ?? '0') ?> lần</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Cột phải: Thông tin Chủ hộ kinh doanh -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0 rounded-4 bg-dark text-white">
                <div class="card-header bg-dark border-bottom border-secondary py-3">
                    <h6 class="fw-bold mb-0 text-uppercase" style="color: #4ade80 !important;">
                        <i class="fa-solid fa-user-gear me-2"></i> Thông tin Chủ hộ kinh doanh
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-borderless align-middle mb-0">
                        <tr>
                            <th class="text-secondary w-45">Họ và tên chủ hộ:</th>
                            <td class="fw-bold text-light"><?= Html::encode($model->chu_ho_ho_va_ten) ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Số CCCD / CMND:</th>
                            <td class="text-light"><?= Html::encode($model->chu_ho_cccd ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Ngày cấp CCCD:</th>
                            <td class="text-light"><?= Html::encode($model->chu_ho_ngay_cap_cccd ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Quốc tịch chủ hộ:</th>
                            <td class="text-light"><?= Html::encode($model->chu_ho_quoc_tich ?: 'Việt Nam') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Địa chỉ thường trú:</th>
                            <td class="text-light"><?= Html::encode($model->chu_ho_dia_chi_thuong_tru ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Tên bảng hiệu:</th>
                            <td class="text-info fw-semibold"><?= Html::encode($model->bang_hieu ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Trạng thái hoạt động:</th>
                            <td>
                                <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-50 px-2 py-1">
                                    <?= Html::encode($model->trang_thai_hoat_dong ?: 'Đang hoạt động') ?>
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Hàng dưới: Địa chỉ & Ngành nghề kinh doanh -->
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-4 bg-dark text-white">
                <div class="card-header bg-dark border-bottom border-secondary py-3">
                    <h6 class="fw-bold mb-0 text-uppercase" style="color: #fbbf24 !important;">
                        <i class="fa-solid fa-location-dot me-2"></i> Địa điểm & Chi tiết ngành nghề
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <span class="text-secondary small fw-bold d-block">Số nhà:</span>
                            <span class="text-light"><?= Html::encode($model->so_nha ?: '---') ?></span>
                        </div>
                        <div class="col-md-3">
                            <span class="text-secondary small fw-bold d-block">Tên đường:</span>
                            <span class="text-light"><?= Html::encode($model->ten_duong ?: '---') ?></span>
                        </div>
                        <div class="col-md-3">
                            <span class="text-secondary small fw-bold d-block">Phường / Xã:</span>
                            <span class="text-light"><?= Html::encode($model->phuong_xa ?: '---') ?></span>
                        </div>
                        <div class="col-md-3">
                            <span class="text-secondary small fw-bold d-block">Thành phố:</span>
                            <span class="text-light"><?= Html::encode($model->thanh_pho ?: '---') ?></span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <span class="text-secondary small fw-bold text-uppercase d-block mb-1">Địa chỉ đầy đủ:</span>
                        <p class="text-light fw-semibold fs-5 mb-0"><?= Html::encode($model->dia_chi_day_du ?: 'Chưa cập nhật địa chỉ') ?></p>
                    </div>
                    <div class="mb-3">
                        <span class="text-secondary small fw-bold text-uppercase d-block mb-1">Trụ sở chính:</span>
                        <p class="text-light mb-0"><?= Html::encode($model->tru_so_chinh ?: 'Chưa cập nhật') ?></p>
                    </div>

                    <hr class="border-secondary">

                    <div class="mb-2">
                        <span class="text-secondary small fw-bold text-uppercase d-block mb-1">Ngành nghề chính:</span>
                        <p class="text-info fw-semibold mb-2"><?= Html::encode($model->nganh_nghe_chinh ?: 'Chưa cập nhật') ?></p>
                    </div>
                    <div>
                        <span class="text-secondary small fw-bold text-uppercase d-block mb-1">Mô tả chi tiết ngành nghề:</span>
                        <p class="text-light mb-0 small"><?= Html::encode($model->mo_ta_nganh_nghe_kinh_doanh ?: 'Không có mô tả bổ sung.') ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hàng bổ sung: Biến động trạng thái & Tọa độ GIS -->
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-4 bg-dark text-white">
                <div class="card-header bg-dark border-bottom border-secondary py-3">
                    <h6 class="fw-bold mb-0 text-uppercase" style="color: #e879f9 !important;">
                        <i class="fa-solid fa-map-location-dot me-2"></i> Biến động trạng thái & Tọa độ GIS
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <span class="text-secondary small fw-bold d-block">Ngày đóng cửa:</span>
                            <span class="text-light"><?= Html::encode($model->ngay_dong_cua ?: 'Không có') ?></span>
                            <p class="text-muted small mt-1 mb-0">Lý do: <?= Html::encode($model->ly_do_dong_cua ?: '---') ?></p>
                        </div>
                        <div class="col-md-4">
                            <span class="text-secondary small fw-bold d-block">Ngày tái hoạt động:</span>
                            <span class="text-light"><?= Html::encode($model->ngay_tai_hoat_dong ?: 'Không có') ?></span>
                            <p class="text-muted small mt-1 mb-0">Lý do: <?= Html::encode($model->ly_do_tai_hoat_dong ?: '---') ?></p>
                        </div>
                        <div class="col-md-4">
                            <span class="text-secondary small fw-bold d-block">Tạm nghỉ (Từ - Đến):</span>
                            <span class="text-light"><?= Html::encode($model->ngay_bat_dau_tam_dong_cua) ?> đến <?= Html::encode($model->ngay_ket_thuc_tam_dong_cua) ?></span>
                            <p class="text-muted small mt-1 mb-0">Lý do tạm nghỉ: <?= Html::encode($model->ly_do_tam_nghi ?: '---') ?></p>
                        </div>
                    </div>

                    <hr class="border-secondary">

                    <div class="row">
                        <div class="col-md-4">
                            <span class="text-secondary small fw-bold">Tọa độ X (Kinh độ):</span>
                            <span class="text-info fw-semibold"><?= Html::encode($model->toa_do_x ?: 'Chưa xác định') ?></span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-secondary small fw-bold">Tọa độ Y (Vĩ độ):</span>
                            <span class="text-info fw-semibold"><?= Html::encode($model->toa_do_y ?: 'Chưa xác định') ?></span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-secondary small fw-bold">Dữ liệu không gian (Geom):</span>
                            <span class="text-light small font-monospace"><?= Html::encode($model->geom ?: 'Chưa có') ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>