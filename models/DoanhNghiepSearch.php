<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DoanhNghiep;

/**
 * DoanhNghiepSearch represents the model behind the search form of `app\models\DoanhNghiep`.
 */
class DoanhNghiepSearch extends DoanhNghiep
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nam_thanh_lap_doanh_nghiep', 'so_luong_lao_dong'], 'integer'],
            [['ma_so_doanh_nghiep', 'ten_doanh_nghiep', 'ten_viet_tat', 'ten_tieng_nuoc_ngoai', 'trang_thai_doanh_nghiep', 'loai_hinh_doanh_nghiep', 'ngay_thanh_lap', 'noi_cap', 'so_nha', 'ten_duong', 'phuong_xa', 'thanh_pho', 'dia_chi_day_du_tru_so_chinh', 'ma_nganh_nghe_kinh_doanh', 'ten_nganh_nghe_kinh_doanh', 'nganh_nghe_chinh', 'mo_ta_nganh_nghe_kinh_doanh', 'danh_sach_thanh_vien_gop_von', 'dai_dien_phap_luat', 'tinh_trang_hoat_dong', 'dang_ky_lan_dau', 'cac_lan_dang_ky_thay_doi', 'chung_chi_hanh_nghe', 'dia_chi_thong_bao_thue', 'loai_thue_phai_nop', 'tinh_trang_nguoi_nop_thue', 'thong_tin_vi_pham_ve_thue', 'geom'], 'safe'],
            [['von_dieu_le', 'toa_do_x', 'toa_do_y'], 'number'],
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
        $query = DoanhNghiep::find();

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
            'ngay_thanh_lap' => $this->ngay_thanh_lap,
            'von_dieu_le' => $this->von_dieu_le,
            'nam_thanh_lap_doanh_nghiep' => $this->nam_thanh_lap_doanh_nghiep,
            'dang_ky_lan_dau' => $this->dang_ky_lan_dau,
            'so_luong_lao_dong' => $this->so_luong_lao_dong,
            'toa_do_x' => $this->toa_do_x,
            'toa_do_y' => $this->toa_do_y,
        ]);

        $query->andFilterWhere(['ilike', 'ma_so_doanh_nghiep', $this->ma_so_doanh_nghiep])
            ->andFilterWhere(['ilike', 'ten_doanh_nghiep', $this->ten_doanh_nghiep])
            ->andFilterWhere(['ilike', 'ten_viet_tat', $this->ten_viet_tat])
            ->andFilterWhere(['ilike', 'ten_tieng_nuoc_ngoai', $this->ten_tieng_nuoc_ngoai])
            ->andFilterWhere(['ilike', 'trang_thai_doanh_nghiep', $this->trang_thai_doanh_nghiep])
            ->andFilterWhere(['ilike', 'loai_hinh_doanh_nghiep', $this->loai_hinh_doanh_nghiep])
            ->andFilterWhere(['ilike', 'noi_cap', $this->noi_cap])
            ->andFilterWhere(['ilike', 'so_nha', $this->so_nha])
            ->andFilterWhere(['ilike', 'ten_duong', $this->ten_duong])
            ->andFilterWhere(['ilike', 'phuong_xa', $this->phuong_xa])
            ->andFilterWhere(['ilike', 'thanh_pho', $this->thanh_pho])
            ->andFilterWhere(['ilike', 'dia_chi_day_du_tru_so_chinh', $this->dia_chi_day_du_tru_so_chinh])
            ->andFilterWhere(['ilike', 'ma_nganh_nghe_kinh_doanh', $this->ma_nganh_nghe_kinh_doanh])
            ->andFilterWhere(['ilike', 'ten_nganh_nghe_kinh_doanh', $this->ten_nganh_nghe_kinh_doanh])
            ->andFilterWhere(['ilike', 'nganh_nghe_chinh', $this->nganh_nghe_chinh])
            ->andFilterWhere(['ilike', 'mo_ta_nganh_nghe_kinh_doanh', $this->mo_ta_nganh_nghe_kinh_doanh])
            ->andFilterWhere(['ilike', 'danh_sach_thanh_vien_gop_von', $this->danh_sach_thanh_vien_gop_von])
            ->andFilterWhere(['ilike', 'dai_dien_phap_luat', $this->dai_dien_phap_luat])
            ->andFilterWhere(['ilike', 'tinh_trang_hoat_dong', $this->tinh_trang_hoat_dong])
            ->andFilterWhere(['ilike', 'cac_lan_dang_ky_thay_doi', $this->cac_lan_dang_ky_thay_doi])
            ->andFilterWhere(['ilike', 'chung_chi_hanh_nghe', $this->chung_chi_hanh_nghe])
            ->andFilterWhere(['ilike', 'dia_chi_thong_bao_thue', $this->dia_chi_thong_bao_thue])
            ->andFilterWhere(['ilike', 'loai_thue_phai_nop', $this->loai_thue_phai_nop])
            ->andFilterWhere(['ilike', 'tinh_trang_nguoi_nop_thue', $this->tinh_trang_nguoi_nop_thue])
            ->andFilterWhere(['ilike', 'thong_tin_vi_pham_ve_thue', $this->thong_tin_vi_pham_ve_thue])
            ->andFilterWhere(['ilike', 'geom', $this->geom]);

        return $dataProvider;
    }
}
