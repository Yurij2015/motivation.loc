<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Achievement;

/**
 * app\models\AchievementSearch represents the model behind the search form about `app\models\Achievement`.
 */
 class AchievementSearch extends Achievement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idachievement'], 'integer'],
            [['name', 'description', 'date_add', 'date_up'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Achievement::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idachievement' => $this->idachievement,
            'date_add' => $this->date_add,
            'date_up' => $this->date_up,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
