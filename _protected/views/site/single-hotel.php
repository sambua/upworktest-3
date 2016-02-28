<?php
/**
 * Created by PhpStorm.
 * User: rashad
 * Date: 2/29/16
 * Time: 01:21
 */

?>

<div class="row">
  <div class="col-sm-4">
    <?php if(!empty($images = $model->hotelMediaFiles)): ?>
      <?php $image_link = \Yii::getAlias('@uploadsUrl')."/hotels/".$model->id."/"; ?>
      <?php foreach($images as $image): ?>
        <img src="<?= $image_link.$image->name ?>" class="img-responsive" alt="Responsive image" />
        <hr class="col-xs-12"/>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
  <div class="col-sm-8">
    <h1> <?= $model->title ?> </div>
    <p> <?= $model->description ?></p>
    <h3>Amenities:</h3>
    <?php if(!empty($amenities = $model->hotelAmenities)): ?>

      <?php foreach($amenities as $amenity): ?>
        <p class="label label-success"><span class="glyphicon glyphicon-ok"></span> <?= $amenity->title ?></p> &nbsp;
      <?php endforeach; ?>

    <?php endif; ?>
</div>
