<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%hotel_media_files}}".
 *
 * @property integer $id
 * @property integer $hotel_id
 * @property integer $default
 * @property string $file_name
 * @property string $name
 * @property string $created_at
 * @property string $mime
 * @property string $size
 * @property string $base_name
 *
 * @property Hotels $hotel
 */
class HotelMediaFile extends \app\components\AppActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%hotel_media_files}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hotel_id'], 'required'],
            [['hotel_id', 'default', 'size'], 'integer'],
            [['created_at'], 'safe'],
            [['file_name', 'base_name'], 'string', 'max' => 1024],
            [['file_name', 'type', 'name'], 'string', 'max' => 255],
            [['mime'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(){
        return [
            'id' => 'ID',
            'hotel_id' => 'Hotel',
            'base_name' => 'Base Name',
            'file_name' => 'Name',
            'name' => 'Name',
            'type' => 'type',
            'size' => 'Size',
            'mime' => 'Mime',
            'default' => 'Default image',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotel()
    {
        return $this->hasOne(Hotels::className(), ['id' => 'hotel_id']);
    }
}
