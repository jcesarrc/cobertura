<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fuentesxproyecto;

/**
 * FuentesxproyectoSearch represents the model behind the search form about `app\models\Fuentesxproyecto`.
 */
class FuentesxproyectoSearch extends Fuentesxproyecto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bpin', 'id_fuente', 'anio'], 'integer'],
            [['valor'], 'number'],
            [['observacion'], 'safe'],
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
        $query = Fuentesxproyecto::find();

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
            'bpin' => $this->bpin,
            'id_fuente' => $this->id_fuente,
            'valor' => $this->valor,
            'anio' => $this->anio,
        ]);

        $query->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
