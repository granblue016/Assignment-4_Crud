<?php

use app\models\DoanhNghiep;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DoanhNghiepSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Quản lý Doanh nghiệp';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doanh-nghiep-index">

    <!-- Tiêu đề trang và Nút thêm mới -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3 bg-white p-4 rounded-4 shadow-sm border">
        <div class="d-flex align-items-center gap-3">
            <div class="text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 48px; height: 48px; background-color: #0284c7; border-radius: 50%; flex-shrink: 0;">
                <i class="fa-solid fa-building fa-xl"></i>
            </div>
            <div>
                <h1 class="h3 fw-bold text-dark mb-1">
                    <?= Html::encode($this->title) ?>
                </h1>
                <p class="text-secondary small mb-0">Danh sách các doanh nghiệp đang hoạt động trên địa bàn khu vực Cầu Ông Lãnh</p>
            </div>
        </div>
        <div>
            <?= Html::a('<i class="fa-solid fa-plus me-1"></i> Thêm doanh nghiệp mới', ['create'], ['class' => 'btn btn-primary rounded-pill shadow-sm px-4 py-2']) ?>
        </div>
    </div>

    <!-- Bảng dữ liệu hiển thị chữ trắng sáng rõ trên nền tối -->
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
                        'headerOptions' => ['class' => 'text-white text-center', 'style' => 'width: 50px;'],
                        'contentOptions' => ['class' => 'text-center fw-bold text-light'],
                    ],

                    // Cột Mã số doanh nghiệp (Màu xanh sáng nổi bật)
                    [
                        'attribute' => 'ma_so_doanh_nghiep',
                        'headerOptions' => ['class' => 'text-white'],
                        'contentOptions' => ['class' => 'fw-semibold text-info'],
                    ],

                    // Cột Tên doanh nghiệp (Đổi sang text-white để hiển thị rõ ràng)
                    [
                        'attribute' => 'ten_doanh_nghiep',
                        'headerOptions' => ['class' => 'text-white'],
                        'contentOptions' => ['class' => 'fw-bold text-white'],
                    ],

                    // Cột Loại hình doanh nghiệp
                    [
                        'attribute' => 'loai_hinh_doanh_nghiep',
                        'headerOptions' => ['class' => 'text-white'],
                        'format' => 'raw',
                        'value' => function ($model) {
                            return '<span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-50 px-2 py-1">'
                                . Html::encode($model->loai_hinh_doanh_nghiep) . '</span>';
                        }
                    ],

                    // Ngành nghề chính
                    [
                        'attribute' => 'nganh_nghe_chinh',
                        'headerOptions' => ['class' => 'text-white'],
                        'contentOptions' => ['class' => 'text-light'],
                    ],

                    // Địa chỉ trụ sở
                    [
                        'attribute' => 'dia_chi_day_du_tru_so_chinh',
                        'headerOptions' => ['class' => 'text-white'],
                        'contentOptions' => ['class' => 'text-light'],
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
                                        'confirm' => 'Bạn có chắc chắn muốn xóa doanh nghiệp này không?',
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