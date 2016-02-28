<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

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
}
