<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\HoKinhDoanhSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ho-kinh-doanh-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ma_so_ho_kinh_doanh') ?>

    <?= $form->field($model, 'so_giay_cn_dkkd') ?>

    <?= $form->field($model, 'ngay_cap_giay_cn_dkkd') ?>

    <?= $form->field($model, 'noi_cap') ?>

    <?php // echo $form->field($model, 'ma_so_thue') ?>

    <?php // echo $form->field($model, 'ngay_cap_ma_so_thue') ?>

    <?php // echo $form->field($model, 'so_lao_dong') ?>

    <?php // echo $form->field($model, 'so_lan_thay_doi') ?>

    <?php // echo $form->field($model, 'von_kinh_doanh') ?>

    <?php // echo $form->field($model, 'so_nha') ?>

    <?php // echo $form->field($model, 'ten_duong') ?>

    <?php // echo $form->field($model, 'phuong_xa') ?>

    <?php // echo $form->field($model, 'thanh_pho') ?>

    <?php // echo $form->field($model, 'dia_chi_day_du') ?>

    <?php // echo $form->field($model, 'tru_so_chinh') ?>

    <?php // echo $form->field($model, 'ma_nganh_nghe_kinh_doanh') ?>

    <?php // echo $form->field($model, 'ten_nganh_nghe_kinh_doanh') ?>

    <?php // echo $form->field($model, 'nganh_nghe_chinh') ?>

    <?php // echo $form->field($model, 'mo_ta_nganh_nghe_kinh_doanh') ?>

    <?php // echo $form->field($model, 'chu_ho_ho_va_ten') ?>

    <?php // echo $form->field($model, 'chu_ho_cccd') ?>

    <?php // echo $form->field($model, 'chu_ho_ngay_cap_cccd') ?>

    <?php // echo $form->field($model, 'chu_ho_quoc_tich') ?>

    <?php // echo $form->field($model, 'chu_ho_dia_chi_thuong_tru') ?>

    <?php // echo $form->field($model, 'trang_thai_hoat_dong') ?>

    <?php // echo $form->field($model, 'bang_hieu') ?>

    <?php // echo $form->field($model, 'ngay_dong_cua') ?>

    <?php // echo $form->field($model, 'ly_do_dong_cua') ?>

    <?php // echo $form->field($model, 'ngay_tai_hoat_dong') ?>

    <?php // echo $form->field($model, 'ly_do_tai_hoat_dong') ?>

    <?php // echo $form->field($model, 'ngay_bat_dau_tam_dong_cua') ?>

    <?php // echo $form->field($model, 'ngay_ket_thuc_tam_dong_cua') ?>

    <?php // echo $form->field($model, 'ly_do_tam_nghi') ?>

    <?php // echo $form->field($model, 'toa_do_x') ?>

    <?php // echo $form->field($model, 'toa_do_y') ?>

    <?php // echo $form->field($model, 'geom') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
