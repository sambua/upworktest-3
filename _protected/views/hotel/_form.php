<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Hotel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotel-form">

  <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

  <div class="row">
    <div class="col-sm-6 col-md-4">
      <?= $form->field($model, 'status')->checkbox() ?>
    </div>
    <div class="col-sm-6 col-md-8">
      <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    </div>
  </div>
  <hr class="col-xs-12"/>
  <div class="row">
    <div class="col-xs-12">
      <?= $form->field($model, 'amenity_ids')->checkboxList(
        ArrayHelper::map(\app\models\Amenity::find()->where(['status' => 1])->all(), 'id', 'title')
      ) ?>
    </div>
  </div>
  <hr class="col-xs-12"/>
  <div class="row">
    <div class="col-xs-12">
      <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    </div>
  </div>
<hr class="col-xs-12"/>
  <div class="row">
    <div class="col-xs-12">
      <?= $this->render('//layouts/partials/_uploadImage', ['form' => $form, 'model' => $model]) ?>
    </div>
  </div>
<hr class="col-xs-12"/>
  <?php if(!$model->isNewRecord && !empty($images = $model->hotelMediaFiles)): ?>
<div class="row">
  <div class="col-sm-12">
    <?php foreach($images as $image): ?>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="<?= \Yii::getAlias('@uploadsUrl')."/hotels/".$model->id."/".$image->name ?>">
          <div class="caption">
            <p><a href="<?= Url::to(['delete-image','id' => $image->id]) ?>" class="btn btn-danger" role="button">Delete</a></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
  <?php endif; ?>
<hr class="col-xs-12"/>
  <div class="form-group">
      <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
