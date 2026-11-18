<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DoanhNghiep $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="doanh-nghiep-form">
    <div class="card shadow-sm border-0 rounded-4 bg-dark text-white">
        <div class="card-body p-4">
            <?php $form = ActiveForm::begin([
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'form-label fw-semibold text-light small'],
                    'inputOptions' => ['class' => 'form-control bg-dark text-white border-secondary rounded-3'],
                    'errorOptions' => ['class' => 'invalid-feedback small'],
                ],
            ]); ?>

            <!-- Nhóm 1: Thông tin định danh -->
            <div class="row g-4">
                <div class="col-md-12">
                    <h6 class="text-uppercase fw-bold small mb-3 border-bottom border-secondary pb-2" style="color: #38bdf8 !important;">
                        <i class="fa-solid fa-id-card me-2"></i> Thông tin định danh & Tên doanh nghiệp
                    </h6>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'ma_so_doanh_nghiep')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Nhập mã số thuế / mã số doanh nghiệp...'
                    ])->label('Mã số doanh nghiệp') ?>

                    <?= $form->field($model, 'ten_doanh_nghiep')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Nhập tên chính thức bằng tiếng Việt...'
                    ])->label('Tên doanh nghiệp') ?>

                    <?= $form->field($model, 'ten_viet_tat')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Nhập tên viết tắt (nếu có)...'
                    ])->label('Tên viết tắt') ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'ten_tieng_nuoc_ngoai')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Nhập tên tiếng Anh / tiếng nước ngoài...'
                    ])->label('Tên tiếng nước ngoài') ?>

                    <?= $form->field($model, 'loai_hinh_doanh_nghiep')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'VD: Công ty TNHH, Công ty Cổ phần...'
                    ])->label('Loại hình doanh nghiệp') ?>

                    <?= $form->field($model, 'trang_thai_doanh_nghiep')->dropDownList([
                        'Đang hoạt động' => 'Đang hoạt động',
                        'Tạm ngừng kinh doanh' => 'Tạm ngừng kinh doanh',
                        'Đã giải thể' => 'Đã giải thể',
                    ], ['prompt' => '-- Chọn trạng thái hoạt động --', 'class' => 'form-select bg-dark text-white border-secondary rounded-3'])->label('Trạng thái doanh nghiệp') ?>
                </div>
            </div>

            <!-- Nhóm 2: Pháp lý, Quy mô & Thuế -->
            <div class="row g-4 mt-2">
                <div class="col-md-12">
                    <h6 class="text-uppercase fw-bold small mb-3 border-bottom border-secondary pb-2" style="color: #4ade80 !important;">
                        <i class="fa-solid fa-scale-balanced me-2"></i> Pháp lý, Quy mô & Thông tin thuế
                    </h6>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'ngay_thanh_lap')->textInput(['type' => 'date'])->label('Ngày thành lập') ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($model, 'nam_thanh_lap_doanh_nghiep')->textInput(['type' => 'number', 'placeholder' => 'VD: 2026'])->label('Năm thành lập') ?>
                        </div>
                    </div>

                    <?= $form->field($model, 'dang_ky_lan_dau')->textInput(['type' => 'date'])->label('Ngày đăng ký lần đầu') ?>

                    <?= $form->field($model, 'noi_cap')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'VD: Sở Kế hoạch và Đầu tư TP.HCM'
                    ])->label('Nơi cấp giấy ĐKKD') ?>

                    <?= $form->field($model, 'dai_dien_phap_luat')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Họ và tên người đại diện theo pháp luật...'
                    ])->label('Đại diện pháp luật') ?>

                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'von_dieu_le')->textInput([
                                'type' => 'number',
                                'min' => 0,
                                'placeholder' => 'Đơn vị: VNĐ'
                            ])->label('Vốn điều lệ (VNĐ)') ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($model, 'so_luong_lao_dong')->textInput([
                                'type' => 'number',
                                'min' => 0,
                                'placeholder' => 'Số người'
                            ])->label('Số lượng lao động') ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'loai_thue_phai_nop')->textInput(['placeholder' => 'VD: Thuế TNDN, GTGT...'])->label('Loại thuế phải nộp') ?>

                    <?= $form->field($model, 'tinh_trang_nguoi_nop_thue')->textInput(['placeholder' => 'Tình trạng người nộp thuế...'])->label('Tình trạng người nộp thuế') ?>

                    <?= $form->field($model, 'dia_chi_thong_bao_thue')->textarea(['rows' => 2, 'placeholder' => 'Địa chỉ nhận thông báo thuế...'])->label('Địa chỉ thông báo thuế') ?>

                    <?= $form->field($model, 'thong_tin_vi_pham_ve_thue')->textarea(['rows' => 2, 'placeholder' => 'Lịch sử vi phạm thuế (nếu có)...'])->label('Thông tin vi phạm về thuế') ?>
                </div>
            </div>

            <!-- Nhóm 3: Ngành nghề & Hồ sơ pháp lý bổ sung -->
            <div class="row g-4 mt-2">
                <div class="col-md-12">
                    <h6 class="text-uppercase fw-bold small mb-3 border-bottom border-secondary pb-2" style="color: #fbbf24 !important;">
                        <i class="fa-solid fa-briefcase me-2"></i> Ngành nghề kinh doanh & Hồ sơ bổ sung
                    </h6>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'ma_nganh_nghe_kinh_doanh')->textInput(['placeholder' => 'Mã ngành...'])->label('Mã ngành nghề') ?>
                        </div>
                        <div class="col-sm-8">
                            <?= $form->field($model, 'ten_nganh_nghe_kinh_doanh')->textInput(['placeholder' => 'Tên ngành...'])->label('Tên ngành nghề') ?>
                        </div>
                    </div>

                    <?= $form->field($model, 'nganh_nghe_chinh')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Mã hoặc tên ngành nghề kinh doanh chính...'
                    ])->label('Ngành nghề chính') ?>

                    <?= $form->field($model, 'mo_ta_nganh_nghe_kinh_doanh')->textarea([
                        'rows' => 3,
                        'placeholder' => 'Mô tả chi tiết các lĩnh vực kinh doanh đăng ký...'
                    ])->label('Mô tả chi tiết ngành nghề') ?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'danh_sach_thanh_vien_gop_von')->textarea(['rows' => 2, 'placeholder' => 'Danh sách cổ đông / thành viên góp vốn...'])->label('Danh sách thành viên góp vốn') ?>

                    <?= $form->field($model, 'cac_lan_dang_ky_thay_doi')->textarea(['rows' => 2, 'placeholder' => 'Lịch sử thay đổi đăng ký kinh doanh...'])->label('Các lần đăng ký thay đổi') ?>

                    <?= $form->field($model, 'chung_chi_hanh_nghe')->textarea(['rows' => 2, 'placeholder' => 'Thông tin chứng chỉ hành nghề...'])->label('Chứng chỉ hành nghề') ?>
                </div>
            </div>

            <!-- Nhóm 4: Địa chỉ Trụ sở & Tọa độ GIS -->
            <div class="row g-4 mt-2">
                <div class="col-md-12">
                    <h6 class="text-uppercase fw-bold small mb-3 border-bottom border-secondary pb-2" style="color: #e879f9 !important;">
                        <i class="fa-solid fa-map-location-dot me-2"></i> Địa chỉ Trụ sở chính & Tọa độ GIS
                    </h6>
                </div>

                <div class="col-md-3">
                    <?= $form->field($model, 'so_nha')->textInput(['placeholder' => 'Số nhà...'])->label('Số nhà') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'ten_duong')->textInput(['placeholder' => 'Tên đường...'])->label('Tên đường') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'phuong_xa')->textInput(['placeholder' => 'Phường / Xã...'])->label('Phường / Xã') ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'thanh_pho')->textInput(['placeholder' => 'Thành phố...'])->label('Thành phố') ?>
                </div>

                <div class="col-12">
                    <?= $form->field($model, 'dia_chi_day_du_tru_so_chinh')->textarea([
                        'rows' => 2,
                        'placeholder' => 'Nhập địa chỉ đầy đủ trụ sở chính...'
                    ])->label('Địa chỉ đầy đủ trụ sở chính') ?>
                </div>
            </div>

            <!-- ========================================================= -->
            <!-- KHU VỰC BẢN ĐỒ & NHẬP TỌA ĐỘ TRỰC TIẾP                      -->
            <!-- ========================================================= -->
            <div class="card border border-secondary shadow-sm rounded-4 mt-4 bg-dark text-white">
                <div class="card-header bg-secondary bg-opacity-25 py-3 border-bottom border-secondary">
                    <h5 class="m-0 fw-bold text-info">
                        <i class="fa-solid fa-map-location-dot me-2"></i> Xác định vị trí không gian (Nhập tay hoặc Chọn trên bản đồ)
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-light opacity-75 small mb-3">
                        Bạn có thể <b>nhập trực tiếp tọa độ</b> vào các ô bên dưới hoặc <b>click/kéo thả marker</b> trên bản đồ. Bản đồ và dữ liệu không gian sẽ tự động đồng bộ.
                    </p>

                    <!-- Khung hiển thị bản đồ Leaflet -->
                    <div id="map-picker" style="height: 400px; width: 100%; border-radius: 8px; border: 1px solid #475569;" class="mb-3"></div>

                    <!-- Các ô input cho phép nhập trực tiếp và đồng bộ 2 chiều với bản đồ -->
                    <div class="row g-3">
                        <div class="col-md-4">
                            <?= $form->field($model, 'lng')->textInput([
                                'id' => 'input-lng',
                                'type' => 'number',
                                'step' => 'any',
                                'placeholder' => 'Nhập kinh độ (VD: 106.701234)...'
                            ])->label('Kinh độ (X / Longitude)') ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'lat')->textInput([
                                'id' => 'input-lat',
                                'type' => 'number',
                                'step' => 'any',
                                'placeholder' => 'Nhập vĩ độ (VD: 10.765432)...'
                            ])->label('Vĩ độ (Y / Latitude)') ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'geom')->textInput([
                                'id' => 'input-geom',
                                'readonly' => true,
                                'placeholder' => 'Tự động sinh POINT(lng lat)...'
                            ])->label('Dữ liệu không gian (Geom)') ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Thanh nút bấm hành động -->
            <div class="form-group mt-4 pt-3 border-top border-secondary d-flex flex-wrap gap-2">
                <?= Html::submitButton(
                    $model->isNewRecord
                        ? '<i class="fa-solid fa-plus me-1"></i> Tạo mới doanh nghiệp'
                        : '<i class="fa-solid fa-floppy-disk me-1"></i> Lưu thay đổi',
                    ['class' => 'btn btn-success rounded-pill px-4 shadow-sm']
                ) ?>

                <?= Html::a(
                    '<i class="fa-solid fa-arrow-left me-1"></i> Quay lại',
                    $model->isNewRecord ? ['index'] : ['view', 'id' => $model->id],
                    ['class' => 'btn btn-outline-light rounded-pill px-4']
                ) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php
