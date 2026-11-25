<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\helpers\Console;
use app\models\DoanhNghiep;
use app\models\HoKinhDoanh;
use app\models\User;

class SeedController extends Controller
{
    /**
     * Lệnh chạy: php yii seed/doanh-nghiep
     */
    public function actionDoanhNghiep()
    {
        $filePath = Yii::$app->basePath . '/data/doanh_nghiep.json';

        if (!file_exists($filePath)) {
            $this->stdout("Lỗi: Không tìm thấy file JSON tại đường dẫn: {$filePath}\n", Console::FG_RED);
            return self::EXIT_CODE_ERROR;
        }

        $jsonContent = file_get_contents($filePath);
        $data = json_decode($jsonContent, true);

        if (empty($data)) {
            $this->stdout("Lỗi: File JSON trống hoặc định dạng không hợp lệ!\n", Console::FG_RED);
            return self::EXIT_CODE_ERROR;
        }

        $successCount = 0;
        $errorCount = 0;

        foreach ($data as $item) {
            // Kiểm tra xem mã số doanh nghiệp đã tồn tại chưa để tránh trùng lặp
            $model = DoanhNghiep::findOne(['ma_so_doanh_nghiep' => $item['ma_so_doanh_nghiep'] ?? null]);

            if (!$model) {
                $model = new DoanhNghiep();
            }

            // Gán dữ liệu từ file JSON vào model
            $model->attributes = $item;

            if ($model->save()) {
                $successCount++;
                $this->stdout("Đã nhập thành công doanh nghiệp: {$model->ten_doanh_nghiep}\n", Console::FG_GREEN);
            } else {
                $errorCount++;
                $this->stdout("Lỗi khi lưu doanh nghiệp (Mã số: {$item['ma_so_doanh_nghiep']}): " . json_encode($model->errors) . "\n", Console::FG_YELLOW);
            }
        }

        $this->stdout("\n--- HOÀN TẤT SEED DATA ---\n", Console::FG_CYAN);
        $this->stdout("Thành công: {$successCount} bản ghi\n", Console::FG_GREEN);
        if ($errorCount > 0) {
            $this->stdout("Thất bại: {$errorCount} bản ghi\n", Console::FG_YELLOW);
        }

        return self::EXIT_CODE_NORMAL;
    }


    public function actionHoKinhDoanh()
    {
        $filePath = Yii::$app->basePath . '/data/ho_kinh_doanh.geojson';

        if (!file_exists($filePath)) {
            $this->stdout("Lỗi: Không tìm thấy file GeoJSON tại đường dẫn: {$filePath}\n", Console::FG_RED);
            return self::EXIT_CODE_ERROR;
        }

        $jsonContent = file_get_contents($filePath);
        if ($jsonContent === false) {
            $this->stdout("Lỗi: Không thể đọc file GeoJSON: {$filePath}\n", Console::FG_RED);
            return self::EXIT_CODE_ERROR;
        }

        $data = json_decode($jsonContent, true, 512, JSON_BIGINT_AS_STRING);
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($data)) {
            $this->stdout("Lỗi: GeoJSON không hợp lệ: " . json_last_error_msg() . "\n", Console::FG_RED);
            return self::EXIT_CODE_ERROR;
        }

        $features = $data['features'] ?? null;
        if (!is_array($features) || !$features) {
            $this->stdout("Lỗi: GeoJSON không có danh sách features hợp lệ!\n", Console::FG_RED);
            return self::EXIT_CODE_ERROR;
        }

        $formatDate = function ($value) {
            if ($value === null || $value === '' || strtoupper(trim((string)$value)) === 'NULL') {
                return null;
            }
            $value = trim((string)$value);
            foreach (['!d/m/Y', '!Y-m-d', '!Y/m/d', '!d-m-Y'] as $format) {
                $date = \DateTime::createFromFormat($format, $value);
                $errors = \DateTime::getLastErrors();
                if ($date && ($errors === false || ($errors['warning_count'] === 0 && $errors['error_count'] === 0))) {
                    return $date->format('Y-m-d');
                }
            }
            return false;
        };

        $successCount = 0;
        $errorCount = 0;
        $unmappedFields = [];

