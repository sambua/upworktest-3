<?php
/**
 * Created by PhpStorm.
 * User: rashad
 * Date: 2/29/16
 * Time: 01:16
 */

use yii\helpers\Url;

?>

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
          <p class="text-center"><a href="<?= Url::to(['/site/single-hotel', 'id' => $item->id]) ?>" class="btn btn-sm btn-success">read more</a></p>
        </div>
      </div>
    </div>
  <?php endforeach ?>
</div>
