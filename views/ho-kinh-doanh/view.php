<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\HoKinhDoanh $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ho Kinh Doanhs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ho-kinh-doanh-view">

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
            'ma_so_ho_kinh_doanh',
            'so_giay_cn_dkkd',
            'ngay_cap_giay_cn_dkkd',
            'noi_cap',
            'ma_so_thue',
            'ngay_cap_ma_so_thue',
            'so_lao_dong',
            'so_lan_thay_doi',
            'von_kinh_doanh',
            'so_nha',
            'ten_duong',
            'phuong_xa',
            'thanh_pho',
            'dia_chi_day_du:ntext',
            'tru_so_chinh',
            'ma_nganh_nghe_kinh_doanh',
            'ten_nganh_nghe_kinh_doanh',
            'nganh_nghe_chinh',
            'mo_ta_nganh_nghe_kinh_doanh:ntext',
            'chu_ho_ho_va_ten',
            'chu_ho_cccd',
            'chu_ho_ngay_cap_cccd',
            'chu_ho_quoc_tich',
            'chu_ho_dia_chi_thuong_tru:ntext',
            'trang_thai_hoat_dong',
            'bang_hieu',
            'ngay_dong_cua',
            'ly_do_dong_cua:ntext',
            'ngay_tai_hoat_dong',
            'ly_do_tai_hoat_dong:ntext',
            'ngay_bat_dau_tam_dong_cua',
            'ngay_ket_thuc_tam_dong_cua',
            'ly_do_tam_nghi:ntext',
            'toa_do_x',
            'toa_do_y',
            'geom',
        ],
    ]) ?>

</div>
