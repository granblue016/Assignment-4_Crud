<?php

namespace app\models;

use Yii;

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


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_ho_kinh_doanh';
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
            [['von_kinh_doanh', 'toa_do_x', 'toa_do_y'], 'number'],
            [['dia_chi_day_du', 'mo_ta_nganh_nghe_kinh_doanh', 'chu_ho_dia_chi_thuong_tru', 'ly_do_dong_cua', 'ly_do_tai_hoat_dong', 'ly_do_tam_nghi', 'geom'], 'string'],
            [['ma_so_ho_kinh_doanh', 'so_giay_cn_dkkd', 'ma_so_thue', 'so_nha', 'ma_nganh_nghe_kinh_doanh', 'chu_ho_quoc_tich'], 'string', 'max' => 50],
            [['noi_cap', 'ten_duong', 'tru_so_chinh', 'ten_nganh_nghe_kinh_doanh', 'nganh_nghe_chinh', 'chu_ho_ho_va_ten', 'bang_hieu'], 'string', 'max' => 255],
            [['phuong_xa', 'thanh_pho', 'trang_thai_hoat_dong'], 'string', 'max' => 100],
            [['chu_ho_cccd'], 'string', 'max' => 20],
            [['ma_so_ho_kinh_doanh'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ma_so_ho_kinh_doanh' => 'Ma So Ho Kinh Doanh',
            'so_giay_cn_dkkd' => 'So Giay Cn Dkkd',
            'ngay_cap_giay_cn_dkkd' => 'Ngay Cap Giay Cn Dkkd',
            'noi_cap' => 'Noi Cap',
            'ma_so_thue' => 'Ma So Thue',
            'ngay_cap_ma_so_thue' => 'Ngay Cap Ma So Thue',
            'so_lao_dong' => 'So Lao Dong',
            'so_lan_thay_doi' => 'So Lan Thay Doi',
            'von_kinh_doanh' => 'Von Kinh Doanh',
            'so_nha' => 'So Nha',
            'ten_duong' => 'Ten Duong',
            'phuong_xa' => 'Phuong Xa',
            'thanh_pho' => 'Thanh Pho',
            'dia_chi_day_du' => 'Dia Chi Day Du',
            'tru_so_chinh' => 'Tru So Chinh',
            'ma_nganh_nghe_kinh_doanh' => 'Ma Nganh Nghe Kinh Doanh',
            'ten_nganh_nghe_kinh_doanh' => 'Ten Nganh Nghe Kinh Doanh',
            'nganh_nghe_chinh' => 'Nganh Nghe Chinh',
            'mo_ta_nganh_nghe_kinh_doanh' => 'Mo Ta Nganh Nghe Kinh Doanh',
            'chu_ho_ho_va_ten' => 'Chu Ho Ho Va Ten',
            'chu_ho_cccd' => 'Chu Ho Cccd',
            'chu_ho_ngay_cap_cccd' => 'Chu Ho Ngay Cap Cccd',
            'chu_ho_quoc_tich' => 'Chu Ho Quoc Tich',
            'chu_ho_dia_chi_thuong_tru' => 'Chu Ho Dia Chi Thuong Tru',
            'trang_thai_hoat_dong' => 'Trang Thai Hoat Dong',
            'bang_hieu' => 'Bang Hieu',
            'ngay_dong_cua' => 'Ngay Dong Cua',
            'ly_do_dong_cua' => 'Ly Do Dong Cua',
            'ngay_tai_hoat_dong' => 'Ngay Tai Hoat Dong',
            'ly_do_tai_hoat_dong' => 'Ly Do Tai Hoat Dong',
            'ngay_bat_dau_tam_dong_cua' => 'Ngay Bat Dau Tam Dong Cua',
            'ngay_ket_thuc_tam_dong_cua' => 'Ngay Ket Thuc Tam Dong Cua',
            'ly_do_tam_nghi' => 'Ly Do Tam Nghi',
            'toa_do_x' => 'Toa Do X',
            'toa_do_y' => 'Toa Do Y',
            'geom' => 'Geom',
        ];
    }

}
