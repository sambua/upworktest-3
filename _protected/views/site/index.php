<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = Yii::t('app', Yii::$app->name);
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcom to hotels web page</h1>

      <?php if(\Yii::$app->user->isGuest): ?>
        <p class="lead">
          You can see now only few hotels information, for more please
          <a class="btn btn-link" href="<?= Url::to(['/signup']) ?>">signup.</a>
        </p>
        <div class="row">
          <?php foreach($model as $item): ?>
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                <?php $image_link = \Yii::getAlias('@uploadsUrl')."/hotels/".$item->id."/"; ?>
                <?php $image = !empty($media = $item->hotelDefaultImage) ? $media->name : 'no_image.png' ?>

                <img src="<?= $image_link.$image ?>" alt="<?= $item->title ?>">
                <div class="caption">
                  <h3><?= $item->title ?></h3>
                  <p><?= \app\components\helpers\Setup::truncate($item->description, 120, "...") ?></p>
                </div>
              </div>
            </div>
          <?php endforeach ?>
          <p><a class="btn btn-lg btn-success" href="<?= Url::to(['/signup']) ?>">Sign Up to see all hotels</a></p>
        </div>
      <?php else: ?>
        <p class="lead"> Hello user : <?= Yii::$app->user->identity->username ?> </p>

        <p><a class="btn btn-lg btn-success" href="<?= Url::to(['/site/hotels']) ?>">View all hotels</a></p>
      <?php endif; ?>


    </div>
</div>

