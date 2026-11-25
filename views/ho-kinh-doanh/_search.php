<?php

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\HoKinhDoanhSearch $model */

// Danh sách toàn bộ 34 trường có thể lọc nâng cao, chia theo nhóm logic
$filterCatalog = [
    'Pháp lý & Thuế' => [
        ['field' => 'id', 'label' => 'ID hệ thống', 'type' => 'number'],
        ['field' => 'ma_so_ho_kinh_doanh', 'label' => 'Mã số hộ kinh doanh', 'type' => 'text'],
        ['field' => 'so_giay_cn_dkkd', 'label' => 'Số giấy CN ĐKKD', 'type' => 'text'],
        ['field' => 'ngay_cap_giay_cn_dkkd', 'label' => 'Ngày cấp giấy CN ĐKKD', 'type' => 'date'],
        ['field' => 'noi_cap', 'label' => 'Nơi cấp ĐKKD', 'type' => 'text'],
        ['field' => 'ma_so_thue', 'label' => 'Mã số thuế', 'type' => 'text'],
        ['field' => 'ngay_cap_ma_so_thue', 'label' => 'Ngày cấp mã số thuế', 'type' => 'date'],
        ['field' => 'bang_hieu', 'label' => 'Bảng hiệu', 'type' => 'text'],
    ],
    'Địa chỉ & Tọa độ' => [
        ['field' => 'so_nha', 'label' => 'Số nhà', 'type' => 'text'],
        ['field' => 'ten_duong', 'label' => 'Tên đường', 'type' => 'text'],
        ['field' => 'phuong_xa', 'label' => 'Phường / Xã', 'type' => 'text'],
        ['field' => 'thanh_pho', 'label' => 'Tỉnh / Thành phố', 'type' => 'text'],
        ['field' => 'dia_chi_day_du', 'label' => 'Địa chỉ đầy đủ', 'type' => 'text'],
        ['field' => 'tru_so_chinh', 'label' => 'Trụ sở chính', 'type' => 'text'],
        ['field' => 'toa_do_x', 'label' => 'Tọa độ X (Kinh độ)', 'type' => 'number'],
        ['field' => 'toa_do_y', 'label' => 'Tọa độ Y (Vĩ độ)', 'type' => 'number'],
    ],
    'Ngành nghề kinh doanh' => [
        ['field' => 'ma_nganh_nghe_kinh_doanh', 'label' => 'Mã ngành nghề', 'type' => 'text'],
        ['field' => 'ten_nganh_nghe_kinh_doanh', 'label' => 'Tên ngành nghề', 'type' => 'text'],
        ['field' => 'nganh_nghe_chinh', 'label' => 'Ngành nghề chính', 'type' => 'text'],
        ['field' => 'mo_ta_nganh_nghe_kinh_doanh', 'label' => 'Mô tả ngành nghề', 'type' => 'text'],
    ],
    'Thông tin Chủ hộ' => [
        ['field' => 'chu_ho_ho_va_ten', 'label' => 'Họ và tên chủ hộ', 'type' => 'text'],
        ['field' => 'chu_ho_cccd', 'label' => 'Số CCCD chủ hộ', 'type' => 'text'],
        ['field' => 'chu_ho_ngay_cap_cccd', 'label' => 'Ngày cấp CCCD', 'type' => 'date'],
        ['field' => 'chu_ho_quoc_tich', 'label' => 'Quốc tịch', 'type' => 'text'],
        ['field' => 'chu_ho_dia_chi_thuong_tru', 'label' => 'Địa chỉ thường trú chủ hộ', 'type' => 'text'],
    ],
    'Quy mô & Biến động hoạt động' => [
        ['field' => 'von_kinh_doanh', 'label' => 'Vốn kinh doanh (VNĐ)', 'type' => 'number'],
        ['field' => 'so_lao_dong', 'label' => 'Số lượng lao động', 'type' => 'number'],
        ['field' => 'so_lan_thay_doi', 'label' => 'Số lần thay đổi', 'type' => 'number'],
        ['field' => 'ngay_dong_cua', 'label' => 'Ngày đóng cửa', 'type' => 'date'],
        ['field' => 'ly_do_dong_cua', 'label' => 'Lý do đóng cửa', 'type' => 'text'],
        ['field' => 'ngay_tai_hoat_dong', 'label' => 'Ngày tái hoạt động', 'type' => 'date'],
        ['field' => 'ly_do_tai_hoat_dong', 'label' => 'Lý do tái hoạt động', 'type' => 'text'],
        ['field' => 'ngay_bat_dau_tam_dong_cua', 'label' => 'Ngày bắt đầu tạm đóng cửa', 'type' => 'date'],
        ['field' => 'ngay_ket_thuc_tam_dong_cua', 'label' => 'Ngày kết thúc tạm đóng cửa', 'type' => 'date'],
        ['field' => 'ly_do_tam_nghi', 'label' => 'Lý do tạm nghỉ', 'type' => 'text'],
    ],
];

