<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "tbl_ho_kinh_doanh".
 *
 * @property int $id
 * @property string $ma_so_ho_kinh_doanh
 * @property string|null $so_giay_cn_dkkd
 * @property string|null $ngay_cap_giay_cn_dkkd
 * @property string|null $noi_cap
 * @property string|null $ma_so_thue
 * @property string|null $ngay_cap_ma_so_thue
 * @property int|null $so_lao_dong
 * @property int|null $so_lan_thay_doi
 * @property float|null $von_kinh_doanh
 * @property string|null $so_nha
 * @property string|null $ten_duong
 * @property string|null $phuong_xa
 * @property string|null $thanh_pho
 * @property string|null $dia_chi_day_du
 * @property string|null $tru_so_chinh
 * @property string|null $ma_nganh_nghe_kinh_doanh
 * @property string|null $ten_nganh_nghe_kinh_doanh
 * @property string|null $nganh_nghe_chinh
 * @property string|null $mo_ta_nganh_nghe_kinh_doanh
 * @property string|null $chu_ho_ho_va_ten
 * @property string|null $chu_ho_cccd
 * @property string|null $chu_ho_ngay_cap_cccd
 * @property string|null $chu_ho_quoc_tich
 * @property string|null $chu_ho_dia_chi_thuong_tru
 * @property string|null $trang_thai_hoat_dong
 * @property string|null $bang_hieu
 * @property string|null $ngay_dong_cua
 * @property string|null $ly_do_dong_cua
 * @property string|null $ngay_tai_hoat_dong
 * @property string|null $ly_do_tai_hoat_dong
 * @property string|null $ngay_bat_dau_tam_dong_cua
 * @property string|null $ngay_ket_thuc_tam_dong_cua
 * @property string|null $ly_do_tam_nghi
 * @property float|null $toa_do_x
 * @property float|null $toa_do_y
 * @property string|null $geom
 */
