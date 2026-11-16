<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

NavBar::begin([
    'brandLabel' => 'Web GIS Cầu Ông Lãnh', // Đổi tên ứng dụng cho chuyên nghiệp
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top'],
]);

echo Nav::widget([
    'options' => ['class' => 'navbar-nav ms-auto'],
    'items' => [
        ['label' => 'Trang chủ', 'url' => ['/site/index']],
        ['label' => 'Doanh Nghiệp', 'url' => ['/doanh-nghiep/index']],
        ['label' => 'Hộ Kinh Doanh', 'url' => ['/ho-kinh-doanh/index']],
        Yii::$app->user->isGuest
            ? ['label' => 'Đăng nhập', 'url' => ['/site/login']]
            : '<li class="nav-item">'
                . Html::beginForm(['/site/logout'])
                . Html::submitButton(
                    'Đăng xuất (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'nav-link btn btn-link logout']
                )
                . Html::endForm()
                . '</li>',
    ],
]);

NavBar::end();