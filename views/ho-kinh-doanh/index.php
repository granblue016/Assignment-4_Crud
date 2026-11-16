<?php

use app\models\HoKinhDoanh;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\HoKinhDoanhSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Quản lý Hộ kinh doanh';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ho-kinh-doanh-index">

    <!-- Tiêu đề trang và Nút thêm mới -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 p-4 bg-white rounded-4 shadow-sm border gap-3">
        <div class="d-flex align-items-center">
            <div class="bg-success bg-gradient text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm me-3" style="width: 50px; height: 50px; min-width: 50px;">
                <i class="fa-solid fa-shop fa-lg"></i>
            </div>
            <div>
                <h1 class="h3 fw-bold text-dark mb-0"><?= Html::encode($this->title) ?></h1>
                <p class="text-secondary small mb-0">Danh sách các hộ kinh doanh cá thể trên địa bàn khu vực Cầu Ông Lành</p>
            </div>
        </div>
        <div>
            <?= Html::a('<i class="fa-solid fa-plus me-1"></i> Thêm Hộ kinh doanh mới', ['create'], ['class' => 'btn btn-success rounded-pill shadow-sm px-4 py-2 fw-semibold']) ?>
        </div>
    </div>

    <!-- Bảng dữ liệu giao diện tối đồng bộ -->
    <div class="card shadow-sm border-0 rounded-4 overflow-hidden bg-dark text-white">
        <div class="card-body p-0">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summaryOptions' => ['class' => 'p-3 text-light small'],
                'tableOptions' => ['class' => 'table table-dark table-hover align-middle mb-0'],
                'options' => ['class' => 'table-responsive'],
                'headerRowOptions' => ['class' => 'text-uppercase small text-nowrap border-bottom border-secondary'],
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'headerOptions' => ['class' => 'text-white text-center', 'style' => 'width: 60px;'],
                        'contentOptions' => ['class' => 'text-center fw-bold text-light'],
                    ],

                    // Mã số hộ kinh doanh
                    [
                        'attribute' => 'ma_so_ho_kinh_doanh',
                        'label' => 'Mã số HKD',
                        'headerOptions' => ['class' => 'text-white'],
                        'contentOptions' => ['class' => 'fw-semibold text-info'],
                    ],
                    // Số giấy chứng nhận ĐKKD
                    [
                        'attribute' => 'so_giay_cn_dkkd',
                        'label' => 'Số Giấy CN ĐKKD',
                        'headerOptions' => ['class' => 'text-white'],
                        'contentOptions' => ['class' => 'text-light'],
                    ],
                    // Ngày cấp giấy CN
                    [
                        'attribute' => 'ngay_cap_giay_cn_dkkd',
                        'label' => 'Ngày cấp',
                        'headerOptions' => ['class' => 'text-white'],
                        'contentOptions' => ['class' => 'text-light'],
                    ],
                    // Nơi cấp
                    [
                        'attribute' => 'noi_cap',
                        'label' => 'Nơi cấp',
                        'headerOptions' => ['class' => 'text-white'],
                        'contentOptions' => ['class' => 'text-light'],
                    ],
                    // Chủ hộ (Họ và tên)
                    [
                        'attribute' => 'chu_ho_ho_va_ten',
                        'label' => 'Chủ hộ',
                        'headerOptions' => ['class' => 'text-white'],
                        'contentOptions' => ['class' => 'fw-bold text-white'],
                    ],
                    // Trạng thái hoạt động
                    [
                        'attribute' => 'trang_thai_hoat_dong',
                        'label' => 'Trạng thái hoạt động',
                        'headerOptions' => ['class' => 'text-white'],
                        'format' => 'raw',
                        'value' => function($model) {
                            return '<span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-50 px-2 py-1">' 
                                . Html::encode($model->trang_thai_hoat_dong ?: 'Đang hoạt động') . '</span>';
                        }
                    ],
                    
                    // Cột thao tác
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Thao tác',
                        'headerOptions' => ['class' => 'text-white text-center'],
                        'contentOptions' => ['class' => 'text-center text-nowrap', 'style' => 'width: 140px;'],
                        'template' => '{view} {update} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<i class="fa-solid fa-eye"></i>', ['view', 'id' => $model->id], [
                                    'class' => 'btn btn-sm btn-outline-info rounded-circle me-1',
                                    'title' => 'Xem chi tiết',
                                ]);
                            },
                            'update' => function ($url, $model) {
                                return Html::a('<i class="fa-solid fa-pen-to-square"></i>', ['update', 'id' => $model->id], [
                                    'class' => 'btn btn-sm btn-outline-primary rounded-circle me-1',
                                    'title' => 'Chỉnh sửa',
                                ]);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('<i class="fa-solid fa-trash"></i>', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-sm btn-outline-danger rounded-circle',
                                    'title' => 'Xóa',
                                    'data' => [
                                        'confirm' => 'Bạn có chắc chắn muốn xóa hộ kinh doanh này không?',
                                        'method' => 'post',
                                    ],
                                ]);
                            },
                        ],
                    ],
                ],
                'pager' => [
                    'class' => \yii\bootstrap5\LinkPager::class,
                    'options' => ['class' => 'pagination justify-content-center my-4'],
                ],
            ]); ?>
        </div>
    </div>

</div>