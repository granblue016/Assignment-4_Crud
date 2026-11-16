<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HoKinhDoanh $model */

$this->title = 'Tạo Hộ Kinh Doanh';
$this->params['breadcrumbs'][] = ['label' => 'Quản lý Hộ Kinh Doanh', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ho-kinh-doanh-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
