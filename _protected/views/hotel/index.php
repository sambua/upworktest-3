<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\HotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hotels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hotel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
              'attribute'=>'status',
              'format'   => 'html',
              'value'    => function($data){ return $data->status ? '<i class="fa fa-check-square" style="color:#5CB85C"></i>' : '<i class="fa fa-close" style="color: #A94442"></i>';},
              'filter'=> ['0' => 'Deactive' , '1' => 'Active'],
            ],
            [
              'label'   => 'Hotel Image',
              'format'  => 'html',
              'value'   => function($data){
                if(!empty($file = $data->hotelDefaultImage)) $image = $file->name;
                $id = $data->id ;
                $out = empty($image) ? \Yii::getAlias('@uploadsUrl')."/no_image.png" : \Yii::getAlias('@uploadsUrl')."/hotels/".$id."/".$image ;
                return Html::img($out, ['width' => '70px']);

              },
            ],
            'title',
            [
              'attribute' => 'updater_id',
              'value' => function($data){return $data->updaterName ;}
            ],
            'updated_at:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
