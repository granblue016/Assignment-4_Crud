<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DoanhNghiepSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="doanh-nghiep-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ma_so_doanh_nghiep') ?>

    <?= $form->field($model, 'ten_doanh_nghiep') ?>

    <?= $form->field($model, 'ten_viet_tat') ?>

    <?= $form->field($model, 'ten_tieng_nuoc_ngoai') ?>

    <?php // echo $form->field($model, 'trang_thai_doanh_nghiep') ?>

    <?php // echo $form->field($model, 'loai_hinh_doanh_nghiep') ?>

    <?php // echo $form->field($model, 'ngay_thanh_lap') ?>

    <?php // echo $form->field($model, 'noi_cap') ?>

    <?php // echo $form->field($model, 'so_nha') ?>

    <?php // echo $form->field($model, 'ten_duong') ?>

    <?php // echo $form->field($model, 'phuong_xa') ?>

    <?php // echo $form->field($model, 'thanh_pho') ?>

    <?php // echo $form->field($model, 'dia_chi_day_du_tru_so_chinh') ?>

    <?php // echo $form->field($model, 'ma_nganh_nghe_kinh_doanh') ?>

    <?php // echo $form->field($model, 'ten_nganh_nghe_kinh_doanh') ?>

    <?php // echo $form->field($model, 'nganh_nghe_chinh') ?>

    <?php // echo $form->field($model, 'mo_ta_nganh_nghe_kinh_doanh') ?>

    <?php // echo $form->field($model, 'von_dieu_le') ?>

    <?php // echo $form->field($model, 'danh_sach_thanh_vien_gop_von') ?>

    <?php // echo $form->field($model, 'dai_dien_phap_luat') ?>

    <?php // echo $form->field($model, 'nam_thanh_lap_doanh_nghiep') ?>

    <?php // echo $form->field($model, 'tinh_trang_hoat_dong') ?>

    <?php // echo $form->field($model, 'dang_ky_lan_dau') ?>

    <?php // echo $form->field($model, 'cac_lan_dang_ky_thay_doi') ?>

    <?php // echo $form->field($model, 'chung_chi_hanh_nghe') ?>

    <?php // echo $form->field($model, 'dia_chi_thong_bao_thue') ?>

    <?php // echo $form->field($model, 'so_luong_lao_dong') ?>

    <?php // echo $form->field($model, 'loai_thue_phai_nop') ?>

    <?php // echo $form->field($model, 'tinh_trang_nguoi_nop_thue') ?>

    <?php // echo $form->field($model, 'thong_tin_vi_pham_ve_thue') ?>

    <?php // echo $form->field($model, 'toa_do_x') ?>

    <?php // echo $form->field($model, 'toa_do_y') ?>

    <?php // echo $form->field($model, 'geom') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
