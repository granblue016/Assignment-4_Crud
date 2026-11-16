<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\DoanhNghiep;
use app\models\HoKinhDoanh;

class MapApiController extends Controller
{
    // Tắt kiểm tra CSRF cho các API nếu cần thiết gọi từ client thuần
    public $enableCsrfValidation = false;

    /**
     * API trả về danh sách Doanh nghiệp kèm tọa độ X, Y
     * Đường dẫn: http://localhost:8888/index.php?r=map-api/doanh-nghiep
     */
    public function actionDoanhNghiep()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        
        $data = DoanhNghiep::find()
            ->select(['id', 'ma_so_doanh_nghiep', 'ten_doanh_nghiep', 'dia_chi_day_du_tru_so_chinh', 'toa_do_x', 'toa_do_y'])
            ->where(['is not', 'toa_do_x', null])
            ->andWhere(['is not', 'toa_do_y', null])
            ->all();

        return [
            'status' => 'success',
            'count' => count($data),
            'data' => $data,
        ];
    }

    /**
     * API trả về danh sách Hộ kinh doanh kèm tọa độ X, Y
     * Đường dẫn: http://localhost:8888/index.php?r=map-api/ho-kinh-doanh
     */
    public function actionHoKinhDoanh()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        
        $data = HoKinhDoanh::find()
            ->select(['id', 'ma_so_ho_kinh_doanh', 'chu_ho_ho_va_ten', 'dia_chi_day_du', 'toa_do_x', 'toa_do_y'])
            ->where(['is not', 'toa_do_x', null])
            ->andWhere(['is not', 'toa_do_y', null])
            ->all();

        return [
            'status' => 'success',
            'count' => count($data),
            'data' => $data,
        ];
    }
}