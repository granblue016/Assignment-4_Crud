<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\HoKinhDoanh $model */

$this->title = 'Hộ kinh doanh: ' . $model->chu_ho_ho_va_ten;
// $this->params['breadcrumbs'][] = ['label' => 'Trang chủ', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Quản lý Hộ Kinh Doanh', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->chu_ho_ho_va_ten;
\yii\web\YiiAsset::register($this);
?>
<div class="ho-kinh-doanh-view">

    <!-- Header trang chi tiết với thông tin chủ hộ và các nút thao tác -->
    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom border-secondary">
        <div>
            <h2 class="text-light fw-bold mb-1"><?= Html::encode($model->chu_ho_ho_va_ten) ?></h2>
            <p class="text-muted mb-0">Mã số hộ kinh doanh: <span class="text-info"><?= Html::encode($model->ma_so_ho_kinh_doanh) ?></span></p>
        </div>
        <div>
            <?= Html::a('<i class="bi bi-pencil-square"></i> Cập nhật', ['update', 'id' => $model->id], ['class' => 'btn btn-primary me-2']) ?>
            <?= Html::a('<i class="bi bi-trash"></i> Xóa', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Bạn có chắc chắn muốn xóa hộ kinh doanh này không?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>

    <!-- Bảng chi tiết thông tin hộ kinh doanh -->
    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table table-striped table-bordered detail-view text-light'],
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
            [
                'attribute' => 'von_kinh_doanh',
                'value' => function($model) {
                    return $model->von_kinh_doanh ? number_format($model->von_kinh_doanh) . ' VNĐ' : 'Chưa cập nhật';
                }
            ],
            'so_nha',
            'ten_duong',
            'phuong_xa',
            'thanh_pho',
            'dia_chi_day_du:ntext',
            'tru_so_chinh',
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