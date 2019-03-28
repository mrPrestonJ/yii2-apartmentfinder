<?php

namespace frontend\models;

use common\models\Apartment;
use yii\data\ActiveDataProvider;

class ApartmentsSearch extends Apartment
{
    public $city;
    public $roomCount;
    public $newBuilding;
    public $cityName;
    public $sectionName;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city', 'roomCount'], 'safe'],
        ];
    }

    public function search($params) {
        $query = ApartmentsSearch::find()->alias('a');
        $query->select(['a.total_area', 'a.cost_total',  'newBuilding' => 'nb.name', 'cityName'=>'c.name']);
        $query->addSelect(["IFNULL(CONCAT(s.`name`, ' (', s.`address`, ')') , CONCAT(ts.`name`, ' (', ts.`address`, ')')) as sectionName"]);
        $query->leftJoin('{{%section}} as s', 's.new_building_id = a.new_building_id AND a.is_typical = 0 AND s.id = a.section_id');
        $query->leftJoin('{{%section}} as ts', 'ts.new_building_id = a.new_building_id AND a.is_typical = 1');
        $query->join('INNER JOIN','{{%new_building}} as nb', 'a.`new_building_id` = nb.`id`');
        $query->join('INNER JOIN', '{{%city}} as c', 'c.id = nb.city_id');
        $query->orderBy('a.is_typical');
        $this->load($params, 'ApartmentsForm');
        if ($this->city) {
            $query->andWhere(['c.id' => $this->city]);
        }
        if ($this->roomCount) {
            $query->andWhere(['a.room_count' => $this->roomCount]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false,
        ]);

        return $dataProvider;
    }
}
