<?php
/**
 * Created by PhpStorm.
 * User: rashad
 * Date: 2/28/16
 * Time: 19:36
 */

namespace app\components;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use Yii;

/**
 * AppController extends Controller and implements the behaviors() method
 * where you can specify the access control ( AC filter + RBAC) for
 * your controllers and their actions.
 */
class AppController extends Controller{
  /**
   * Returns a list of behaviors that this component should behave as.
   * Here we use RBAC in combination with AccessControl filter.
   *
   * @return array
   */
  public function behaviors(){
    return [
      'access' => [
        'class' => AccessControl::className(),
        'rules' => [
          [
            'controllers' => ['user', 'article'],
            'actions' => ['index', 'view', 'create', 'update', 'admin'],
            'allow' => true,
            'roles' => ['admin'],
          ],
          [
            'actions' => ['delete'],
            'allow' => true,
            'roles' => ['admin'],
          ],
          [
            'controllers' => ['hotel'],
            'actions' => ['rate'],
            'allow' => true,
            'roles' => ['member'],
          ],
          [
            'controllers' => [],
            'actions' => [],
            'allow' => true
          ],
          [
            // other rules
          ],
        ], // rules
      ], // access
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'delete' => ['post'],
        ],
      ], // verbs
    ]; // return
  } // behaviors


  public function actionPage($slug){
    $this->layout = "//main";

    $model = \app\models\Page::find()->where(['url_name'=>$slug])->active()->one();

    return $this->render('view', [
      'model'=>$model,
      'file_path' => Yii::getAlias('@uploadsUrl')."/page/",
    ]);
  }


  /**
   * $folder name has  to be the same name as Model name
   * @param $id
   * @param string $folder
   * @return mixed
   */
  public function actionDeleteImage($id, $folder = 'page'){
    $lang_model_name_class = "\\app\\models\\".ucfirst($folder);

    if(class_exists($lang_model_name_class)) {
      $model = $lang_model_name_class::findOne($id);
    } else{
      $model = \app\models\Page::findOne($id);
    }

    $filename = Yii::getAlias('@uploads')."/$folder/".$model->image_url;
    $thumb_name = Yii::getAlias('@uploads')."/$folder/thumb/".$model->image_url;
    if(is_file($filename)) unlink ($filename);
    if(is_file($thumb_name)) unlink ($thumb_name);
    $model->image_url = Null;
    $model->save();

    #return $this->goBack();
    return $this->redirect(Yii::$app->request->referrer);
  }

} // AppController
