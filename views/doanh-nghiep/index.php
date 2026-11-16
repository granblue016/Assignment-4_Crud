<?php

use app\models\DoanhNghiep;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DoanhNghiepSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Quản lý Doanh Nghiệp';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doanh-nghiep-index">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= Html::a('<i class="bi bi-plus-circle"></i> Thêm Doanh Nghiệp mới', ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover align-middle'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'header' => 'STT'],

            [
                'attribute' => 'ma_so_doanh_nghiep',
                'label' => 'Mã số DN',
                'headerOptions' => ['style' => 'width: 130px;'],
            ],
            [
                'attribute' => 'ten_doanh_nghiep',
                'label' => 'Tên Doanh Nghiệp',
            ],
            [
                'attribute' => 'dai_dien_phap_luat',
                'label' => 'Đại diện pháp luật',
            ],
            [
                'attribute' => 'dia_chi_day_du_tru_so_chinh',
                'label' => 'Địa chỉ trụ sở',
            ],
            [
                'attribute' => 'trang_thai_doanh_nghiep',
                'label' => 'Trạng thái',
                'headerOptions' => ['style' => 'width: 150px;'],
            ],
            [
                'class' => ActionColumn::className(),
                'header' => 'Thao tác',
                'headerOptions' => ['style' => 'width: 100px; text-align: center;'],
                'contentOptions' => ['style' => 'text-align: center;'],
                'urlCreator' => function ($action, DoanhNghiep $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

</div>