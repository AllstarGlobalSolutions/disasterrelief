<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Need;

/**
 * NeedSearch represents the model behind the search form about `app\models\Need`.
 */
class NeedSearch extends Need
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'disasterID', 'typeId', 'amount', 'detailedDescriptionOfNeed'], 'integer'],
            [['forWhom'], 'safe'],
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
        $query = Need::find();

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
            'disasterID' => $this->disasterID,
            'typeId' => $this->typeId,
            'amount' => $this->amount,
            'detailedDescriptionOfNeed' => $this->detailedDescriptionOfNeed,
        ]);

        $query->andFilterWhere(['like', 'forWhom', $this->forWhom]);

        return $dataProvider;
    }
}