class HoKinhDoanh extends \yii\db\ActiveRecord
{
    // Thêm 2 thuộc tính ảo để binding với bản đồ Leaflet
    public $lat;
    public $lng;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_ho_kinh_doanh';
    }

    /**
     * Tự động trích xuất tọa độ X (Kinh độ) và Y (Vĩ độ) từ cột geom của PostGIS khi query[cite: 15]
     */
    public static function find()
    {
        return parent::find()->addSelect([
            '*',
            'lng' => 'COALESCE(ST_X(geom), toa_do_x)',
            'lat' => 'COALESCE(ST_Y(geom), toa_do_y)',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['so_giay_cn_dkkd', 'ngay_cap_giay_cn_dkkd', 'noi_cap', 'ma_so_thue', 'ngay_cap_ma_so_thue', 'so_lao_dong', 'so_lan_thay_doi', 'von_kinh_doanh', 'so_nha', 'ten_duong', 'phuong_xa', 'thanh_pho', 'dia_chi_day_du', 'tru_so_chinh', 'ma_nganh_nghe_kinh_doanh', 'ten_nganh_nghe_kinh_doanh', 'nganh_nghe_chinh', 'mo_ta_nganh_nghe_kinh_doanh', 'chu_ho_ho_va_ten', 'chu_ho_cccd', 'chu_ho_ngay_cap_cccd', 'chu_ho_quoc_tich', 'chu_ho_dia_chi_thuong_tru', 'trang_thai_hoat_dong', 'bang_hieu', 'ngay_dong_cua', 'ly_do_dong_cua', 'ngay_tai_hoat_dong', 'ly_do_tai_hoat_dong', 'ngay_bat_dau_tam_dong_cua', 'ngay_ket_thuc_tam_dong_cua', 'ly_do_tam_nghi', 'toa_do_x', 'toa_do_y', 'geom'], 'default', 'value' => null],
            [['ma_so_ho_kinh_doanh'], 'required'],
            [['ngay_cap_giay_cn_dkkd', 'ngay_cap_ma_so_thue', 'chu_ho_ngay_cap_cccd', 'ngay_dong_cua', 'ngay_tai_hoat_dong', 'ngay_bat_dau_tam_dong_cua', 'ngay_ket_thuc_tam_dong_cua'], 'safe'],
            [['so_lao_dong', 'so_lan_thay_doi'], 'default', 'value' => null],
            [['so_lao_dong', 'so_lan_thay_doi'], 'integer'],
            [['von_kinh_doanh', 'toa_do_x', 'toa_do_y', 'lat', 'lng'], 'number'],
            [['dia_chi_day_du', 'mo_ta_nganh_nghe_kinh_doanh', 'chu_ho_dia_chi_thuong_tru', 'ly_do_dong_cua', 'ly_do_tai_hoat_dong', 'ly_do_tam_nghi', 'geom'], 'string'],
            [['ma_so_ho_kinh_doanh', 'so_giay_cn_dkkd', 'ma_so_thue', 'so_nha', 'ma_nganh_nghe_kinh_doanh', 'chu_ho_quoc_tich'], 'string', 'max' => 50],
            [['noi_cap', 'ten_duong', 'tru_so_chinh', 'ten_nganh_nghe_kinh_doanh', 'nganh_nghe_chinh', 'chu_ho_ho_va_ten', 'bang_hieu'], 'string', 'max' => 255],
            [['phuong_xa', 'thanh_pho', 'trang_thai_hoat_dong'], 'string', 'max' => 100],
            [['chu_ho_cccd'], 'string', 'max' => 20],
            [['ma_so_ho_kinh_doanh'], 'unique'],
        ];
    }

    /**
     * Tự động đồng bộ song song lat/lng với toa_do_x/toa_do_y và sinh chuẩn geom trước khi lưu
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Đồng bộ qua lại giữa thuộc tính ảo (lat/lng) và cột trong cơ sở dữ liệu (toa_do_x/toa_do_y)
            if (!empty($this->lng)) {
                $this->toa_do_x = $this->lng;
            } elseif (!empty($this->toa_do_x)) {
                $this->lng = $this->toa_do_x;
            }

            if (!empty($this->lat)) {
                $this->toa_do_y = $this->lat;
            } elseif (!empty($this->toa_do_y)) {
                $this->lat = $this->toa_do_y;
            }

            // Sinh dữ liệu không gian geom chuẩn PostGIS (SRID 4326)
            if (!empty($this->lat) && !empty($this->lng)) {
                $this->geom = new Expression("ST_SetSRID(ST_MakePoint(:lng, :lat), 4326)", [
                    ':lng' => $this->lng,
                    ':lat' => $this->lat,
                ]);
            } else {
                $this->geom = null;
                $this->toa_do_x = null;
                $this->toa_do_y = null;
            }

            return true;
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ma_so_ho_kinh_doanh' => 'Mã số hộ kinh doanh',
            'so_giay_cn_dkkd' => 'Số giấy chứng nhận ĐKKD',
            'ngay_cap_giay_cn_dkkd' => 'Ngày cấp giấy CN ĐKKD',
            'noi_cap' => 'Nơi cấp',
            'ma_so_thue' => 'Mã số thuế',
            'ngay_cap_ma_so_thue' => 'Ngày cấp mã số thuế',
            'so_lao_dong' => 'Số lượng lao động',
            'so_lan_thay_doi' => 'Số lần thay đổi',
            'von_kinh_doanh' => 'Vốn kinh doanh (VNĐ)',
            'so_nha' => 'Số nhà',
            'ten_duong' => 'Tên đường',
            'phuong_xa' => 'Phường / Xã',
            'thanh_pho' => 'Tỉnh / Thành phố',
            'dia_chi_day_du' => 'Địa chỉ đầy đủ',
            'tru_so_chinh' => 'Trụ sở chính',
            'ma_nganh_nghe_kinh_doanh' => 'Mã ngành nghề kinh doanh',
            'ten_nganh_nghe_kinh_doanh' => 'Tên ngành nghề kinh doanh',
            'nganh_nghe_chinh' => 'Ngành nghề chính',
            'mo_ta_nganh_nghe_kinh_doanh' => 'Mô tả ngành nghề kinh doanh',
            'chu_ho_ho_va_ten' => 'Họ và tên chủ hộ',
            'chu_ho_cccd' => 'CCCD chủ hộ',
            'chu_ho_ngay_cap_cccd' => 'Ngày cấp CCCD',
            'chu_ho_quoc_tich' => 'Quốc tịch',
            'chu_ho_dia_chi_thuong_tru' => 'Địa chỉ thường trú',
            'trang_thai_hoat_dong' => 'Trạng thái hoạt động',
            'bang_hieu' => 'Bảng hiệu',
            'toa_do_x' => 'Tọa độ X (Kinh độ)',
            'toa_do_y' => 'Tọa độ Y (Vĩ độ)',
            'geom' => 'Geom',
        ];
    }
}