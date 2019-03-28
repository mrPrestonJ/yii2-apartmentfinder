<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%section}}".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property int $new_building_id
 *
 * @property Apartment[] $apartments
 * @property NewBuilding $newBuilding
 */
class Section extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%section}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['new_building_id'], 'integer'],
            [['name', 'address'], 'string', 'max' => 255],
            [['new_building_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewBuilding::className(), 'targetAttribute' => ['new_building_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'new_building_id' => 'New Building ID',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getApartments()
    {
        return $this->hasMany(Apartment::className(), ['section_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getNewBuilding()
    {
        return $this->hasOne(NewBuilding::className(), ['id' => 'new_building_id']);
    }
}
