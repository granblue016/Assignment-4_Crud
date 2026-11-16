<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DoanhNghiep $model */

$this->title = 'Cập nhật Doanh Nghiệp: ' . $model->ten_doanh_nghiep;
// $this->params['breadcrumbs'][] = ['label' => 'Trang chủ', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Quản lý Doanh Nghiệp', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ten_doanh_nghiep, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="doanh-nghiep-update">

    <!-- Header trang update -->
    <div class="mb-4 pb-2 border-bottom border-secondary">
        <h2 class="text-light fw-bold mb-1">Cập nhật thông tin doanh nghiệp</h2>
        <p class="text-muted mb-0">Đang chỉnh sửa cho: <span class="text-info"><?= Html::encode($model->ten_doanh_nghiep) ?></span> (Mã số: <?= Html::encode($model->ma_so_doanh_nghiep) ?>)</p>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>