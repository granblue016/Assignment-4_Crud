<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DoanhNghiep $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="doanh-nghiep-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'text-light']
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'ma_so_doanh_nghiep')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'ten_doanh_nghiep')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'ten_viet_tat')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'ten_tieng_nuoc_ngoai')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'trang_thai_doanh_nghiep')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'loai_hinh_doanh_nghiep')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'ngay_thanh_lap')->textInput(['type' => 'date', 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'noi_cap')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'dai_dien_phap_luat')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'von_dieu_le')->textInput(['type' => 'number', 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'so_luong_lao_dong')->textInput(['type' => 'number', 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'nganh_nghe_chinh')->textInput(['maxlength' => true, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
        </div>
    </div>

    <!-- Các trường dài để riêng 1 dòng bên dưới -->
    <div class="row mt-3">
        <div class="col-12">
            <?= $form->field($model, 'dia_chi_day_du_tru_so_chinh')->textarea(['rows' => 2, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
            <?= $form->field($model, 'mo_ta_nganh_nghe_kinh_doanh')->textarea(['rows' => 3, 'class' => 'form-control bg-dark text-light border-secondary']) ?>
        </div>
    </div>

    <div class="form-group mt-4 pt-2 border-top border-secondary">
        <?= Html::submitButton('<i class="bi bi-save"></i> Lưu thay đổi', ['class' => 'btn btn-success btn-lg me-2']) ?>
        <?= Html::a('Quay lại', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-secondary btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>