<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DoanhNghiep $model */

$this->title = 'Tạo Doanh Nghiệp';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý Doanh Nghiệp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doanh-nghiep-create">

    <!-- Header chứa tiêu đề, mô tả và nút Quay lại danh sách ở góc phải -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-3 border-bottom gap-3">
        <div class="d-flex align-items-center">
            <div class="bg-primary bg-gradient text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm me-3" style="width: 50px; height: 50px; min-width: 50px;">
                <i class="fa-solid fa-building-circle-arrow-right fa-lg"></i>
            </div>
            <div>
                <h1 class="h3 fw-bold text-dark mb-0">
                    <?= Html::encode($this->title) ?>
                </h1>
                <p class="text-secondary small mb-0">Nhập đầy đủ thông tin bên dưới để thêm mới doanh nghiệp vào hệ thống Web GIS</p>
            </div>
        </div>

        <div>
            <?= Html::a('<i class="fa-solid fa-arrow-left me-1"></i> Quay lại danh sách', ['index'], [
                'class' => 'btn btn-outline-secondary rounded-pill px-4 shadow-sm fw-semibold'
            ]) ?>
        </div>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>