// Thu thập các trường nâng cao đang có giá trị để tự mở lại sau khi submit
$activeDynamicValues = [];
foreach ($filterCatalog as $groupItems) {
    foreach ($groupItems as $item) {
        $f = $item['field'];
        if ($model->$f !== null && $model->$f !== '') {
            $activeDynamicValues[$f] = $model->$f;
        }
    }
}
?>

<div class="ho-kinh-doanh-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['id' => 'hkdAtlasSearchForm'],
    ]); ?>

    <!-- TẦNG 1: BỘ LỌC NHANH CỐ ĐỊNH -->
    <div class="mb-3">
        <?= $form->field($model, 'tu_khoa_chung')->textInput([
            'placeholder' => 'Nhập mã HKD, MST, tên chủ hộ, bảng hiệu...',
            'class' => 'form-control form-control-sm',
        ])->label('Tìm nhanh tổng hợp') ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'trang_thai_hoat_dong')->dropDownList([
            'NNT đang hoạt động' => 'NNT đang hoạt động',
            'NNT ngừng hoạt động và đã hoàn thành thủ tục chấm dứt hiệu lực MST' => 'Đã chấm dứt hiệu lực',
            'NNT không hoạt động tại địa chỉ đã đăng ký' => 'Không hoạt động tại địa chỉ ĐK',
            'NNT tạm ngừng kinh doanh có thời hạn' => 'Tạm ngừng kinh doanh',
        ], [
            'prompt' => '-- Tất cả trạng thái --',
            'class' => 'form-select form-select-sm',
        ])->label('Trạng thái hoạt động') ?>
    </div>

    <hr class="my-3 text-secondary opacity-25">

    <!-- TẦNG 2: BỘ LỌC NÂNG CAO ĐỘNG (CHỌN TRƯỜNG MUỐN QUERY) -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <span class="small fw-bold text-uppercase text-secondary" style="font-size: 0.72rem; letter-spacing: 0.04em;">
            Điều kiện nâng cao (<span id="hkdActiveFilterCount">0</span>)
        </span>
    </div>

    <!-- Thanh chọn thêm tiêu chí -->
    <div class="input-group input-group-sm mb-3">
        <select id="hkdFieldSelector" class="form-select">
            <option value="">+ Chọn trường muốn lọc...</option>
            <?php foreach ($filterCatalog as $groupName => $items): ?>
                <optgroup label="<?= Html::encode($groupName) ?>">
                    <?php foreach ($items as $item): ?>
                        <option value="<?= Html::encode($item['field']) ?>"
                                data-label="<?= Html::encode($item['label']) ?>"
                                data-type="<?= Html::encode($item['type']) ?>">
                            <?= Html::encode($item['label']) ?>
                        </option>
                    <?php endforeach; ?>
                </optgroup>
            <?php endforeach; ?>
        </select>
        <button type="button" class="btn btn-outline-success fw-semibold" id="hkdAddFilterBtn">
            Thêm
        </button>
    </div>

    <!-- Vùng chứa các ô input động được người dùng chọn -->
    <div id="hkdDynamicFiltersContainer" class="d-flex flex-column gap-2"></div>

    <!-- Nút hành động -->
    <div class="hkd-search-actions">
        <?= Html::submitButton('<i class="fa-solid fa-magnifying-glass me-1"></i> Lọc dữ liệu', [
            'class' => 'btn btn-success btn-sm',
        ]) ?>
        <?= Html::a('<i class="fa-solid fa-rotate-left me-1"></i> Đặt lại', ['index'], [
            'class' => 'btn btn-outline-secondary btn-sm',
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php
$catalogJson = Json::encode($filterCatalog);
$activeValuesJson = Json::encode($activeDynamicValues);

$this->registerJs("
(function() {
    const catalog = $catalogJson;
    const initialValues = $activeValuesJson;
    const container = $('#hkdDynamicFiltersContainer');
    const selector = $('#hkdFieldSelector');
    const countBadge = $('#hkdActiveFilterCount');

    // Tạo map tra cứu nhanh metadata của từng field
    const fieldMeta = {};
    Object.values(catalog).forEach(group => {
        group.forEach(item => { fieldMeta[item.field] = item; });
    });

    function updateCounter() {
        countBadge.text(container.children('.hkd-dyn-item').length);
    }

    function addFilterRow(field, value = '') {
        if (!field || !fieldMeta[field]) return;
        // Tránh thêm trùng 1 trường 2 lần
        if (container.find('[data-field=\"' + field + '\"]').length > 0) {
            container.find('[data-field=\"' + field + '\"] input').focus();
            return;
        }

        const meta = fieldMeta[field];
        const inputType = meta.type === 'date' ? 'date' : (meta.type === 'number' ? 'number' : 'text');
        const stepAttr = meta.type === 'number' ? 'step=\"any\"' : '';
        const placeholder = meta.type === 'date' ? '' : 'Nhập ' + meta.label.toLowerCase() + '...';

        const rowHtml = `
            <div class=\"hkd-dyn-item p-2 rounded-3 border bg-light\" data-field=\"\${field}\">
                <div class=\"d-flex justify-content-between align-items-center mb-1\">
                    <label class=\"small fw-semibold text-dark mb-0\" style=\"font-size: 0.78rem;\">\${meta.label}</label>
                    <button type=\"button\" class=\"btn btn-sm p-0 text-danger border-0 bg-transparent hkd-remove-filter\" title=\"Gỡ điều kiện\">
                        <i class=\"fa-solid fa-xmark\"></i>
                    </button>
                </div>
                <input type=\"\${inputType}\"
                       \${stepAttr}
                       name=\"HoKinhDoanhSearch[\${field}]\"
                       value=\"\"
                       placeholder=\"\${placeholder}\"
                       class=\"form-control form-control-sm bg-white\">
            </div>
        `;

        const \$row = $(rowHtml);
        \$row.find('input').val(value);
        container.append(\$row);

        // Vô hiệu hóa option đã chọn trong dropdown
        selector.find('option[value=\"' + field + '\"]').prop('disabled', true);
        selector.val('');
        updateCounter();
    }

    // Bấm nút Thêm hoặc chọn trực tiếp từ dropdown
    $('#hkdAddFilterBtn').on('click', function() {
        addFilterRow(selector.val());
    });

    selector.on('change', function() {
        if ($(this).val()) {
            addFilterRow($(this).val());
        }
    });

    // Gỡ từng điều kiện lọc
    container.on('click', '.hkd-remove-filter', function() {
        const \$item = $(this).closest('.hkd-dyn-item');
        const field = \$item.data('field');
        selector.find('option[value=\"' + field + '\"]').prop('disabled', false);
        \$item.remove();
        updateCounter();
    });

    // Khôi phục các điều kiện đang được lọc từ URL sau khi reload trang
    Object.entries(initialValues).forEach(([field, val]) => {
        addFilterRow(field, val);
    });
})();
");
?>