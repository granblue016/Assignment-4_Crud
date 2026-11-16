<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HoKinhDoanh;

/**
 * HoKinhDoanhSearch represents the model behind the search form of `app\models\HoKinhDoanh`.
 */
class HoKinhDoanhSearch extends HoKinhDoanh
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'so_lao_dong', 'so_lan_thay_doi'], 'integer'],
            [['ma_so_ho_kinh_doanh', 'so_giay_cn_dkkd', 'ngay_cap_giay_cn_dkkd', 'noi_cap', 'ma_so_thue', 'ngay_cap_ma_so_thue', 'so_nha', 'ten_duong', 'phuong_xa', 'thanh_pho', 'dia_chi_day_du', 'tru_so_chinh', 'ma_nganh_nghe_kinh_doanh', 'ten_nganh_nghe_kinh_doanh', 'nganh_nghe_chinh', 'mo_ta_nganh_nghe_kinh_doanh', 'chu_ho_ho_va_ten', 'chu_ho_cccd', 'chu_ho_ngay_cap_cccd', 'chu_ho_quoc_tich', 'chu_ho_dia_chi_thuong_tru', 'trang_thai_hoat_dong', 'bang_hieu', 'ngay_dong_cua', 'ly_do_dong_cua', 'ngay_tai_hoat_dong', 'ly_do_tai_hoat_dong', 'ngay_bat_dau_tam_dong_cua', 'ngay_ket_thuc_tam_dong_cua', 'ly_do_tam_nghi', 'geom'], 'safe'],
            [['von_kinh_doanh', 'toa_do_x', 'toa_do_y'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = HoKinhDoanh::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ngay_cap_giay_cn_dkkd' => $this->ngay_cap_giay_cn_dkkd,
            'ngay_cap_ma_so_thue' => $this->ngay_cap_ma_so_thue,
            'so_lao_dong' => $this->so_lao_dong,
            'so_lan_thay_doi' => $this->so_lan_thay_doi,
            'von_kinh_doanh' => $this->von_kinh_doanh,
            'chu_ho_ngay_cap_cccd' => $this->chu_ho_ngay_cap_cccd,
            'ngay_dong_cua' => $this->ngay_dong_cua,
            'ngay_tai_hoat_dong' => $this->ngay_tai_hoat_dong,
            'ngay_bat_dau_tam_dong_cua' => $this->ngay_bat_dau_tam_dong_cua,
            'ngay_ket_thuc_tam_dong_cua' => $this->ngay_ket_thuc_tam_dong_cua,
            'toa_do_x' => $this->toa_do_x,
            'toa_do_y' => $this->toa_do_y,
        ]);

        $query->andFilterWhere(['ilike', 'ma_so_ho_kinh_doanh', $this->ma_so_ho_kinh_doanh])
            ->andFilterWhere(['ilike', 'so_giay_cn_dkkd', $this->so_giay_cn_dkkd])
            ->andFilterWhere(['ilike', 'noi_cap', $this->noi_cap])
            ->andFilterWhere(['ilike', 'ma_so_thue', $this->ma_so_thue])
            ->andFilterWhere(['ilike', 'so_nha', $this->so_nha])
            ->andFilterWhere(['ilike', 'ten_duong', $this->ten_duong])
            ->andFilterWhere(['ilike', 'phuong_xa', $this->phuong_xa])
            ->andFilterWhere(['ilike', 'thanh_pho', $this->thanh_pho])
            ->andFilterWhere(['ilike', 'dia_chi_day_du', $this->dia_chi_day_du])
            ->andFilterWhere(['ilike', 'tru_so_chinh', $this->tru_so_chinh])
            ->andFilterWhere(['ilike', 'ma_nganh_nghe_kinh_doanh', $this->ma_nganh_nghe_kinh_doanh])
            ->andFilterWhere(['ilike', 'ten_nganh_nghe_kinh_doanh', $this->ten_nganh_nghe_kinh_doanh])
            ->andFilterWhere(['ilike', 'nganh_nghe_chinh', $this->nganh_nghe_chinh])
            ->andFilterWhere(['ilike', 'mo_ta_nganh_nghe_kinh_doanh', $this->mo_ta_nganh_nghe_kinh_doanh])
            ->andFilterWhere(['ilike', 'chu_ho_ho_va_ten', $this->chu_ho_ho_va_ten])
            ->andFilterWhere(['ilike', 'chu_ho_cccd', $this->chu_ho_cccd])
            ->andFilterWhere(['ilike', 'chu_ho_quoc_tich', $this->chu_ho_quoc_tich])
            ->andFilterWhere(['ilike', 'chu_ho_dia_chi_thuong_tru', $this->chu_ho_dia_chi_thuong_tru])
            ->andFilterWhere(['ilike', 'trang_thai_hoat_dong', $this->trang_thai_hoat_dong])
            ->andFilterWhere(['ilike', 'bang_hieu', $this->bang_hieu])
            ->andFilterWhere(['ilike', 'ly_do_dong_cua', $this->ly_do_dong_cua])
            ->andFilterWhere(['ilike', 'ly_do_tai_hoat_dong', $this->ly_do_tai_hoat_dong])
            ->andFilterWhere(['ilike', 'ly_do_tam_nghi', $this->ly_do_tam_nghi])
            ->andFilterWhere(['ilike', 'geom', $this->geom]);

        return $dataProvider;
    }
}
