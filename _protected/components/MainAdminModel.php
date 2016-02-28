<?php
/**
 * Created by PhpStorm.
 * User: rashad
 * Date: 2/28/16
 * Time: 21:31
 */

namespace app\components;

use Yii;

class MainAdminModel extends \app\components\AppActiveRecord{
  public function behaviors(){
    return [
      'blameable' => [
        'class' => 'yii\behaviors\BlameableBehavior',
        'createdByAttribute' => 'creator_id',
        'updatedByAttribute' => 'updater_id',
      ],
      'timestamp' => [
        'class'      => 'yii\behaviors\TimestampBehavior',
        'attributes' => [
          ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
          ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
        ],
      ],
    ];
  }

  public function getCreateName(){
    return $this->creator ? $this->creator->username : '- no user -';
  }

  public function getUpdateName(){
    return $this->updater ? $this->updater->username : '- no user -';
  }
}