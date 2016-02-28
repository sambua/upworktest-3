<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%hotel_amentities}}".
 *
 * @property integer $id
 * @property integer $hotel_id
 * @property integer $amentity_id
 * @property string $created_at
 *
 * @property Hotels $hotel
 * @property Amentities $amentity
 */
class HotelAmentity extends \app\components\AppActiveRecord{
    /**
     * @inheritdoc
     */
    public static function tableName(){
      return '{{%hotel_amentities}}';
    }

    /**
     * @inheritdoc
     */
    public function rules(){
      return [
        [['hotel_id', 'amentity_id'], 'integer'],
        [['created_at'], 'safe']
      ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(){
      return [
        'id' => 'ID',
        'hotel_id' => 'Hotel ID',
        'amentity_id' => 'Amentity ID',
        'created_at' => 'Created At',
      ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotel(){
      return $this->hasOne(Hotels::className(), ['id' => 'hotel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAmentity(){
      return $this->hasOne(Amentities::className(), ['id' => 'amentity_id']);
    }
}
