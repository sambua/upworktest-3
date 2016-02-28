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
            'controllers' => ['user', 'manager', 'hotel', 'amenity'],
            'actions' => ['index', 'view', 'create', 'update', 'admin', 'upload'],
            'allow' => true,
            'roles' => ['admin'],
          ],
          [
            'actions' => ['delete'],
            'allow' => true,
            'roles' => ['admin'],
          ],
          [
            'controllers' => ['site'],
            'actions' => ['hotels', 'single-hotel'],
            'allow' => true,
            'roles' => ['member'],
          ],
          [
            'controllers' => ['site'],
            'actions' => ['index', 'about', 'contact'],
            'allow' => true,
            'roles' => ['?', '@'],
          ],
          [
            'actions' => ['signup', 'login'],
            'allow' => true,
            'roles' => ['?'],
          ],
          [
            'actions' => ['logout'],
            'allow' => true,
            'roles' => ['@'],
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

} // AppController
