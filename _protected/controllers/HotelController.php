<?php

namespace app\controllers;

use app\models\HotelMediaFile;
use Yii;
use app\models\Hotel;
use app\models\search\HotelSearch;
use app\components\AppController;
use yii\base\Model;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HotelController implements the CRUD actions for Hotel model.
 */
class HotelController extends AppController{
  public $layout = "//manager/main";

    /**
     * Lists all Hotel models.
     * @return mixed
     */
    public function actionIndex(){
        $searchModel = new HotelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hotel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Hotel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){
      $model = new Hotel();

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
        return $this->redirect(['view', 'id' => $model->id]);
      } else {
        return $this->render('create', [
          'model' => $model,
        ]);
      }
    }

    /**
     * Updates an existing Hotel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id){
        $model = $this->findModel($id);

        //var_dump(Yii::$app->session->has('attachments')); die();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Hotel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Hotel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hotel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hotel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

  public function actionUpload(){
    $model = new \app\models\Hotel();
    Yii::$app->session->set('attachments', null);
    Yii::$app->session->set('attachments', $model->uploadAttachment());
    var_dump(Yii::$app->session->get('attachments')); die();
  }

  /**
   * $folder name has  to be the same name as Model name
   * @param $id
   * @param string $folder
   * @return mixed
   */
  public function actionDeleteImage($id){
    $model = HotelMediaFile::findOne($id);

    $filename = Yii::getAlias('@uploads')."/hotels/".$model->hotel_id."/".$model->name;

    if(is_file($filename)) {
      unlink ($filename);
      if($model->delete()){
        Yii::$app->getSession()->setFlash('alert', ['options'=>['class'=>'alert-success'],
          'body'=>Yii::t('app', 'Image successfully was deleted')]);
      } else {
        Yii::$app->getSession()->setFlash('alert', ['options'=>['class'=>'alert-danger'],
          'body'=>Yii::t('app', 'Some error occurred!')]);
      }
    }
    return $this->redirect(Yii::$app->request->referrer);
  }
}
