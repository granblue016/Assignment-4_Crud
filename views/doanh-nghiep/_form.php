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

                <div class="col-md-4">
                    <?= $form->field($model, 'toa_do_x')->textInput(['placeholder' => 'Kinh độ X...'])->label('Tọa độ X (Kinh độ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'toa_do_y')->textInput(['placeholder' => 'Vĩ độ Y...'])->label('Tọa độ Y (Vĩ độ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'geom')->textInput(['placeholder' => 'Dữ liệu không gian geom...'])->label('Dữ liệu không gian (Geom)') ?>
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
                    ['class' => 'btn btn-outline-secondary rounded-pill px-4']
                ) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>