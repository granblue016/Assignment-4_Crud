<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class HoKinhDoanhSearch extends HoKinhDoanh
{
    // Ô tìm nhanh tổng hợp ở đầu panel Atlas
    public $tu_khoa_chung;

    public function rules()
    {
        return [
            [['id', 'so_lao_dong', 'so_lan_thay_doi'], 'integer'],
            [['von_kinh_doanh', 'toa_do_x', 'toa_do_y'], 'number'],
            [[
                'tu_khoa_chung',
                'ma_so_ho_kinh_doanh', 'so_giay_cn_dkkd', 'ngay_cap_giay_cn_dkkd', 'noi_cap',
                'ma_so_thue', 'ngay_cap_ma_so_thue',
                'so_nha', 'ten_duong', 'phuong_xa', 'thanh_pho', 'dia_chi_day_du', 'tru_so_chinh',
                'ma_nganh_nghe_kinh_doanh', 'ten_nganh_nghe_kinh_doanh', 'nganh_nghe_chinh', 'mo_ta_nganh_nghe_kinh_doanh',
                'chu_ho_ho_va_ten', 'chu_ho_cccd', 'chu_ho_ngay_cap_cccd', 'chu_ho_quoc_tich', 'chu_ho_dia_chi_thuong_tru',
                'trang_thai_hoat_dong', 'bang_hieu',
                'ngay_dong_cua', 'ly_do_dong_cua', 'ngay_tai_hoat_dong', 'ly_do_tai_hoat_dong',
                'ngay_bat_dau_tam_dong_cua', 'ngay_ket_thuc_tam_dong_cua', 'ly_do_tam_nghi'
            ], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = HoKinhDoanh::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 20],
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // 1. Lọc theo từ khóa chung (tìm gộp các trường hay dùng nhất)
        if (!empty($this->tu_khoa_chung)) {
            $kw = trim($this->tu_khoa_chung);
            $query->andFilterWhere([
                'or',
                ['ilike', 'ma_so_ho_kinh_doanh', $kw],
                ['ilike', 'ma_so_thue', $kw],
                ['ilike', 'so_giay_cn_dkkd', $kw],
                ['ilike', 'chu_ho_ho_va_ten', $kw],
                ['ilike', 'bang_hieu', $kw],
            ]);
        }

        // 2. Lọc chính xác theo số / ngày
        $query->andFilterWhere([
            'id' => $this->id,
            'so_lao_dong' => $this->so_lao_dong,
            'so_lan_thay_doi' => $this->so_lan_thay_doi,
            'von_kinh_doanh' => $this->von_kinh_doanh,
            'toa_do_x' => $this->toa_do_x,
            'toa_do_y' => $this->toa_do_y,
            'ngay_cap_giay_cn_dkkd' => $this->ngay_cap_giay_cn_dkkd,
            'ngay_cap_ma_so_thue' => $this->ngay_cap_ma_so_thue,
            'chu_ho_ngay_cap_cccd' => $this->chu_ho_ngay_cap_cccd,
            'ngay_dong_cua' => $this->ngay_dong_cua,
            'ngay_tai_hoat_dong' => $this->ngay_tai_hoat_dong,
            'ngay_bat_dau_tam_dong_cua' => $this->ngay_bat_dau_tam_dong_cua,
            'ngay_ket_thuc_tam_dong_cua' => $this->ngay_ket_thuc_tam_dong_cua,
        ]);

        // 3. Lọc gần đúng (ILIKE trên PostgreSQL) cho tất cả các trường chuỗi
        $stringFields = [
            'ma_so_ho_kinh_doanh', 'so_giay_cn_dkkd', 'noi_cap', 'ma_so_thue',
            'so_nha', 'ten_duong', 'phuong_xa', 'thanh_pho', 'dia_chi_day_du', 'tru_so_chinh',
            'ma_nganh_nghe_kinh_doanh', 'ten_nganh_nghe_kinh_doanh', 'nganh_nghe_chinh', 'mo_ta_nganh_nghe_kinh_doanh',
            'chu_ho_ho_va_ten', 'chu_ho_cccd', 'chu_ho_quoc_tich', 'chu_ho_dia_chi_thuong_tru',
            'trang_thai_hoat_dong', 'bang_hieu',
            'ly_do_dong_cua', 'ly_do_tai_hoat_dong', 'ly_do_tam_nghi'
        ];

        foreach ($stringFields as $field) {
            if (!empty($this->$field)) {
                $query->andFilterWhere(['ilike', $field, trim($this->$field)]);
            }
        }

        return $dataProvider;
    }
}