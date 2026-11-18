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
                                return Html::a('<i class="fa-solid fa-trash"></i>', '#', [
                                    'class' => 'btn btn-sm btn-outline-danger rounded-circle btn-delete-modal ms-1',
                                    'data-url' => Url::to(['delete', 'id' => $model->id]),
                                    'data-name' => isset($model->ten_doanh_nghiep) ? $model->ten_doanh_nghiep : ('Hộ kinh doanh: ' . $model->chu_ho_ho_va_ten . ' (Mã: ' . $model->ma_so_ho_kinh_doanh . ')'),
                                    'data-lat' => $model->lat,
                                    'data-lng' => $model->lng,
                                    'title' => 'Xóa',
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
    <!-- ========================================================= -->
    <!-- BOOTSTRAP 5 DELETE CONFIRMATION MODAL + LEAFLET MINI MAP    -->
    <!-- ========================================================= -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden bg-white text-dark">

                <!-- Header nền trắng, chữ đỏ đậm dễ nhìn -->
                <div class="modal-header bg-white px-4 py-3 border-bottom d-flex align-items-center justify-content-between">
                    <h5 class="modal-title fw-bold text-danger d-flex align-items-center m-0" id="deleteModalLabel">
                        <i class="fa-solid fa-triangle-exclamation me-2 fs-4"></i> Xác nhận xóa dữ liệu
                    </h5>
                    <!-- Thay nút btn-close mặc định bằng thẻ button tuỳ chỉnh trực tiếp màu đen rõ nét -->
                    <button type="button" class="btn p-0 border-0 bg-transparent text-dark fw-bold fs-4 lh-1 shadow-none" data-bs-dismiss="modal" aria-label="Close" style="color: #000 !important; opacity: 0.8;">
                        &times;
                    </button>
                </div>

                <!-- Body nền trắng sáng -->
                <div class="modal-body p-4 bg-white">
                    <p class="text-secondary mb-3">Bạn có chắc chắn muốn xóa vĩnh viễn doanh nghiệp này khỏi hệ thống không?</p>

                    <div class="alert alert-light border border-secondary border-opacity-25 p-3 rounded-3 mb-3 text-dark shadow-sm bg-light">
                        <i class="fa-solid fa-building-circle-xmark text-danger me-2"></i>
                        <strong id="delete-item-name"></strong>
                    </div>

                    <label class="form-label small fw-bold text-muted mb-1">Xác nhận vị trí trước khi xóa:</label>
                    <div id="delete-preview-map" style="height: 220px; width: 100%; border-radius: 8px; border: 1px solid #cbd5e1;"></div>
                </div>

                <!-- Footer modal -->
                <div class="modal-footer bg-light border-top px-4 py-3">
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
    // Đảm bảo trang index đã load Leaflet CSS & JS (Nếu layout chính đã có thì không cần gọi lại)
    $this->registerCssFile('https://unpkg.com/leaflet@1.9.4/dist/leaflet.css');
    $this->registerJsFile('https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', ['depends' => [\yii\web\JqueryAsset::class]]);

    $this->registerJs("
    let deleteMap = null;
    let deleteMarker = null;

    // Khi click vào nút Xóa trên bảng
    $('.btn-delete-modal').on('click', function(e) {
        e.preventDefault();
        let url = $(this).data('url');
        let name = $(this).data('name');
        let lat = parseFloat($(this).data('lat'));
        let lng = parseFloat($(this).data('lng'));

        // Gắn action cho form xóa và tên bản ghi
        $('#deleteForm').attr('action', url);
        $('#delete-item-name').text(name);

        // Hiển thị Modal Bootstrap 5
        let myModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
        myModal.show();

        // Xử lý render bản đồ Leaflet mini khi Modal đã xuất hiện hoàn toàn (tránh lỗi xám tile map)
        $('#deleteConfirmModal').on('shown.bs.modal', function () {
            if (!deleteMap) {
                deleteMap = L.map('delete-preview-map').setView([10.7654, 106.6952], 15);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap'
                }).addTo(deleteMap);
            } else {
                deleteMap.invalidateSize();
            }

            // Nếu bản ghi có tọa độ không gian hợp lệ thì cắm Marker, nếu không thì về tâm Cầu Ông Lành
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

</div>