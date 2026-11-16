<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DoanhNghiep $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="doanh-nghiep-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ma_so_doanh_nghiep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_doanh_nghiep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_viet_tat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_tieng_nuoc_ngoai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trang_thai_doanh_nghiep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loai_hinh_doanh_nghiep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngay_thanh_lap')->textInput() ?>

    <?= $form->field($model, 'noi_cap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'so_nha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_duong')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phuong_xa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thanh_pho')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dia_chi_day_du_tru_so_chinh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ma_nganh_nghe_kinh_doanh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_nganh_nghe_kinh_doanh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nganh_nghe_chinh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mo_ta_nganh_nghe_kinh_doanh')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'von_dieu_le')->textInput() ?>

    <?= $form->field($model, 'danh_sach_thanh_vien_gop_von')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dai_dien_phap_luat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nam_thanh_lap_doanh_nghiep')->textInput() ?>

    <?= $form->field($model, 'tinh_trang_hoat_dong')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dang_ky_lan_dau')->textInput() ?>

    <?= $form->field($model, 'cac_lan_dang_ky_thay_doi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'chung_chi_hanh_nghe')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dia_chi_thong_bao_thue')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'so_luong_lao_dong')->textInput() ?>

    <?= $form->field($model, 'loai_thue_phai_nop')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tinh_trang_nguoi_nop_thue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thong_tin_vi_pham_ve_thue')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'toa_do_x')->textInput() ?>

    <?= $form->field($model, 'toa_do_y')->textInput() ?>

    <?= $form->field($model, 'geom')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
