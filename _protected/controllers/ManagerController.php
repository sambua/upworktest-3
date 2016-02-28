<?php
/**
 * Created by PhpStorm.
 * User: rashad
 * Date: 2/28/16
 * Time: 19:35
 */

namespace app\controllers;

use yii;
use yii\base\ViewContextInterface;

class ManagerController extends \app\components\AppController{

  public $layout = "//manager/main";

  public function beforeAction($action){
    $this->layout = (Yii::$app->user->isGuest || !Yii::$app->user->can('admin')) ? '//manager/login' : '//manager/main';

    return parent::beforeAction($action);
  }

  public function actionIndex(){

    return $this->render('index', [
    ]);
  }

  /**
   * Logs out the user.
   *
   * @return \yii\web\Response
   */
  public function actionLogout(){
    Yii::$app->user->logout();

    return $this->goHome();
  }


}