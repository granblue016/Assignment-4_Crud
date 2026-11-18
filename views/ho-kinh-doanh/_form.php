<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\HoKinhDoanh $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="ho-kinh-doanh-form">
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

            <!-- Hàng 1: Thông tin định danh & Quy mô -->
            <div class="row g-4">
                <!-- Cột 1: Thông tin định danh -->
                <div class="col-md-6">
                    <h6 class="text-uppercase fw-bold small mb-3 border-bottom border-secondary pb-2" style="color: #38bdf8 !important;">
                        <i class="fa-solid fa-store me-2"></i> Thông tin Hộ kinh doanh
                    </h6>
                    
                    <?= $form->field($model, 'ma_so_ho_kinh_doanh')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Nhập mã số hộ kinh doanh...'
                    ])->label('Mã số hộ kinh doanh') ?>

                    <?= $form->field($model, 'so_giay_cn_dkkd')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Nhập số giấy chứng nhận ĐKKD...'
                    ])->label('Số giấy CN ĐKKD') ?>

                    <?= $form->field($model, 'ngay_cap_giay_cn_dkkd')->textInput([
                        'type' => 'date'
                    ])->label('Ngày cấp giấy CN ĐKKD') ?>

                    <?= $form->field($model, 'noi_cap')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'VD: UBND Quận 4, TP. Hồ Chí Minh'
                    ])->label('Nơi cấp') ?>

                    <?= $form->field($model, 'ma_so_thue')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Nhập mã số thuế (nếu có)...'
                    ])->label('Mã số thuế') ?>

                    <?= $form->field($model, 'ngay_cap_ma_so_thue')->textInput([
                        'type' => 'date'
                    ])->label('Ngày cấp mã số thuế') ?>
                </div>

                <!-- Cột 2: Quy mô & Ngành nghề -->
                <div class="col-md-6">
                    <h6 class="text-uppercase fw-bold small mb-3 border-bottom border-secondary pb-2" style="color: #4ade80 !important;">
                        <i class="fa-solid fa-scale-balanced me-2"></i> Quy mô & Ngành nghề
                    </h6>

                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'von_kinh_doanh')->textInput([
                                'type' => 'number',
                                'min' => 0,
                                'placeholder' => 'Đơn vị: VNĐ'
                            ])->label('Vốn kinh doanh (VNĐ)') ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($model, 'so_lao_dong')->textInput([
                                'type' => 'number',
                                'min' => 0,
                                'placeholder' => 'Số người'
                            ])->label('Số lượng lao động') ?>
                        </div>
                    </div>

                    <?= $form->field($model, 'nganh_nghe_chinh')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Nhập ngành nghề kinh doanh chính...'
                    ])->label('Ngành nghề chính') ?>

                    <?= $form->field($model, 'bang_hieu')->textInput([
                        'maxlength' => true,
                        'placeholder' => 'Nhập tên bảng hiệu...'
                    ])->label('Tên bảng hiệu') ?>

                    <?= $form->field($model, 'trang_thai_hoat_dong')->dropDownList([
                        'Đang hoạt động' => 'Đang hoạt động',
                        'Tạm ngừng' => 'Tạm ngừng',
                        'Đã giải thể' => 'Đã giải thể',
                    ], ['prompt' => '-- Chọn trạng thái --', 'class' => 'form-select bg-dark text-white border-secondary rounded-3'])->label('Trạng thái hoạt động') ?>

                    <?= $form->field($model, 'so_lan_thay_doi')->textInput([
                        'type' => 'number',
                        'min' => 0
                    ])->label('Số lần thay đổi') ?>
                </div>
            </div>

            <!-- Hàng 2: Chủ hộ & Địa điểm kinh doanh -->
            <div class="row mt-4 pt-2">
                <div class="col-12">
                    <h6 class="text-uppercase fw-bold small mb-3 border-bottom border-secondary pb-2" style="color: #fbbf24 !important;">
                        <i class="fa-solid fa-user-gear me-2"></i> Chủ hộ & Địa điểm kinh doanh
                    </h6>

                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'chu_ho_ho_va_ten')->textInput([
                                'maxlength' => true,
                                'placeholder' => 'Họ và tên chủ hộ kinh doanh...'
                            ])->label('Họ và tên chủ hộ') ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'chu_ho_cccd')->textInput([
                                'maxlength' => true,
                                'placeholder' => 'Số căn cước công dân / CMND...'
                            ])->label('Số CCCD chủ hộ') ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'chu_ho_ngay_cap_cccd')->textInput(['type' => 'date'])->label('Ngày cấp CCCD') ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'chu_ho_quoc_tich')->textInput(['placeholder' => 'Việt Nam...'])->label('Quốc tịch') ?>
                        </div>
                    </div>

                    <?= $form->field($model, 'chu_ho_dia_chi_thuong_tru')->textarea(['rows' => 2, 'placeholder' => 'Địa chỉ thường trú của chủ hộ...'])->label('Địa chỉ thường trú chủ hộ') ?>

                    <div class="row mt-3">
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
                    </div>

                    <?= $form->field($model, 'dia_chi_day_du')->textarea([
                        'rows' => 2,
                        'placeholder' => 'Nhập địa chỉ điểm kinh doanh đầy đủ...'
                    ])->label('Địa chỉ đầy đủ') ?>

                    <?= $form->field($model, 'tru_so_chinh')->textInput(['placeholder' => 'Trụ sở chính...'])->label('Trụ sở chính') ?>

                    <?= $form->field($model, 'mo_ta_nganh_nghe_kinh_doanh')->textarea([
                        'rows' => 2,
                        'placeholder' => 'Mô tả chi tiết ngành nghề kinh doanh...'
                    ])->label('Mô tả chi tiết ngành nghề') ?>
                </div>
            </div>

            <!-- Hàng 3: Biến động trạng thái & Tọa độ GIS kèm Bản đồ tương tác -->
            <div class="row mt-4 pt-2">
                <div class="col-12">
                    <h6 class="text-uppercase fw-bold small mb-3 border-bottom border-secondary pb-2" style="color: #e879f9 !important;">
                        <i class="fa-solid fa-map-location-dot me-2"></i> Biến động trạng thái & Tọa độ GIS
                    </h6>

                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'ngay_dong_cua')->textInput(['type' => 'date'])->label('Ngày đóng cửa') ?>
                            <?= $form->field($model, 'ly_do_dong_cua')->textarea(['rows' => 2, 'placeholder' => 'Lý do đóng cửa...'])->label('Lý do đóng cửa') ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'ngay_tai_hoat_dong')->textInput(['type' => 'date'])->label('Ngày tái hoạt động') ?>
                            <?= $form->field($model, 'ly_do_tai_hoat_dong')->textarea(['rows' => 2, 'placeholder' => 'Lý do tái hoạt động...'])->label('Lý do tái hoạt động') ?>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <?= $form->field($model, 'ngay_bat_dau_tam_dong_cua')->textInput(['type' => 'date'])->label('Ngày bắt đầu tạm đóng cửa') ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'ngay_ket_thuc_tam_dong_cua')->textInput(['type' => 'date'])->label('Ngày kết thúc tạm đóng cửa') ?>
                        </div>
                    </div>
                    <?= $form->field($model, 'ly_do_tam_nghi')->textarea(['rows' => 2, 'placeholder' => 'Lý do tạm nghỉ...'])->label('Lý do tạm nghỉ') ?>

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

                </div>
            </div>

            <!-- Nút hành động -->
            <div class="form-group mt-4 pt-3 border-top border-secondary d-flex flex-wrap gap-2">
                <?= Html::submitButton(
                    $model->isNewRecord 
                        ? '<i class="fa-solid fa-plus me-1"></i> Tạo mới hộ kinh doanh' 
                        : '<i class="fa-solid fa-floppy-disk me-1"></i> Lưu thay đổi', 
                    ['class' => 'btn btn-success rounded-pill px-4 shadow-sm']
                ) ?>
                
                <?= Html::a(
                    '<i class="fa-solid fa-arrow-left me-1"></i> Quay lại', 
                    $model->isNewRecord ? ['index'] : ['view', 'id' => $model->id], 
                    ['class' => 'btn btn-outline-secondary rounded-pill px-4']
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