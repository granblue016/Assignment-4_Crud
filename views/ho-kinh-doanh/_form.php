<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\HoKinhDoanh $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ho-kinh-doanh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ma_so_ho_kinh_doanh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'so_giay_cn_dkkd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngay_cap_giay_cn_dkkd')->textInput() ?>

    <?= $form->field($model, 'noi_cap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ma_so_thue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngay_cap_ma_so_thue')->textInput() ?>

    <?= $form->field($model, 'so_lao_dong')->textInput() ?>

    <?= $form->field($model, 'so_lan_thay_doi')->textInput() ?>

    <?= $form->field($model, 'von_kinh_doanh')->textInput() ?>

    <?= $form->field($model, 'so_nha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_duong')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phuong_xa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thanh_pho')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dia_chi_day_du')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tru_so_chinh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ma_nganh_nghe_kinh_doanh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_nganh_nghe_kinh_doanh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nganh_nghe_chinh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mo_ta_nganh_nghe_kinh_doanh')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'chu_ho_ho_va_ten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chu_ho_cccd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chu_ho_ngay_cap_cccd')->textInput() ?>

    <?= $form->field($model, 'chu_ho_quoc_tich')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chu_ho_dia_chi_thuong_tru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'trang_thai_hoat_dong')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bang_hieu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngay_dong_cua')->textInput() ?>

    <?= $form->field($model, 'ly_do_dong_cua')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ngay_tai_hoat_dong')->textInput() ?>

    <?= $form->field($model, 'ly_do_tai_hoat_dong')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ngay_bat_dau_tam_dong_cua')->textInput() ?>

    <?= $form->field($model, 'ngay_ket_thuc_tam_dong_cua')->textInput() ?>

    <?= $form->field($model, 'ly_do_tam_nghi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'toa_do_x')->textInput() ?>

    <?= $form->field($model, 'toa_do_y')->textInput() ?>

    <?= $form->field($model, 'geom')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
