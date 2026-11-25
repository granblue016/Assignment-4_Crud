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

// Đăng ký CSS giao diện Atlas cho panel phải và Leaflet
$this->registerCssFile('@web/css/ho-kinh-doanh-atlas.css');
$this->registerCssFile('https://unpkg.com/leaflet@1.9.4/dist/leaflet.css');
$this->registerJsFile('https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', ['depends' => [\yii\web\JqueryAsset::class]]);
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
                <p class="text-secondary small mb-0">Danh sách các hộ kinh doanh cá thể trên địa bàn</p>
            </div>
        </div>
        <div>
            <?= Html::a('<i class="fa-solid fa-plus me-1"></i> Thêm Hộ kinh doanh mới', ['create'], ['class' => 'btn btn-success rounded-pill shadow-sm px-4 py-2 fw-semibold']) ?>
        </div>
    </div>

    <!-- Khung bố cục Atlas: Nội dung chính bên trái + Panel tìm kiếm bên phải -->
    <div class="hkd-atlas-shell" id="hkdAtlasShell">

        <!-- Vùng chính bên trái: Bảng dữ liệu -->
        <div class="hkd-atlas-main">
            <div class="card shadow-sm border rounded-4 overflow-hidden bg-white">
                <div class="card-body p-0">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => null,
                        'summaryOptions' => ['class' => 'p-3 text-secondary small'],
                        'tableOptions' => ['class' => 'table table-hover align-middle mb-0'],
                        'options' => ['class' => 'table-responsive'],
                        'headerRowOptions' => ['class' => 'text-uppercase small text-nowrap border-bottom'],
                        'columns' => [
                            [
                                'class' => 'yii\grid\SerialColumn',
                                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 60px;'],
                                'contentOptions' => ['class' => 'text-center fw-bold'],
                            ],
                            [
                                'attribute' => 'ma_so_ho_kinh_doanh',
                                'label' => 'Mã số HKD',
                                'contentOptions' => ['class' => 'fw-semibold text-primary'],
                            ],
                            [
                                'attribute' => 'so_giay_cn_dkkd',
                                'label' => 'Số Giấy CN ĐKKD',
                            ],
                            [
                                'attribute' => 'ngay_cap_giay_cn_dkkd',
                                'label' => 'Ngày cấp',
                            ],
                            [
                                'attribute' => 'noi_cap',
                                'label' => 'Nơi cấp',
                            ],
                            [
                                'attribute' => 'chu_ho_ho_va_ten',
                                'label' => 'Chủ hộ',
                                'contentOptions' => ['class' => 'fw-bold'],
                            ],
                            [
                                'attribute' => 'trang_thai_hoat_dong',
                                'label' => 'Trạng thái hoạt động',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return '<span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2 py-1">'
                                        . Html::encode($model->trang_thai_hoat_dong ?: 'Đang hoạt động') . '</span>';
                                }
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => 'Thao tác',
                                'headerOptions' => ['class' => 'text-center'],
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

        <!-- Nút mở lại panel tìm kiếm khi đã thu gọn -->
        <button type="button" class="hkd-panel-toggle" id="hkdToggleSearchBtn" aria-expanded="true">
            <i class="fa-solid fa-sliders"></i>
            <span class="hkd-toggle-label">Bộ lọc &amp; Tìm kiếm</span>
        </button>

        <!-- Panel tìm kiếm riêng bên phải kiểu Atlas -->
        <aside class="hkd-search-panel" id="hkdSearchPanel" aria-label="Tìm kiếm hộ kinh doanh">
            <div class="hkd-search-panel__header">
                <div>
                    <h3 class="hkd-search-panel__title">Tra cứu hộ kinh doanh</h3>
                    <p class="hkd-search-panel__subtitle">Lọc theo tên, mã, địa chỉ hoặc ngành nghề</p>
                </div>
                <button type="button" class="hkd-panel-close" id="hkdCloseSearchBtn" title="Thu gọn">&times;</button>
            </div>

            <div class="hkd-search-panel__body">
                <?= $this->render('_search', ['model' => $searchModel]) ?>
            </div>
        </aside>

    </div>

</div>

<!-- ========================================================= -->
<!-- BOOTSTRAP 5 DELETE CONFIRMATION MODAL + LEAFLET MINI MAP    -->
<!-- ========================================================= -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden bg-white text-dark">
            <div class="modal-header bg-white px-4 py-3 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="modal-title fw-bold text-danger d-flex align-items-center m-0" id="deleteModalLabel">
                    <i class="fa-solid fa-triangle-exclamation me-2 fs-4"></i>
                    <span>Xác nhận xóa dữ liệu</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4 bg-white">
                <p class="text-secondary mb-3">Bạn có chắc chắn muốn xóa vĩnh viễn hộ kinh doanh này khỏi hệ thống không?</p>

                <div class="alert alert-light border border-secondary border-opacity-25 p-3 rounded-3 mb-3 text-dark shadow-sm">
                    <i class="fa-solid fa-shop text-danger me-2"></i>
                    <strong id="delete-item-name"></strong>
                </div>

                <label class="form-label small fw-bold text-muted mb-1">Xác nhận vị trí trước khi xóa:</label>
                <div id="delete-preview-map" style="height: 220px; width: 100%; border-radius: 8px; border: 1px solid #cbd5e1;"></div>
            </div>

            <div class="modal-footer border-top px-4 py-3 bg-light">
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
$this->registerJs("
    // Toggle panel tìm kiếm bên phải kiểu Atlas
    $('#hkdCloseSearchBtn').on('click', function() {
        $('#hkdAtlasShell').addClass('is-panel-collapsed');
        $('#hkdToggleSearchBtn').attr('aria-expanded', 'false');
    });

    $('#hkdToggleSearchBtn').on('click', function() {
        $('#hkdAtlasShell').removeClass('is-panel-collapsed');
        $('#hkdToggleSearchBtn').attr('aria-expanded', 'true');
    });

    // Modal xóa + Leaflet preview map
    let deleteMap = null;
    let deleteMarker = null;
    let pendingCoords = { lat: NaN, lng: NaN };

    $(document).on('click', '.btn-delete-modal', function(e) {
        e.preventDefault();
        let url = $(this).data('url');
        let name = $(this).data('name');
        pendingCoords.lat = parseFloat($(this).data('lat'));
        pendingCoords.lng = parseFloat($(this).data('lng'));

        $('#deleteForm').attr('action', url);
        $('#delete-item-name').text(name);

        let myModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('deleteConfirmModal'));
        myModal.show();
    });

    $('#deleteConfirmModal').on('shown.bs.modal', function () {
        if (!deleteMap) {
            deleteMap = L.map('delete-preview-map').setView([10.7654, 106.6952], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(deleteMap);
        } else {
            deleteMap.invalidateSize();
        }

        const { lat, lng } = pendingCoords;
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
");
?>