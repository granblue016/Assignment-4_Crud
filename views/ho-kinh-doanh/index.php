<?php

use app\models\HoKinhDoanh;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\HoKinhDoanhSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ho Kinh Doanhs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ho-kinh-doanh-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ho Kinh Doanh', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ma_so_ho_kinh_doanh',
            'so_giay_cn_dkkd',
            'ngay_cap_giay_cn_dkkd',
            'noi_cap',
            //'ma_so_thue',
            //'ngay_cap_ma_so_thue',
            //'so_lao_dong',
            //'so_lan_thay_doi',
            //'von_kinh_doanh',
            //'so_nha',
            //'ten_duong',
            //'phuong_xa',
            //'thanh_pho',
            //'dia_chi_day_du:ntext',
            //'tru_so_chinh',
            //'ma_nganh_nghe_kinh_doanh',
            //'ten_nganh_nghe_kinh_doanh',
            //'nganh_nghe_chinh',
            //'mo_ta_nganh_nghe_kinh_doanh:ntext',
            //'chu_ho_ho_va_ten',
            //'chu_ho_cccd',
            //'chu_ho_ngay_cap_cccd',
            //'chu_ho_quoc_tich',
            //'chu_ho_dia_chi_thuong_tru:ntext',
            //'trang_thai_hoat_dong',
            //'bang_hieu',
            //'ngay_dong_cua',
            //'ly_do_dong_cua:ntext',
            //'ngay_tai_hoat_dong',
            //'ly_do_tai_hoat_dong:ntext',
            //'ngay_bat_dau_tam_dong_cua',
            //'ngay_ket_thuc_tam_dong_cua',
            //'ly_do_tam_nghi:ntext',
            //'toa_do_x',
            //'toa_do_y',
            //'geom',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, HoKinhDoanh $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
