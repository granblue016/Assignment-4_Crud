<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DoanhNghiep $model */

$this->title = 'Cập nhật Doanh nghiệp: ' . $model->ten_doanh_nghiep;
$this->params['breadcrumbs'][] = ['label' => 'Quản lý Doanh nghiệp', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ten_doanh_nghiep, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="doanh-nghiep-update">

    <!-- Header chứa tiêu đề, thông tin doanh nghiệp đang sửa và nút Quay lại -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-3 border-bottom gap-3">
        <div class="d-flex align-items-center">
            <div class="bg-primary bg-gradient text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm me-3" style="width: 50px; height: 50px; min-width: 50px;">
                <i class="fa-solid fa-pen-to-square fa-lg"></i>
            </div>
            <div>
                <h1 class="h3 fw-bold text-dark mb-0">Cập nhật Doanh nghiệp</h1>
                <p class="text-secondary small mb-0">
                    Đang chỉnh sửa cho: <span class="fw-semibold text-primary"><?= Html::encode($model->ten_doanh_nghiep) ?></span> 
                    <span class="text-muted">(Mã số: <?= Html::encode($model->ma_so_doanh_nghiep) ?>)</span>
                </p>
            </div>
        </div>

        <div class="d-flex gap-2">
            <?= Html::a('<i class="fa-solid fa-eye me-1"></i> Xem chi tiết', ['view', 'id' => $model->id], [
                'class' => 'btn btn-outline-info rounded-pill px-4 shadow-sm fw-semibold'
            ]) ?>
            <?= Html::a('<i class="fa-solid fa-arrow-left me-1"></i> Quay lại danh sách', ['index'], [
                'class' => 'btn btn-outline-secondary rounded-pill px-4 shadow-sm fw-semibold'
            ]) ?>
        </div>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>