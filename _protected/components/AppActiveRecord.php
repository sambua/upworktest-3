<?php
/**
 * Created by PhpStorm.
 * User: rashad
 * Date: 2/28/16
 * Time: 21:32
 */
namespace app\components;

use Yii;
use yii\db\ActiveRecord;

class AppActiveRecord extends ActiveRecord{
  public $attachments;

  const STATUS_PUBLISHED = 1;
  const STATUS_DRAFT = 0;

  /**
   * @inheritdoc
   */
  public function rules(){
    return [
      [['attachments'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg',
        'message' => Yii::t('common','Please upload at least one photo, maximum allowed photos 10.'),
      ],
    ];
  }
}