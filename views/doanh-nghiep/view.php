<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\DoanhNghiep $model */

$this->title = $model->ten_doanh_nghiep;
// $this->params['breadcrumbs'][] = ['label' => 'Trang chủ', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Quản lý Doanh Nghiệp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="doanh-nghiep-view">

    <!-- Header trang chi tiết với tên doanh nghiệp và các nút thao tác -->
    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom border-secondary">
        <div>
            <h2 class="text-light fw-bold mb-1"><?= Html::encode($model->ten_doanh_nghiep) ?></h2>
            <p class="text-muted mb-0">Mã số doanh nghiệp: <span class="text-info"><?= Html::encode($model->ma_so_doanh_nghiep) ?></span></p>
        </div>
        <div>
            <?= Html::a('<i class="bi bi-pencil-square"></i> Cập nhật', ['update', 'id' => $model->id], ['class' => 'btn btn-primary me-2']) ?>
            <?= Html::a('<i class="bi bi-trash"></i> Xóa', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Bạn có chắc chắn muốn xóa doanh nghiệp này không?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>

    <!-- Bảng chi tiết thông tin -->
    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table table-striped table-bordered detail-view text-light'],
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
            [
                'attribute' => 'von_dieu_le',
                'value' => function($model) {
                    return $model->von_dieu_le ? number_format($model->von_dieu_le) . ' VNĐ' : 'Chưa cập nhật';
                }
            ],
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