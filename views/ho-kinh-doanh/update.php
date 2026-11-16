<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HoKinhDoanh $model */

$this->title = 'Cập nhật Hộ Kinh Doanh: ' . $model->chu_ho_ho_va_ten;
// $this->params['breadcrumbs'][] = ['label' => 'Trang chủ', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Quản lý Hộ Kinh Doanh', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' =>$model->chu_ho_ho_va_ten, 'url' => ['view', 'id' => $model->id]];$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="ho-kinh-doanh-update">

    <!-- Header trang update -->
    <div class="mb-4 pb-2 border-bottom border-secondary">
        <h2 class="text-light fw-bold mb-1">Cập nhật thông tin hộ kinh doanh</h2>
        <p class="text-muted mb-0">Chủ hộ: <span class="text-info"><?= Html::encode($model->chu_ho_ho_va_ten) ?></span> (Mã số HKD: <?= Html::encode($model->ma_so_ho_kinh_doanh) ?>)</p>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>