<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Faer;

/**
 * FaerSearch represents the model behind the search form about `app\models\Faer`.
 */
class FaerSearch extends Faer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numero', 'radicado'], 'integer'],
            [['nit_presento', 'faer_no', 'proyecto', 'nit_ejecuto', 'fecha_radicacion', 'fecha_aprobacion'], 'safe'],
            [['oep'], 'number'],
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
        $query = Faer::find();

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
            'numero' => $this->numero,
            'radicado' => $this->radicado,
            'oep' => $this->oep,
        ]);

        if(strlen($this->fecha_radicacion)>0)
            $query->andFilterWhere([
                'between', 'fecha_radicacion', substr($this->fecha_radicacion,0,10), substr($this->fecha_radicacion,12,22)
            ]);

        $query->andFilterWhere(['like', 'nit_presento', $this->nit_presento])
            ->andFilterWhere(['like', 'faer_no', $this->faer_no])
            ->andFilterWhere(['like', 'proyecto', $this->proyecto])
            ->andFilterWhere(['like', 'nit_ejecuto', $this->nit_ejecuto]);

        return $dataProvider;
    }
}
