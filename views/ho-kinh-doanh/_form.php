<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\HoKinhDoanh $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ho-kinh-doanh-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'text-light']
    ]); ?>

    <div class="row">
        <!-- Cột 1: Thông tin pháp lý & định danh -->
        <div class="col-md-6">
            <h5 class="text-info mb-3"><i class="bi bi-file-earmark-text"></i> Thông tin pháp lý</h5>
            <?= $form->field($model, 'ma_so_ho_kinh_doanh')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'so_giay_cn_dkkd')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'ngay_cap_giay_cn_dkkd')->textInput(['type' => 'date', 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'noi_cap')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'ma_so_thue')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'ngay_cap_ma_so_thue')->textInput(['type' => 'date', 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'von_kinh_doanh')->textInput(['type' => 'number', 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'so_lao_dong')->textInput(['type' => 'number', 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'trang_thai_hoat_dong')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
        </div>

        <!-- Cột 2: Thông tin chủ hộ & ngành nghề -->
        <div class="col-md-6">
            <h5 class="text-success mb-3"><i class="bi bi-person-badge"></i> Thông tin Chủ hộ & Địa điểm</h5>
            <?= $form->field($model, 'chu_ho_ho_va_ten')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'chu_ho_cccd')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'chu_ho_ngay_cap_cccd')->textInput(['type' => 'date', 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'chu_ho_quoc_tich')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'bang_hieu')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'nganh_nghe_chinh')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
        </div>
    </div>

    <!-- Các trường textarea hoặc địa chỉ dài để bên dưới -->
    <div class="row mt-3">
        <div class="col-12">
            <h5 class="text-warning mb-3"><i class="bi bi-geo-alt"></i> Chi tiết địa chỉ & Ngành nghề</h5>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'dia_chi_day_du')->textarea(['rows' => 3, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'chu_ho_dia_chi_thuong_tru')->textarea(['rows' => 3, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'mo_ta_nganh_nghe_kinh_doanh')->textarea(['rows' => 3, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
        </div>
    </div>

    <!-- Nút hành động -->
    <div class="form-group mt-4 pt-3 border-top border-secondary">
        <?= Html::submitButton('<i class="bi bi-save"></i> Lưu thay đổi', ['class' => 'btn btn-success btn-lg me-2']) ?>
        <?= Html::a('Quay lại', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-secondary btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>