<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Proyectoxcomite;

/**
 * ProyectoxcomiteSearch represents the model behind the search form about `app\models\Proyectoxcomite`.
 */
class ProyectoxcomiteSearch extends Proyectoxcomite
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bpin', 'idComite'], 'integer'],
            [['fecha', 'acta_aprobacion'], 'safe'],
            [['valor_aprobado'], 'number'],
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
        $query = Proyectoxcomite::find();

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
            'idComite' => $this->idComite,
            'fecha' => $this->fecha,
            'valor_aprobado' => $this->valor_aprobado,
        ]);

        $query->andFilterWhere(['like', 'acta_aprobacion', $this->acta_aprobacion]);

        return $dataProvider;
    }
}
