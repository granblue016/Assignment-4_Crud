<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> - Web GIS Cầu Ông Lãnh</title>

    <!-- Nhúng Bootstrap 5 CSS CDN (nếu asset của bạn chưa cập nhật) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome cho icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100 bg-light">
    <?php $this->beginBody() ?>

    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => '<i class="fa-solid fa-map-location-dot text-primary me-2"></i> Web GIS Cầu Ông Lãnh',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top shadow-sm']
        ]);

        $menuItems = [
            ['label' => '<i class="fa-solid fa-house me-1"></i> Trang chủ', 'url' => ['/site/index']],
        ];

        if (!Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => '<i class="fa-solid fa-building me-1"></i> Doanh nghiệp', 'url' => ['/doanh-nghiep/index']];
            $menuItems[] = ['label' => '<i class="fa-solid fa-store me-1"></i> Hộ kinh doanh', 'url' => ['/ho-kinh-doanh/index']];
        }

        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => '<i class="fa-solid fa-right-to-bracket me-1"></i> Đăng nhập', 'url' => ['/site/login']];
        } else {
            $menuItems[] = '<li class="nav-item">'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    '<i class="fa-solid fa-right-from-bracket me-1"></i> Đăng xuất (' . Html::encode(Yii::$app->user->identity->username) . ')',
                    ['class' => 'nav-link btn btn-link logout text-decoration-none']
                )
                . Html::endForm()
                . '</li>';
        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ms-auto mb-2 mb-md-0'],
            'encodeLabels' => false, // Cho phép hiển thị icon HTML trong menu
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>
    </header>

    <main role="main" class="flex-shrink-0 mt-5 pt-4">
        <div class="container py-4">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 bg-dark text-white text-center shadow-sm">
        <div class="container">
            <div class="row text-muted">
                <div class="col-md-6 text-md-start text-white-50">
                    &copy; Web GIS Cầu Ông Lãnh <?= date('Y') ?>
                </div>
                <div class="col-md-6 text-md-end text-white-50">
                    Phát triển trên nền tảng Yii2 & Bootstrap 5
                </div>
            </div>
        </div>
    </footer>

    <!-- Nhúng Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage(); ?>