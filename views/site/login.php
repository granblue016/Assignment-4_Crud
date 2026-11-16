<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Đăng nhập hệ thống';
?>
<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5">
        <div class="card shadow-sm border-0 rounded-4 p-4">
            <div class="card-body">
                <div class="text-center mb-4">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm mb-3" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-lock fa-xl"></i>
                    </div>
                    <h2 class="h4 fw-bold text-dark">Đăng Nhập Hệ Thống</h2>
                    <p class="text-muted small">Web GIS Quản lý Khu vực Cầu Ông Lãnh</p>
                </div>

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'fieldConfig' => [
                        'template' => "{label}\n{input}\n{error}",
                        'labelOptions' => ['class' => 'form-label fw-semibold text-secondary'],
                        'inputOptions' => ['class' => 'form-control rounded-pill px-3 py-2'],
                        'errorOptions' => ['class' => 'invalid-feedback small mt-1'],
                    ],
                ]); ?>

                <?= $form->field($model, 'username')->textInput([
                    'autofocus' => true,
                    'placeholder' => 'Nhập tên đăng nhập (ví dụ: admin)'
                ])->label('Tài khoản') ?>

                <?= $form->field($model, 'password')->passwordInput([
                    'placeholder' => 'Nhập mật khẩu'
                ])->label('Mật khẩu') ?>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <?= $form->field($model, 'rememberMe', [
                        'template' => "<div class=\"form-check\">{input} {label}</div>\n{error}",
                        'labelOptions' => ['class' => 'form-check-label text-muted small'],
                        'inputOptions' => ['class' => 'form-check-input']
                    ])->checkbox([], false)->label('Nhớ tài khoản') ?>
                </div>

                <div class="d-grid">
                    <?= Html::submitButton('<i class="fa-solid fa-right-to-bracket me-2"></i>Đăng Nhập', [
                        'class' => 'btn btn-primary btn-lg rounded-pill shadow-sm', 
                        'name' => 'login-button'
                    ]) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>