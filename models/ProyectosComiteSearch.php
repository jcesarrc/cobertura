<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProyectosComite;

/**
 * ProyectosComiteSearch represents the model behind the search form about `app\models\ProyectosComite`.
 */
class ProyectosComiteSearch extends ProyectosComite
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'proyecto', 'comite'], 'integer'],
            [['fecha_aprobacion', 'acta_aprobacion', 'usuario_aprobo'], 'safe'],
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
        $query = ProyectosComite::find();

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
            'proyecto' => $this->proyecto,
            'comite' => $this->comite,
            'fecha_aprobacion' => $this->fecha_aprobacion,
        ]);

        $query->andFilterWhere(['like', 'acta_aprobacion', $this->acta_aprobacion])
            ->andFilterWhere(['like', 'usuario_aprobo', $this->usuario_aprobo]);

        return $dataProvider;
    }

}
