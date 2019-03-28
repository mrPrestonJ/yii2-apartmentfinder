<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ApartmentSearch represents the model behind the search form of `app\models\Apartment`.
 */
class ApartmentSearch extends Apartment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'new_building_id', 'section_id', 'is_typical'], 'integer'],
            [['room_count'], 'safe'],
            [['cost_per_meter', 'cost_total', 'total_area'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Apartment::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'new_building_id' => $this->new_building_id,
            'section_id' => $this->section_id,
            'total_area' => $this->total_area,
            'cost_per_meter' => $this->cost_per_meter,
            'cost_total' => $this->cost_total,
            'is_typical' => $this->is_typical,
        ]);

        $query->andFilterWhere(['like', 'room_count', $this->room_count]);

        return $dataProvider;
    }
}
