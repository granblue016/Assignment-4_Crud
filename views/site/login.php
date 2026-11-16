<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Đăng nhập hệ thống';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5">
        <div class="card bg-dark text-light border-secondary shadow-lg p-4 rounded-4">
            <div class="card-body">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-success mb-1">Web GIS Cầu Ông Lãnh</h2>
                    <p class="text-muted">Đăng nhập để truy cập hệ thống quản trị</p>
                </div>

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'fieldConfig' => [
                        'template' => "{label}\n{input}\n{error}",
                        'labelOptions' => ['class' => 'form-label text-light fw-semibold'],
                        'inputOptions' => ['class' => 'form-control bg-dark text-light border-secondary'],
                        'errorOptions' => ['class' => 'invalid-feedback'],
                    ],
                ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Nhập tài khoản quản trị']) ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Nhập mật khẩu']) ?>

                <?= $form->field($model, 'rememberMe', [
                    'template' => "<div class=\"form-check\">{input} {label}\n{error}</div>",
                ])->checkbox(['class' => 'form-check-input bg-dark border-secondary'], false) ?>

                <div class="form-group mt-4">
                    <?= Html::submitButton('Đăng nhập hệ thống', ['class' => 'btn btn-success w-100 py-2 fw-bold', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
        
        <div class="text-center mt-3 text-muted" style="font-size: 13px;">
            Hệ thống quản lý thông tin kinh tế - đô thị phục vụ đồ án thực tập tốt nghiệp.
        </div>
    </div>
</div>