<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Imagram',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-top',
        ],
    ]);
           $navItems=[
                
                ['label' => 'Upload', 'url' => ['/images/upload'] ],
                ['label' => 'Frends', 'url' => ['/followers/index' ] ],
                ['label' => 'Search', 'url' => ['/followers/search' ] ],
                ['label' => 'Feed', 'url' => ['/feed/index' ] ]
            ];
          if (Yii::$app->user->isGuest) {
            $navItems = [
                ['label' => 'Sign In', 'url' => ['/user/login']],
                ['label' => 'Sign Up', 'url' => ['/user/register']]
            ];
          } else {
            array_push($navItems,
                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']]
            );
          }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $navItems,
        ]);
    NavBar::end();
    ?>

    <div class="container-fluid">
       
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
