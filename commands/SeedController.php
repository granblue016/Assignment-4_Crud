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
        $filePath = Yii::$app->basePath . '/data/ho_kinh_doanh.json';

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
            // Kiểm tra theo mã số hộ kinh doanh
            $model = HoKinhDoanh::findOne(['ma_so_ho_kinh_doanh' => $item['ma_so_ho_kinh_doanh'] ?? null]);
            if (!$model) {
                $model = new HoKinhDoanh();
            }
            $model->attributes = $item;

            if ($model->save()) {
                $successCount++;
                $this->stdout("Đã nhập thành công hộ kinh doanh của chủ hộ: {$model->chu_ho_ho_va_ten}\n", Console::FG_GREEN);
            } else {
                $errorCount++;
                $this->stdout("Lỗi khi lưu hộ kinh doanh (Mã số: {$item['ma_so_ho_kinh_doanh']}): " . json_encode($model->errors) . "\n", Console::FG_YELLOW);
            }
        }

        $this->stdout("\n--- HOÀN TẤT SEED HỘ KINH DOANH ---\n", Console::FG_CYAN);
        $this->stdout("Thành công: {$successCount} bản ghi | Thất bại: {$errorCount} bản ghi\n", Console::FG_GREEN);

        return self::EXIT_CODE_NORMAL;
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
        $data = json_decode($jsonContent, true);

        if (empty($data)) {
            $this->stdout("Lỗi: File JSON trống hoặc định dạng không hợp lệ!\n", Console::FG_RED);
            return self::EXIT_CODE_ERROR;
        }

        $successCount = 0;
        $errorCount = 0;

        foreach ($data as $item) {
            $username = $item['username'] ?? null;
            if (empty($username)) {
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

            // Xử lý mật khẩu
            if (!empty($item['password'])) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($item['password']);
            } elseif ($model->isNewRecord) {
                // Nếu tạo mới mà không có password trong json thì gán tạm mật khẩu mặc định '123456' để qua bước validate
                $model->password_hash = Yii::$app->security->generatePasswordHash('123456');
            }

            if ($model->save()) {
                $successCount++;
                $this->stdout("Đã seed thành công tài khoản: {$model->username}\n", Console::FG_GREEN);
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

        return self::EXIT_CODE_NORMAL;
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
}
