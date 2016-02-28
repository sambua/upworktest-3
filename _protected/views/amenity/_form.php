<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Amenity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="amenity-form">

    <?php $form = ActiveForm::begin(); ?>

  <div class="row">
    <div class="col-sm-6 col-md-4">
      <?= $form->field($model, 'status')->checkbox() ?>
    </div>
    <div class="col-sm-6 col-md-8">
      <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    </div>
  </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