        foreach ($features as $featureIndex => $feature) {
            if (!is_array($feature) || !isset($feature['properties']) || !is_array($feature['properties'])) {
                $errorCount++;
                continue;
            }

            $item = $feature['properties'];

            $findVal = function (array $possibleKeys) use ($item) {
                foreach ($possibleKeys as $key) {
                    if (!array_key_exists($key, $item)) {
                        continue;
                    }
                    $value = $item[$key];
                    if (
                        $value !== null && $value !== ''
                        && !(is_string($value) && strtoupper(trim($value)) === 'NULL')
                    ) {
                        return $value;
                    }
                }
                return null;
            };

            $rawId = $item['id_ma'] ?? null;
            if ($rawId === null || (is_string($rawId) && trim($rawId) === '')) {
                $errorCount++;
                $this->stdout("Lỗi: Feature #" . ($featureIndex + 1) . " thiếu id_ma.\n", Console::FG_YELLOW);
                continue;
            }

            if (is_int($rawId)) {
                $maSo = (string)$rawId;
            } elseif (is_float($rawId) && is_finite($rawId) && floor($rawId) === $rawId) {
                $maSo = sprintf('%.0f', $rawId);
            } else {
                $maSo = trim((string)$rawId);
                if (preg_match('/^([+-]?\d+)\.0+$/', $maSo, $matches)) {
                    $maSo = $matches[1];
                }
            }

            // Kiểm tra xem đã có trong DB chưa để update hoặc insert mới
            $model = HoKinhDoanh::findOne(['ma_so_ho_kinh_doanh' => $maSo]);
            if (!$model) {
                $model = new HoKinhDoanh();
                $model->ma_so_ho_kinh_doanh = $maSo;
            }

            $fieldMap = [
                'so_giay_cn_dkkd' => ['gcn_dkkd'],
                'ngay_cap_giay_cn_dkkd' => ['ngàycap_g'],
                'ma_so_thue' => ['mst'],
                'so_nha' => ['so_nha'],
                'ten_duong' => ['ten_duong'],
                'phuong_xa' => ['ten_phuong'],
                'thanh_pho' => ['tinh_thanh'],
                'dia_chi_day_du' => ['dia_chi'],
                'tru_so_chinh' => ['dia_chi_sa'],
                'ten_nganh_nghe_kinh_doanh' => ['ten_ng_kd'],
                'nganh_nghe_chinh' => ['ten_ng_kd'],
                'mo_ta_nganh_nghe_kinh_doanh' => ['ten_ng_kd'],
                'chu_ho_ho_va_ten' => ['ten_nguoin'],
                'chu_ho_cccd' => ['cccd'],
                'chu_ho_quoc_tich' => ['quoc_tich', 'ten_quocgi'],
                'trang_thai_hoat_dong' => ['trangthai_'],
            ];
            $dateAttributes = ['ngay_cap_giay_cn_dkkd'];
            $optionalDateAttributes = ['ngay_sinh'];
            $dateError = false;
            foreach ($fieldMap as $attribute => $sourceKeys) {
                $hasSourceKey = false;
                foreach ($sourceKeys as $sourceKey) {
                    if (array_key_exists($sourceKey, $item)) {
                        $hasSourceKey = true;
                        break;
                    }
                }
                if (!$hasSourceKey) {
                    continue;
                }

                $value = $findVal($sourceKeys);
                if (in_array($attribute, $dateAttributes, true)) {
                    $value = $formatDate($value);
                    if ($value === false) {
                        $this->stdout(
                            "Lỗi: Ngày không hợp lệ ở trường {$sourceKeys[0]} (Mã: {$maSo}).\n",
                            Console::FG_YELLOW
                        );
                        $dateError = true;
                        break;
                    }
                }
                if ($model->hasAttribute($attribute)) {
                    $model->setAttribute($attribute, $value);
                } elseif ($value !== null) {
                    $unmappedFields[$sourceKeys[0]] = true;
                }
            }
            if ($dateError) {
                $errorCount++;
                continue;
            }

            $optionalFieldMap = [
                'noi_sinh' => 'noi_sinh',
                'ngay_sinh' => 'ngay_sinh',
                'ma_dvhc' => 'ma_dvhc',
                'ten_dvhc' => 'ten_dvhc',
            ];
            foreach ($optionalFieldMap as $attribute => $sourceKey) {
                if (!array_key_exists($sourceKey, $item)) {
                    continue;
                }

                $value = $item[$sourceKey];
                if (is_string($value) && strtoupper(trim($value)) === 'NULL') {
                    $value = null;
                }
                if (in_array($attribute, $optionalDateAttributes, true)) {
                    $value = $formatDate($value);
                    if ($value === false) {
                        $this->stdout(
                            "Lỗi: Ngày không hợp lệ ở trường {$sourceKey} (Mã: {$maSo}).\n",
                            Console::FG_YELLOW
                        );
                        $dateError = true;
                        break;
                    }
                }
                if ($model->hasAttribute($attribute)) {
                    $model->setAttribute($attribute, $value);
                } elseif ($value !== null && !(is_string($value) && strtoupper(trim($value)) === 'NULL')) {
                    $unmappedFields[$sourceKey] = true;
                }
            }
            if ($dateError) {
                $errorCount++;
                continue;
            }

            $lng = null;
            $lat = null;
            $coordinates = $feature['geometry']['coordinates'] ?? null;
            $coordinatePairs = [
                is_array($coordinates) ? [$coordinates[0] ?? null, $coordinates[1] ?? null] : [null, null],
                [$item['lng'] ?? null, $item['lat'] ?? null],
                [$item['long_x'] ?? null, $item['lat_y'] ?? null],
            ];
            foreach ($coordinatePairs as $pair) {
                if (!is_numeric($pair[0]) || !is_numeric($pair[1])) {
                    continue;
                }
                $candidateLng = (float)$pair[0];
                $candidateLat = (float)$pair[1];
                if (
                    is_finite($candidateLng) && is_finite($candidateLat)
                    && $candidateLng >= -180 && $candidateLng <= 180
                    && $candidateLat >= -90 && $candidateLat <= 90
                ) {
                    $lng = $candidateLng;
                    $lat = $candidateLat;
                    break;
                }
            }
            if ($lng === null || $lat === null) {
                $errorCount++;
                $this->stdout("Lỗi: Feature #" . ($featureIndex + 1)
                    . " có tọa độ không hợp lệ (Mã: {$maSo}).\n", Console::FG_YELLOW);
                continue;
            }

            $model->toa_do_x = $lng;
            $model->toa_do_y = $lat;
            $model->lng = $lng;
            $model->lat = $lat;

            if ($model->save()) {
                $successCount++;
            } else {
                $errorCount++;
                $this->stdout("Lỗi lưu HKD (Mã: {$maSo}): " . json_encode($model->errors, JSON_UNESCAPED_UNICODE) . "\n", Console::FG_YELLOW);
            }
        }

