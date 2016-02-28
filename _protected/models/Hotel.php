<?php

namespace app\components\MainAdminModel;

use Yii;

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
 * @property HotelMediaFiles[] $hotelMediaFiles
 * @property HotelAmentities[] $hotelAmentities
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'creator_id', 'created_at', 'updater_id', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
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
    public function getHotelMediaFiles()
    {
        return $this->hasMany(HotelMediaFiles::className(), ['hotel_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotelAmentities()
    {
        return $this->hasMany(HotelAmentities::className(), ['hotel_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'creator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdater()
    {
        return $this->hasOne(User::className(), ['id' => 'updater_id']);
    }
}
