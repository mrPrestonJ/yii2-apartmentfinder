<?php

namespace app\models;

use mootensai\relation\RelationTrait;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%new_building}}".
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 *
 * @property Apartment[] $apartments
 * @property City $city
 * @property Section[] $sections
 */
class NewBuilding extends ActiveRecord
{
    use RelationTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%new_building}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['city_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
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
            'city_id' => 'City',
            'sections' => 'section'
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getApartments()
    {
        return $this->hasMany(Apartment::className(), ['new_building_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    public function getCitiesDropDown()
    {
        $cities =  City::find()->orderBy('id')->asArray()->all();
        return ArrayHelper::map($cities,'id','name');
    }

    /**
     * @return ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Section::className(), ['new_building_id' => 'id']);
    }
}
