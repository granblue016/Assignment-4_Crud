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
                        'value' => function ($model) {
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
                                return Html::a('<i class="fa-solid fa-trash"></i>', '#', [
                                    'class' => 'btn btn-sm btn-outline-danger rounded-circle btn-delete-modal',
                                    'title' => 'Xóa',
                                    'data-url' => Url::to(['delete', 'id' => $model->id]),
                                    'data-name' => 'Hộ kinh doanh: ' . $model->chu_ho_ho_va_ten . ' (Mã: ' . $model->ma_so_ho_kinh_doanh . ')',
                                    'data-lat' => $model->lat,
                                    'data-lng' => $model->lng,
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

<!-- ========================================================= -->
<!-- BOOTSTRAP 5 DELETE CONFIRMATION MODAL + LEAFLET MINI MAP    -->
<!-- ========================================================= -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden" style="background-color: #ffffff !important; color: #212529 !important;">

            <!-- Header nền trắng, căn đều tiêu đề và dấu X sang hai bên -->
            <div class="modal-header bg-white px-4 py-3 border-bottom d-flex justify-content-between align-items-center" style="background-color: #ffffff !important;">
                <h5 class="modal-title fw-bold text-danger d-flex align-items-center m-0" id="deleteModalLabel" style="color: #dc3545 !important;">
                    <i class="fa-solid fa-triangle-exclamation me-2 fs-4" style="color: #dc3545 !important;"></i>
                    <span>Xác nhận xóa dữ liệu</span>
                </h5>

                <!-- Nút đóng dấu X được đẩy sát sang góc phải -->
                <button type="button" class="btn p-0 border-0 bg-transparent text-dark fw-bold fs-4 lh-1 shadow-none ms-auto" data-bs-dismiss="modal" aria-label="Close" style="color: #000 !important; opacity: 0.8; line-height: 1;">
                    &times;
                </button>
            </div>

            <!-- Body modal -->
            <div class="modal-body p-4" style="background-color: #ffffff !important;">
                <p class="text-secondary mb-3">Bạn có chắc chắn muốn xóa vĩnh viễn hộ kinh doanh này khỏi hệ thống không?</p>

                <div class="alert alert-light border border-secondary border-opacity-25 p-3 rounded-3 mb-3 text-dark shadow-sm" style="background-color: #f8f9fa !important;">
                    <i class="fa-solid fa-shop text-danger me-2"></i>
                    <strong id="delete-item-name"></strong>
                </div>

                <label class="form-label small fw-bold text-muted mb-1">Xác nhận vị trí trước khi xóa:</label>
                <div id="delete-preview-map" style="height: 220px; width: 100%; border-radius: 8px; border: 1px solid #cbd5e1;"></div>
            </div>

            <!-- Footer modal -->
            <div class="modal-footer border-top px-4 py-3" style="background-color: #f8f9fa !important;">
                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Hủy bỏ</button>
                <form id="deleteForm" method="POST" style="display:inline;">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                    <button type="submit" class="btn btn-danger rounded-pill px-4 shadow-sm">
                        <i class="fa-solid fa-trash me-1"></i> Xác nhận xóa
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
// Đăng ký thư viện Leaflet CSS & JS qua CDN
$this->registerCssFile('https://unpkg.com/leaflet@1.9.4/dist/leaflet.css');
$this->registerJsFile('https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', ['depends' => [\yii\web\JqueryAsset::class]]);

$this->registerJs("
    let deleteMap = null;
    let deleteMarker = null;

    $(document).on('click', '.btn-delete-modal', function(e) {
        e.preventDefault();
        let url = $(this).data('url');
        let name = $(this).data('name');
        let lat = parseFloat($(this).data('lat'));
        let lng = parseFloat($(this).data('lng'));

        $('#deleteForm').attr('action', url);
        $('#delete-item-name').text(name);

        let myModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
        myModal.show();

        $('#deleteConfirmModal').on('shown.bs.modal', function () {
            if (!deleteMap) {
                deleteMap = L.map('delete-preview-map').setView([10.7654, 106.6952], 15);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(deleteMap);
            } else {
                deleteMap.invalidateSize();
            }

            if (!isNaN(lat) && !isNaN(lng)) {
                deleteMap.setView([lat, lng], 16);
                if (deleteMarker) {
                    deleteMarker.setLatLng([lat, lng]);
                } else {
                    deleteMarker = L.marker([lat, lng]).addTo(deleteMap);
                }
            } else {
                deleteMap.setView([10.7654, 106.6952], 15);
                if (deleteMarker) {
                    deleteMap.removeLayer(deleteMarker);
                    deleteMarker = null;
                }
            }
        });
    });
");
?>