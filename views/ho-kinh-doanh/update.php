<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\HoKinhDoanh $model */

$this->title = 'Update Ho Kinh Doanh: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ho Kinh Doanhs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ho-kinh-doanh-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
