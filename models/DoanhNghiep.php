<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_doanh_nghiep".
 *
 * @property int $id
 * @property string $ma_so_doanh_nghiep
 * @property string $ten_doanh_nghiep
 * @property string|null $ten_viet_tat
 * @property string|null $ten_tieng_nuoc_ngoai
 * @property string|null $trang_thai_doanh_nghiep
 * @property string|null $loai_hinh_doanh_nghiep
 * @property string|null $ngay_thanh_lap
 * @property string|null $noi_cap
 * @property string|null $so_nha
 * @property string|null $ten_duong
 * @property string|null $phuong_xa
 * @property string|null $thanh_pho
 * @property string|null $dia_chi_day_du_tru_so_chinh
 * @property string|null $ma_nganh_nghe_kinh_doanh
 * @property string|null $ten_nganh_nghe_kinh_doanh
 * @property string|null $nganh_nghe_chinh
 * @property string|null $mo_ta_nganh_nghe_kinh_doanh
 * @property float|null $von_dieu_le
 * @property string|null $danh_sach_thanh_vien_gop_von
 * @property string|null $dai_dien_phap_luat
 * @property int|null $nam_thanh_lap_doanh_nghiep
 * @property string|null $tinh_trang_hoat_dong
 * @property string|null $dang_ky_lan_dau
 * @property string|null $cac_lan_dang_ky_thay_doi
 * @property string|null $chung_chi_hanh_nghe
 * @property string|null $dia_chi_thong_bao_thue
 * @property int|null $so_luong_lao_dong
 * @property string|null $loai_thue_phai_nop
 * @property string|null $tinh_trang_nguoi_nop_thue
 * @property string|null $thong_tin_vi_pham_ve_thue
 * @property float|null $toa_do_x
 * @property float|null $toa_do_y
 * @property string|null $geom
 */
class DoanhNghiep extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_doanh_nghiep';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_viet_tat', 'ten_tieng_nuoc_ngoai', 'trang_thai_doanh_nghiep', 'loai_hinh_doanh_nghiep', 'ngay_thanh_lap', 'noi_cap', 'so_nha', 'ten_duong', 'phuong_xa', 'thanh_pho', 'dia_chi_day_du_tru_so_chinh', 'ma_nganh_nghe_kinh_doanh', 'ten_nganh_nghe_kinh_doanh', 'nganh_nghe_chinh', 'mo_ta_nganh_nghe_kinh_doanh', 'von_dieu_le', 'danh_sach_thanh_vien_gop_von', 'dai_dien_phap_luat', 'nam_thanh_lap_doanh_nghiep', 'tinh_trang_hoat_dong', 'dang_ky_lan_dau', 'cac_lan_dang_ky_thay_doi', 'chung_chi_hanh_nghe', 'dia_chi_thong_bao_thue', 'so_luong_lao_dong', 'loai_thue_phai_nop', 'tinh_trang_nguoi_nop_thue', 'thong_tin_vi_pham_ve_thue', 'toa_do_x', 'toa_do_y', 'geom'], 'default', 'value' => null],
            [['ma_so_doanh_nghiep', 'ten_doanh_nghiep'], 'required'],
            [['ngay_thanh_lap', 'dang_ky_lan_dau'], 'safe'],
            [['mo_ta_nganh_nghe_kinh_doanh', 'danh_sach_thanh_vien_gop_von', 'cac_lan_dang_ky_thay_doi', 'chung_chi_hanh_nghe', 'dia_chi_thong_bao_thue', 'thong_tin_vi_pham_ve_thue', 'geom'], 'string'],
            [['von_dieu_le', 'toa_do_x', 'toa_do_y'], 'number'],
            [['nam_thanh_lap_doanh_nghiep', 'so_luong_lao_dong'], 'default', 'value' => null],
            [['nam_thanh_lap_doanh_nghiep', 'so_luong_lao_dong'], 'integer'],
            [['ma_so_doanh_nghiep', 'so_nha', 'ma_nganh_nghe_kinh_doanh'], 'string', 'max' => 50],
            [['ten_doanh_nghiep', 'ten_tieng_nuoc_ngoai', 'noi_cap', 'ten_duong', 'dia_chi_day_du_tru_so_chinh', 'ten_nganh_nghe_kinh_doanh', 'nganh_nghe_chinh', 'dai_dien_phap_luat'], 'string', 'max' => 255],
            [['ten_viet_tat', 'trang_thai_doanh_nghiep', 'loai_hinh_doanh_nghiep', 'phuong_xa', 'thanh_pho', 'tinh_trang_hoat_dong', 'loai_thue_phai_nop', 'tinh_trang_nguoi_nop_thue'], 'string', 'max' => 100],
            [['ma_so_doanh_nghiep'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ma_so_doanh_nghiep' => 'Ma So Doanh Nghiep',
            'ten_doanh_nghiep' => 'Ten Doanh Nghiep',
            'ten_viet_tat' => 'Ten Viet Tat',
            'ten_tieng_nuoc_ngoai' => 'Ten Tieng Nuoc Ngoai',
            'trang_thai_doanh_nghiep' => 'Trang Thai Doanh Nghiep',
            'loai_hinh_doanh_nghiep' => 'Loai Hinh Doanh Nghiep',
            'ngay_thanh_lap' => 'Ngay Thanh Lap',
            'noi_cap' => 'Noi Cap',
            'so_nha' => 'So Nha',
            'ten_duong' => 'Ten Duong',
            'phuong_xa' => 'Phuong Xa',
            'thanh_pho' => 'Thanh Pho',
            'dia_chi_day_du_tru_so_chinh' => 'Dia Chi Day Du Tru So Chinh',
            'ma_nganh_nghe_kinh_doanh' => 'Ma Nganh Nghe Kinh Doanh',
            'ten_nganh_nghe_kinh_doanh' => 'Ten Nganh Nghe Kinh Doanh',
            'nganh_nghe_chinh' => 'Nganh Nghe Chinh',
            'mo_ta_nganh_nghe_kinh_doanh' => 'Mo Ta Nganh Nghe Kinh Doanh',
            'von_dieu_le' => 'Von Dieu Le',
            'danh_sach_thanh_vien_gop_von' => 'Danh Sach Thanh Vien Gop Von',
            'dai_dien_phap_luat' => 'Dai Dien Phap Luat',
            'nam_thanh_lap_doanh_nghiep' => 'Nam Thanh Lap Doanh Nghiep',
            'tinh_trang_hoat_dong' => 'Tinh Trang Hoat Dong',
            'dang_ky_lan_dau' => 'Dang Ky Lan Dau',
            'cac_lan_dang_ky_thay_doi' => 'Cac Lan Dang Ky Thay Doi',
            'chung_chi_hanh_nghe' => 'Chung Chi Hanh Nghe',
            'dia_chi_thong_bao_thue' => 'Dia Chi Thong Bao Thue',
            'so_luong_lao_dong' => 'So Luong Lao Dong',
            'loai_thue_phai_nop' => 'Loai Thue Phai Nop',
            'tinh_trang_nguoi_nop_thue' => 'Tinh Trang Nguoi Nop Thue',
            'thong_tin_vi_pham_ve_thue' => 'Thong Tin Vi Pham Ve Thue',
            'toa_do_x' => 'Toa Do X',
            'toa_do_y' => 'Toa Do Y',
            'geom' => 'Geom',
        ];
    }

}
