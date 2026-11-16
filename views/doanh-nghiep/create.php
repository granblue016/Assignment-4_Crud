<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DoanhNghiep $model */

$this->title = 'Tạo Doanh Nghiệp';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý Doanh Nghiệp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doanh-nghiep-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
