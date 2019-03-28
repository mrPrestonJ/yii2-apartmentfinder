<?php

namespace frontend\models;

use common\models\City;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class ApartmentsForm extends Model {
    public $city;
    public $roomCount;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city', 'roomCount'], 'safe'],
        ];
    }


    public function getCities() {
        $cities =  City::find()->orderBy('id')->asArray()->all();
          return ArrayHelper::map($cities,'id','name');
    }
}