        $this->stdout("\n--- HOÀN TẤT SEED HỘ KINH DOANH ---\n", Console::FG_CYAN);
        $this->stdout("Thành công: {$successCount} bản ghi | Thất bại: {$errorCount} bản ghi\n", $errorCount > 0 ? Console::FG_YELLOW : Console::FG_GREEN);
        if ($unmappedFields) {
            $this->stdout(
                "Các trường GeoJSON chưa có cột tương ứng trong bảng: "
                    . implode(', ', array_keys($unmappedFields)) . "\n",
                Console::FG_YELLOW
            );
        }

        return $errorCount > 0 ? self::EXIT_CODE_ERROR : self::EXIT_CODE_NORMAL;
    }


    /**
     * Lệnh chạy: php yii seed/user
     */

    /**
     * Lệnh chạy: php yii seed/user
     */
    public function actionUser()
    {
        $filePath = Yii::$app->basePath . '/data/user.json';

        if (!file_exists($filePath)) {
            $this->stdout("Lỗi: Không tìm thấy file JSON tại đường dẫn: {$filePath}\n", Console::FG_RED);
            return self::EXIT_CODE_ERROR;
        }

        $jsonContent = file_get_contents($filePath);
        if ($jsonContent === false) {
            $this->stdout("Lỗi: Không thể đọc file JSON: {$filePath}\n", Console::FG_RED);
            return self::EXIT_CODE_ERROR;
        }

        $data = json_decode($jsonContent, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->stdout("Lỗi: JSON không hợp lệ: " . json_last_error_msg() . "\n", Console::FG_RED);
            return self::EXIT_CODE_ERROR;
        }
        if (!is_array($data) || !$data) {
            $this->stdout("Lỗi: File JSON không có bản ghi user.\n", Console::FG_RED);
            return self::EXIT_CODE_ERROR;
        }

        $successCount = 0;
        $errorCount = 0;

        foreach ($data as $item) {
            if (!is_array($item)) {
                $errorCount++;
                $this->stdout("Lỗi: Bản ghi user không đúng định dạng object.\n", Console::FG_YELLOW);
                continue;
            }

            $username = $item['username'] ?? null;
            if (empty($username)) {
                $errorCount++;
                $this->stdout("Lỗi: Bản ghi user thiếu username.\n", Console::FG_YELLOW);
                continue;
            }

            // Tìm xem user đã tồn tại chưa
            $model = User::findOne(['username' => $username]);
            if (!$model) {
                $model = new User();
                $model->username = $username;
                $model->auth_key = Yii::$app->security->generateRandomString();
            }

            // Gán email (nếu thiếu trong json thì lấy mặc định để không lỗi validate)
            $model->email = !empty($item['email']) ? $item['email'] : ($username . '@gis.vn');
            $model->status = $item['status'] ?? 1;

            // Gán role theo JSON, mặc định admin nếu username là 'admin', ngược lại là staff
            if (!empty($item['role'])) {
                $model->role = $item['role'];
            } elseif ($model->isNewRecord || empty($model->role)) {
                $model->role = ($username === 'admin') ? User::ROLE_ADMIN : User::ROLE_STAFF;
            }

            // Xử lý mật khẩu
            if (!empty($item['password'])) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($item['password']);
            } elseif ($model->isNewRecord) {
                // Nếu tạo mới mà không có password trong json thì gán tạm mật khẩu mặc định '123456' để qua bước validate
                $model->password_hash = Yii::$app->security->generatePasswordHash('123456');
            }

            if ($model->save()) {
                $successCount++;
                $this->stdout("Đã seed thành công tài khoản: {$model->username} (role: {$model->role})\n", Console::FG_GREEN);
            } else {
                $errorCount++;
                // In chi tiết lỗi validate của Model ra console để dễ debug
                $errors = json_encode($model->errors, JSON_UNESCAPED_UNICODE);
                $this->stdout("Lỗi khi lưu tài khoản ({$username}): {$errors}\n", Console::FG_YELLOW);
            }
        }

        $this->stdout("\n--- HOÀN TẤT SEED USER ---\n", Console::FG_CYAN);
        $this->stdout("Thành công: {$successCount} bản ghi", Console::FG_GREEN);
        if ($errorCount > 0) {
            $this->stdout(" | Thất bại: {$errorCount} bản ghi", Console::FG_YELLOW);
        }
        $this->stdout("\n", Console::FG_CYAN);

        return $errorCount > 0 ? self::EXIT_CODE_ERROR : self::EXIT_CODE_NORMAL;
    }

    /**
     * Lệnh chạy: php yii seed/clean-user
     */
    public function actionCleanUser()
    {
        // Xóa toàn bộ dữ liệu trong bảng user
        $count = User::deleteAll();

        $this->stdout("Đã xóa thành công {$count} tài khoản khỏi cơ sở dữ liệu!\n", Console::FG_GREEN);
        return self::EXIT_CODE_NORMAL;
    }

    /**
     * Lệnh chạy: php yii seed/clean-ho-kinh-doanh
     */
    public function actionCleanHoKinhDoanh()
    {
        $count = HoKinhDoanh::deleteAll();
        $this->stdout("Đã xóa thành công {$count} bản ghi hộ kinh doanh khỏi cơ sở dữ liệu!\n", Console::FG_GREEN);
        return self::EXIT_CODE_NORMAL;
    }
}
