<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HoKinhDoanh $model */

$this->title = 'Cập nhật Hộ kinh doanh: ' . $model->chu_ho_ho_va_ten;
$this->params['breadcrumbs'][] = ['label' => 'Quản lý Hộ kinh doanh', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->chu_ho_ho_va_ten, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="ho-kinh-doanh-update">

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-3 border-bottom gap-3">
        <div class="d-flex align-items-center">
            <div class="bg-success bg-gradient text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm me-3" style="width: 50px; height: 50px; min-width: 50px;">
                <i class="fa-solid fa-pen-to-square fa-lg"></i>
            </div>
            <div>
                <h1 class="h3 fw-bold text-dark mb-0">Cập nhật Hộ kinh doanh</h1>
                <p class="text-secondary small mb-0">
                    Chủ hộ: <span class="fw-semibold text-success"><?= Html::encode($model->chu_ho_ho_va_ten) ?></span> 
                    <span class="text-muted">(Mã HKD: <?= Html::encode($model->ma_so_ho_kinh_doanh) ?>)</span>
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