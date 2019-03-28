<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%apartment}}".
 *
 * @property int $id
 * @property int $new_building_id
 * @property int $section_id
 * @property string $room_count
 * @property double $total_area
 * @property double $cost_per_meter
 * @property double $cost_total
 * @property int $is_typical
 *
 * @property NewBuilding $newBuilding
 * @property Section $section
 */
class Apartment extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%apartment}}';
    }

    public static function getRoomType() {
        return [
            '1к' => '1к',
            '2к' => '2к',
            '3к' => '3к',
            '4к' => '4к',
            '5к' => '5к',
            '5к-двухуровневая' => '5к-двухуровневая',
            '6к-двухуровневая' => '6к-двухуровневая'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['new_building_id', 'section_id', 'is_typical'], 'integer'],
            [['room_count'], 'string'],
            [['total_area', 'cost_per_meter', 'cost_total'], 'required'],
            [['total_area', 'cost_per_meter', 'cost_total'], 'number'],
            [['new_building_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewBuilding::className(), 'targetAttribute' => ['new_building_id' => 'id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => Section::className(), 'targetAttribute' => ['section_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'new_building_id' => 'New Building ID',
            'section_id' => 'Section ID',
            'room_count' => 'Room Count',
            'total_area' => 'Total Area',
            'cost_per_meter' => 'Cost Per Meter',
            'cost_total' => 'Cost Total',
            'is_typical' => 'Is Typical',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getNewBuilding()
    {
        return $this->hasOne(NewBuilding::className(), ['id' => 'new_building_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(Section::className(), ['id' => 'section_id']);
    }
}
