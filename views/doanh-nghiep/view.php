<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\DoanhNghiep $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Doanh Nghieps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="doanh-nghiep-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ma_so_doanh_nghiep',
            'ten_doanh_nghiep',
            'ten_viet_tat',
            'ten_tieng_nuoc_ngoai',
            'trang_thai_doanh_nghiep',
            'loai_hinh_doanh_nghiep',
            'ngay_thanh_lap',
            'noi_cap',
            'so_nha',
            'ten_duong',
            'phuong_xa',
            'thanh_pho',
            'dia_chi_day_du_tru_so_chinh',
            'ma_nganh_nghe_kinh_doanh',
            'ten_nganh_nghe_kinh_doanh',
            'nganh_nghe_chinh',
            'mo_ta_nganh_nghe_kinh_doanh:ntext',
            'von_dieu_le',
            'danh_sach_thanh_vien_gop_von:ntext',
            'dai_dien_phap_luat',
            'nam_thanh_lap_doanh_nghiep',
            'tinh_trang_hoat_dong',
            'dang_ky_lan_dau',
            'cac_lan_dang_ky_thay_doi:ntext',
            'chung_chi_hanh_nghe:ntext',
            'dia_chi_thong_bao_thue:ntext',
            'so_luong_lao_dong',
            'loai_thue_phai_nop',
            'tinh_trang_nguoi_nop_thue',
            'thong_tin_vi_pham_ve_thue:ntext',
            'toa_do_x',
            'toa_do_y',
            'geom',
        ],
    ]) ?>

</div>
