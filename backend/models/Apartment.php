<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;
use common\models\Apartment as CommonApartment;

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
class Apartment extends CommonApartment
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%apartment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['new_building_id', 'section_id', 'is_typical'], 'integer'],
            [['room_count'], 'string'],
            [['total_area', 'cost_per_meter', 'cost_total'], 'number'],
            [['total_area', 'cost_per_meter', 'cost_total', 'room_count'], 'required'],
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

    public function getNewBuildingDropDown()
    {
        $newBuildings =  NewBuilding::find()->orderBy('id')->asArray()->all();
        return ArrayHelper::map($newBuildings,'id','name');
    }

    /**
     * @return ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(Section::className(), ['id' => 'section_id']);
    }

    public function getSectionsDropDown()
    {

        $Sections =  Section::find()->where(['new_building_id' => $this->new_building_id])->orderBy('id')->asArray()->all();
        return ArrayHelper::map($Sections,'id','name');
    }
}
