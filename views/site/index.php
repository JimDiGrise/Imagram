<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
$this->title = 'Flckr';
?>
<div class="site-index">
    <div class="row centered">
        <div class="col-lg-11 col-lg-offset-1">
            <?php foreach ($photos as $photo): ?>
                <?= Html::a(Html::img('@web/img/' . $photo->filename, ['class' => 'user-photo-item image-responsive']), '/images/view/' . $photo->id) ?>
            <?php endforeach; ?>
        </div>
        
    </div> 
</div>
