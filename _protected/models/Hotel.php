<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\imagine\Image;

/**
 * This is the model class for table "{{%hotels}}".
 *
 * @property integer $id
 * @property integer $status
 * @property string $title
 * @property string $description
 * @property integer $creator_id
 * @property integer $created_at
 * @property integer $updater_id
 * @property integer $updated_at
 *
 * @property HotelMediaFile[] $hotelMediaFiles
 * @property HotelAmeniity[] $hotelAmentities
 * @property User $creator
 * @property User $updater
 */


class Hotel extends \app\components\MainAdminModel{
    /**
     * @inheritdoc
     */
    public static function tableName(){
        return '{{%hotels}}';
    }

  public function behaviors(){
    return [
      [
        'class' => \app\components\behaviors\ManyToManyBehavior::className(),
        'relations' => [
          'amenity_ids' => 'hotelAmenities',
        ],
      ],
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

  /**
   * @inheritdoc
   */
  public function rules(){
    return [
      [['amenity_ids'], 'each', 'rule' => ['string']],
      [['amenity_ids'], 'required'],
      [['status', 'creator_id', 'created_at', 'updater_id', 'updated_at'], 'integer'],
      [['description'], 'string'],
      [['title'], 'string', 'max' => 255]
    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels(){
    return [
      'id' => 'ID',
      'status' => 'Status',
      'title' => 'Title',
      'description' => 'Description',
      'creator_id' => 'Creator ID',
      'created_at' => 'Created At',
      'updater_id' => 'Updater ID',
      'updated_at' => 'Updated At',
    ];
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getHotelMediaFiles(){
    return $this->hasMany(HotelMediaFile::className(), ['hotel_id' => 'id']);
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getHotelDefaultImage(){
    return $this->hasOne(HotelMediaFile::className(), ['hotel_id' => 'id'])
      ->andWhere(['default' => 1]);
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getHotelAmenities(){
      return $this->hasMany(Amenity::className(), ['id' => 'amenity_id'])
        ->viaTable('{{%hotel_amenities}}', ['hotel_id' => 'id']);
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getCreator(){
    return $this->hasOne(User::className(), ['id' => 'creator_id']);
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getUpdater(){
    return $this->hasOne(User::className(), ['id' => 'updater_id']);
  }

  public function afterSave($insert, $attributes){
    $attachment_model = new \app\models\HotelMediaFile();

    # For multiple attachments with drop Box
    if(Yii::$app->session->has('attachments')){
      if($this->_saveAttachments(Yii::$app->session->get('attachments'), 'hotels', $attachment_model, 800, 600)){
        Yii::$app->session->set('attachments', null);
      }
    }

    parent::afterSave($insert, $attributes);
  }


  private function _saveAttachments($attachments, $folder_name, $attachment_model, $img_w = NULL, $thumb_w = NULL){
    $model_name_class = $attachment_model::className();

    foreach($attachments as $k => $v){

      $model = new $model_name_class();
      if($k == 0) $model->default = 1;
      $model->hotel_id = $this->id;

      $model->base_name = $v['base_name'];
      $model->name = $v['name'];
      $model->mime = $v['type'];
      $model->size = $v['size'];

      if($model->save()){
        $new_file = Yii::getAlias("@uploads/{$folder_name}/".$this->id."/".$model->name);
        $path = dirname($new_file);
        if(!is_dir($path)){
          if(!mkdir($path, 0777)) die('Failed to create folders...'); chmod($path, 0777);
          if(!mkdir($path."/thumb", 0777)) die('Failed to create folders...');chmod($path."/thumb", 0777);

          $content = "Not allowed!";
          $fp = fopen($path . "/index.html", "wb"); fwrite($fp, $content); fclose($fp);
          $fp = fopen($path."/thumb" . "/index.html", "wb"); fwrite($fp, $content); fclose($fp);
        }


        if(rename($v['temp_storage'], $new_file)){
          // Success
        } else {
          var_dump("Temporary storage: ".$v['temp_storage'], "New destination name: ".$new_file, "Error: ".$v['error']);
        }
      } else {
        \Yii::$app->getSession()->setFlash('alert', ['options'=>['class'=>'alert-danger'], 'body'=>Yii::t('common', 'Error occurred during saving files')]);
        return false;
      }
    }
    return true;
  }


  /**
   * Upload images as array otherwise return false
   * @return bool|\yii\web\UploadedFile[]
   */
  public function uploadAttachment(){
    $attachments = \yii\web\UploadedFile::getInstances($this, 'attachments');
    if(empty($attachments)){ return false;}

    $output = [];
    $counter = 0;

    foreach($attachments as $image){
      $image_name = explode(".", $image->name);
      $output[$counter]['base_name'] = reset($image_name);
      $output[$counter]['extension'] = $image->extension;
      $output[$counter]['name'] = Yii::$app->security->generateRandomString().".{$output[$counter]['extension']}";
      $output[$counter]['type'] = $image->type;
      $output[$counter]['size'] = $image->size;
      $output[$counter]['error'] = $image->error;

      $output[$counter]['temp_storage'] = Yii::getAlias('@uploads').'/temp/'.$output[$counter]['name'];

      $new_attachment = $output[$counter]['temp_storage'];

      $image->saveAs($new_attachment);

      $counter++;
    }

    return $output;
  }

}
