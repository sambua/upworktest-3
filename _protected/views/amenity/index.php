<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AmenitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Amenities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="amenity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Amenity', ['create'], ['class' => 'btn btn-success']) ?>
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
            'title',
            'description:ntext',
            [
              'attribute' => 'updater_id',
              'value' => function($data){return $data->updaterName ;}
            ],
            'updated_at:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