// Đăng ký thư viện Leaflet CSS & JS qua CDN
$this->registerCssFile('https://unpkg.com/leaflet@1.9.4/dist/leaflet.css');
$this->registerJsFile('https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', ['depends' => [\yii\web\JqueryAsset::class]]);

// Lấy tọa độ mặc định hoặc tọa độ sẵn có từ model (Trường hợp Update)
$defaultLat = !empty($model->lat) ? (float)$model->lat : 10.7654;
$defaultLng = !empty($model->lng) ? (float)$model->lng : 106.6952;
$hasCoord = (!empty($model->lat) && !empty($model->lng)) ? 'true' : 'false';

$this->registerJs("
    let initialLat = $defaultLat;
    let initialLng = $defaultLng;
    let hasCoord = $hasCoord;

    // Khởi tạo bản đồ Leaflet tại khung #map-picker (Tâm mặc định Cầu Ông Lành, TP.HCM)
    let map = L.map('map-picker').setView([initialLat, initialLng], hasCoord ? 17 : 15);

    // Thêm lớp bản đồ nền OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    let marker = null;

    // Nếu bản ghi đã có tọa độ từ trước (Trường hợp Update), cắm sẵn Marker & đồng bộ WKT
    if (hasCoord) {
        marker = L.marker([initialLat, initialLng], { draggable: true }).addTo(map);
        setupMarkerEvents(marker);
        updateGeomString(initialLat, initialLng);
    }

    // 1. TƯƠNG TÁC TỪ BẢN ĐỒ -> CẬP NHẬT INPUT
    map.on('click', function(e) {
        let lat = parseFloat(e.latlng.lat.toFixed(6));
        let lng = parseFloat(e.latlng.lng.toFixed(6));

        $('#input-lat').val(lat);
        $('#input-lng').val(lng);
        updateGeomString(lat, lng);

        if (marker) {
            marker.setLatLng([lat, lng]);
        } else {
            marker = L.marker([lat, lng], { draggable: true }).addTo(map);
            setupMarkerEvents(marker);
        }
    });

    // Hàm cập nhật chuỗi WKT cho cột geom
    function updateGeomString(lat, lng) {
        if (!isNaN(lat) && !isNaN(lng)) {
            $('#input-geom').val('POINT(' + lng + ' ' + lat + ')');
        } else {
            $('#input-geom').val('');
        }
    }

    // Lắng nghe sự kiện kéo thả (drag) marker
    function setupMarkerEvents(m) {
        m.on('dragend', function(event) {
            let position = event.target.getLatLng();
            let lat = parseFloat(position.lat.toFixed(6));
            let lng = parseFloat(position.lng.toFixed(6));

            $('#input-lat').val(lat);
            $('#input-lng').val(lng);
            updateGeomString(lat, lng);
        });
    }

    // 2. TƯƠNG TÁC TỪ INPUT NHẬP TAY -> DI CHUYỂN BẢN ĐỒ & MARKER
    $('#input-lat, #input-lng').on('input change', function() {
        let lat = parseFloat($('#input-lat').val());
        let lng = parseFloat($('#input-lng').val());

        if (!isNaN(lat) && !isNaN(lng) && lat >= -90 && lat <= 90 && lng >= -180 && lng <= 180) {
            updateGeomString(lat, lng);

            if (marker) {
                marker.setLatLng([lat, lng]);
            } else {
                marker = L.marker([lat, lng], { draggable: true }).addTo(map);
                setupMarkerEvents(marker);
            }

            map.setView([lat, lng], Math.max(map.getZoom(), 16));
        }
    });

    // Fix lỗi hiển thị tile bản đồ khi load trang
    setTimeout(function() {
        map.invalidateSize();
    }, 200);
");
?>