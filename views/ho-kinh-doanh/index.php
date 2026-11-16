<?php

use app\models\HoKinhDoanh;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\HoKinhDoanhSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Quản lý Hộ Kinh Doanh';
// $this->params['breadcrumbs'][] = ['label' => 'Trang chủ', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ho-kinh-doanh-index">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= Html::a('<i class="bi bi-plus-circle"></i> Thêm Hộ Kinh Doanh mới', ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover align-middle'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'header' => 'STT'],

            [
                'attribute' => 'ma_so_ho_kinh_doanh',
                'label' => 'Mã số HKD',
                'headerOptions' => ['style' => 'width: 130px;'],
            ],
            [
                'attribute' => 'so_giay_cn_dkkd',
                'label' => 'Số Giấy CN ĐKKD',
            ],
            [
                'attribute' => 'ngay_cap_giay_cn_dkkd',
                'label' => 'Ngày cấp',
                'headerOptions' => ['style' => 'width: 120px;'],
            ],
            [
                'attribute' => 'noi_cap',
                'label' => 'Nơi cấp',
            ],
            [
                'attribute' => 'chu_ho_ho_va_ten',
                'label' => 'Chủ hộ',
            ],
            [
                'attribute' => 'trang_thai_hoat_dong',
                'label' => 'Trạng thái',
                'headerOptions' => ['style' => 'width: 150px;'],
            ],
            [
                'class' => ActionColumn::className(),
                'header' => 'Thao tác',
                'headerOptions' => ['style' => 'width: 100px; text-align: center;'],
                'contentOptions' => ['style' => 'text-align: center;'],
                'urlCreator' => function ($action, HoKinhDoanh $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

</div>