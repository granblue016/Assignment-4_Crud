<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\DoanhNghiep $model */

$this->title = $model->ten_doanh_nghiep;
$this->params['breadcrumbs'][] = ['label' => 'Quản lý Doanh nghiệp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="doanh-nghiep-view">

    <!-- Header & Nút thao tác trên cùng -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 p-4 bg-dark text-white rounded-4 shadow-sm border border-secondary gap-3">
        <div class="d-flex align-items-center">
            <div class="bg-primary bg-gradient text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm me-3" style="width: 55px; height: 55px; min-width: 55px;">
                <i class="fa-solid fa-building fa-lg"></i>
            </div>
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-info text-dark px-2 py-1 fw-bold">MST: <?= Html::encode($model->ma_so_doanh_nghiep) ?></span>
                    <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-50 px-2 py-1">
                        <?= Html::encode($model->trang_thai_doanh_nghiep ?: 'Đang hoạt động') ?>
                    </span>
                </div>
                <h1 class="h4 fw-bold text-white mb-0"><?= Html::encode($model->ten_doanh_nghiep) ?></h1>
            </div>
        </div>
        <div class="d-flex gap-2">
            <?= Html::a('<i class="fa-solid fa-pen-to-square me-1"></i> Cập nhật', ['update', 'id' => $model->id], ['class' => 'btn btn-primary rounded-pill px-4 shadow-sm']) ?>

            <!-- Nút Xóa gọi Bootstrap 5 Modal kèm bản đồ -->
            <button type="button" class="btn btn-outline-danger rounded-pill px-4 btn-delete-modal shadow-sm"
                data-url="<?= Url::to(['delete', 'id' => $model->id]) ?>"
                data-name="<?= Html::encode($model->ten_doanh_nghiep) ?>"
                data-lat="<?= $model->lat ?>"
                data-lng="<?= $model->lng ?>">
                <i class="fa-solid fa-trash me-1"></i> Xóa
            </button>

            <?= Html::a('<i class="fa-solid fa-arrow-left me-1"></i> Danh sách', ['index'], ['class' => 'btn btn-outline-secondary rounded-pill px-4']) ?>
        </div>
    </div>

    <!-- Bố cục hiển thị chi tiết chia thành các Card song song -->
    <div class="row g-4">

        <!-- Cột trái: Thông tin định danh -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0 rounded-4 bg-dark text-white">
                <div class="card-header bg-dark border-bottom border-secondary py-3">
                    <h6 class="fw-bold mb-0 text-uppercase" style="color: #38bdf8 !important;">
                        <i class="fa-solid fa-id-card me-2"></i> Thông tin định danh
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-borderless align-middle mb-0">
                        <tr>
                            <th class="text-secondary w-40">Mã số doanh nghiệp:</th>
                            <td class="fw-bold text-info"><?= Html::encode($model->ma_so_doanh_nghiep) ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Tên viết tắt:</th>
                            <td class="text-light"><?= Html::encode($model->ten_viet_tat ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Tên nước ngoài:</th>
                            <td class="text-light"><?= Html::encode($model->ten_tieng_nuoc_ngoai ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Loại hình doanh nghiệp:</th>
                            <td class="text-light"><?= Html::encode($model->loai_hinh_doanh_nghiep ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Trạng thái doanh nghiệp:</th>
                            <td>
                                <span class="badge bg-info bg-opacity-25 text-info border border-info border-opacity-50 px-2 py-1">
                                    <?= Html::encode($model->trang_thai_doanh_nghiep ?: 'Đang hoạt động') ?>
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Cột phải: Pháp lý & Quy mô hoạt động -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0 rounded-4 bg-dark text-white">
                <div class="card-header bg-dark border-bottom border-secondary py-3">
                    <h6 class="fw-bold mb-0 text-uppercase" style="color: #4ade80 !important;">
                        <i class="fa-solid fa-scale-balanced me-2"></i> Pháp lý & Quy mô hoạt động
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-borderless align-middle mb-0">
                        <tr>
                            <th class="text-secondary w-40">Đại diện pháp luật:</th>
                            <td class="fw-semibold text-light"><?= Html::encode($model->dai_dien_phap_luat ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Ngày thành lập:</th>
                            <td class="text-light"><?= Html::encode($model->ngay_thanh_lap ?: 'Chưa cập nhật') ?> (Năm: <?= Html::encode($model->nam_thanh_lap_doanh_nghiep ?: '---') ?>)</td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Ngày đăng ký lần đầu:</th>
                            <td class="text-light"><?= Html::encode($model->dang_ky_lan_dau ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Nơi cấp giấy ĐKKD:</th>
                            <td class="text-light"><?= Html::encode($model->noi_cap ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Vốn điều lệ:</th>
                            <td class="text-success fw-bold">
                                <?= $model->von_dieu_le ? number_format($model->von_dieu_le, 0, ',', '.') . ' VNĐ' : 'Chưa cập nhật' ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Số lượng lao động:</th>
                            <td class="text-light"><?= $model->so_luong_lao_dong ? $model->so_luong_lao_dong . ' người' : 'Chưa cập nhật' ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Hàng 2: Thông tin thuế & Hồ sơ pháp lý bổ sung -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0 rounded-4 bg-dark text-white">
                <div class="card-header bg-dark border-bottom border-secondary py-3">
                    <h6 class="fw-bold mb-0 text-uppercase" style="color: #fbbf24 !important;">
                        <i class="fa-solid fa-file-invoice-dollar me-2"></i> Thông tin thuế & Vi phạm
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-borderless align-middle mb-0">
                        <tr>
                            <th class="text-secondary w-40">Loại thuế phải nộp:</th>
                            <td class="text-light"><?= Html::encode($model->loai_thue_phai_nop ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Tình trạng người nộp thuế:</th>
                            <td class="text-info fw-semibold"><?= Html::encode($model->tinh_trang_nguoi_nop_thue ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Địa chỉ thông báo thuế:</th>
                            <td class="text-light"><?= Html::encode($model->dia_chi_thong_bao_thue ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Thông tin vi phạm thuế:</th>
                            <td class="text-warning"><?= Html::encode($model->thong_tin_vi_pham_ve_thue ?: 'Không có') ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Cột phải 2: Ngành nghề kinh doanh & Cổ đông -->
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0 rounded-4 bg-dark text-white">
                <div class="card-header bg-dark border-bottom border-secondary py-3">
                    <h6 class="fw-bold mb-0 text-uppercase" style="color: #38bdf8 !important;">
                        <i class="fa-solid fa-briefcase me-2"></i> Ngành nghề & Cổ đông góp vốn
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-borderless align-middle mb-0">
                        <tr>
                            <th class="text-secondary w-40">Mã ngành nghề:</th>
                            <td class="text-light"><?= Html::encode($model->ma_nganh_nghe_kinh_doanh ?: '---') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Tên ngành nghề:</th>
                            <td class="text-light"><?= Html::encode($model->ten_nganh_nghe_kinh_doanh ?: '---') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Chứng chỉ hành nghề:</th>
                            <td class="text-light"><?= Html::encode($model->chung_chi_hanh_nghe ?: 'Không có') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Thành viên góp vốn:</th>
                            <td class="text-light"><?= Html::encode($model->danh_sach_thanh_vien_gop_von ?: 'Chưa cập nhật') ?></td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Lịch sử thay đổi:</th>
                            <td class="text-light"><?= Html::encode($model->cac_lan_dang_ky_thay_doi ?: 'Không có thay đổi') ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Hàng dưới: Địa chỉ Trụ sở & Tọa độ GIS kèm Bản đồ hiển thị trực quan -->
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-4 bg-dark text-white">
                <div class="card-header bg-dark border-bottom border-secondary py-3">
                    <h6 class="fw-bold mb-0 text-uppercase" style="color: #e879f9 !important;">
                        <i class="fa-solid fa-map-location-dot me-2"></i> Địa chỉ Trụ sở chính & Vị trí không gian GIS
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
                        <span class="text-secondary small fw-bold text-uppercase d-block mb-1">Địa chỉ đầy đủ trụ sở chính:</span>
                        <p class="text-light fw-semibold fs-5 mb-0"><?= Html::encode($model->dia_chi_day_du_tru_so_chinh ?: 'Chưa cập nhật địa chỉ') ?></p>
                    </div>

                    <hr class="border-secondary">

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <span class="text-secondary small fw-bold">Kinh độ (X / Longitude):</span>
                            <span class="text-info fw-semibold"><?= Html::encode($model->lng ?: 'Chưa xác định') ?></span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-secondary small fw-bold">Vĩ độ (Y / Latitude):</span>
                            <span class="text-info fw-semibold"><?= Html::encode($model->lat ?: 'Chưa xác định') ?></span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-secondary small fw-bold">Dữ liệu không gian (Geom):</span>
                            <span class="text-light small font-monospace"><?= Html::encode($model->geom ?: 'Chưa có') ?></span>
                        </div>
                    </div>

                    <!-- Khung bản đồ Leaflet xem vị trí doanh nghiệp -->
                    <div class="mt-3">
                        <span class="text-secondary small fw-bold text-uppercase d-block mb-2">Bản đồ vị trí doanh nghiệp trên địa bàn:</span>
                        <div id="view-map" style="height: 380px; width: 100%; border-radius: 8px; border: 1px solid #475569;"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- ========================================================= -->
<!-- BOOTSTRAP 5 DELETE CONFIRMATION MODAL + LEAFLET MINI MAP    -->
<!-- ========================================================= -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden" style="background-color: #ffffff !important; color: #212529 !important;">

            <!-- Header dùng inline style ép màu trắng và chữ đỏ, loại bỏ hoàn toàn ảnh hưởng của file CSS ngoài -->
            <div class="modal-header px-4 py-3 border-bottom" style="background-color: #ffffff !important;">
                <h5 class="modal-title fw-bold d-flex align-items-center" id="deleteModalLabel" style="color: #dc3545 !important;">
                    <i class="fa-solid fa-triangle-exclamation me-2 fs-4" style="color: #dc3545 !important;"></i> Xác nhận xóa dữ liệu
                </h5>
                <button type="button" class="btn p-0 border-0 bg-transparent text-dark fw-bold fs-4 lh-1 shadow-none ms-auto" data-bs-dismiss="modal" aria-label="Close" style="color: #000 !important; opacity: 0.8; line-height: 1;">
                    &times;
                </button>
            </div>

            <!-- Body modal -->
            <div class="modal-body p-4" style="background-color: #ffffff !important;">
                <p class="text-secondary mb-3">Bạn có chắc chắn muốn xóa vĩnh viễn doanh nghiệp này khỏi hệ thống không?</p>

                <div class="alert alert-light border border-secondary border-opacity-25 p-3 rounded-3 mb-3 text-dark shadow-sm" style="background-color: #f8f9fa !important;">
                    <i class="fa-solid fa-building-circle-xmark text-danger me-2"></i>
                    <strong id="delete-item-name"></strong>
                </div>

                <label class="form-label small fw-bold text-muted mb-1">Xác nhận vị trí trước khi xóa:</label>
                <div id="delete-preview-map" style="height: 220px; width: 100%; border-radius: 8px; border: 1px solid #cbd5e1;"></div>
            </div>

            <!-- Footer modal -->
            <div class="modal-footer border-top px-4 py-3" style="background-color: #f8f9fa !important;">
                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Hủy bỏ</button>
                <form id="deleteForm" method="POST" style="display:inline;">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                    <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">
                        <i class="fa-solid fa-trash me-1"></i> Xác nhận xóa
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
// Đăng ký thư viện Leaflet CSS & JS qua CDN
$this->registerCssFile('https://unpkg.com/leaflet@1.9.4/dist/leaflet.css');
$this->registerJsFile('https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', ['depends' => [\yii\web\JqueryAsset::class]]);

$viewLat = !empty($model->lat) ? (float)$model->lat : 10.7654;
$viewLng = !empty($model->lng) ? (float)$model->lng : 106.6952;
$hasViewCoord = (!empty($model->lat) && !empty($model->lng)) ? 'true' : 'false';

$this->registerJs("
    // 1. Khởi tạo bản đồ xem chi tiết ở cuối trang
    let viewLat = $viewLat;
    let viewLng = $viewLng;
    let hasViewCoord = $hasViewCoord;

    let viewMap = L.map('view-map').setView([viewLat, viewLng], hasViewCoord ? 17 : 15);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(viewMap);

    if (hasViewCoord) {
        L.marker([viewLat, viewLng]).addTo(viewMap)
          .bindPopup('<b>" . Html::encode($model->ten_doanh_nghiep) . "</b><br>Trụ sở chính').openPopup();
    }

    setTimeout(function() {
        viewMap.invalidateSize();
    }, 200);

    // 2. Xử lý Modal Xóa kèm bản đồ mini
    let deleteMap = null;
    let deleteMarker = null;

    $('.btn-delete-modal').on('click', function(e) {
        e.preventDefault();
        let url = $(this).data('url');
        let name = $(this).data('name');
        let lat = parseFloat($(this).data('lat'));
        let lng = parseFloat($(this).data('lng'));

        $('#deleteForm').attr('action', url);
        $('#delete-item-name').text(name);

        let myModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
        myModal.show();

        $('#deleteConfirmModal').on('shown.bs.modal', function () {
            if (!deleteMap) {
                deleteMap = L.map('delete-preview-map').setView([10.7654, 106.6952], 15);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap'
                }).addTo(deleteMap);
            } else {
                deleteMap.invalidateSize();
            }

            if (!isNaN(lat) && !isNaN(lng)) {
                deleteMap.setView([lat, lng], 16);
                if (deleteMarker) {
                    deleteMarker.setLatLng([lat, lng]);
                } else {
                    deleteMarker = L.marker([lat, lng]).addTo(deleteMap);
                }
            } else {
                deleteMap.setView([10.7654, 106.6952], 15);
                if (deleteMarker) {
                    deleteMarker.removeLayer(deleteMarker);
                    deleteMarker = null;
                }
            }
        });
    });
");
?>