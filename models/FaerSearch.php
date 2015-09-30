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
            [['numero', 'usuarios_ampliacion', 'radicado', 'departamento', 'municipio', 'usuarios_mejoramiento'], 'integer'],
            [['nit_presento', 'faer_no', 'proyecto', 'nit_ejecuto', 'fecha_presentacion', 'fecha_aprobacion', 'fecha_ajuste'], 'safe'],
            [['valor_total', 'solicitud_faer', 'valor_usuario', 'cup', 'cob', 'nbi', 'un', 'oep', 'latitud', 'longitud', 'cofinanciacion'], 'number'],
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
            'valor_total' => $this->valor_total,
            'solicitud_faer' => $this->solicitud_faer,
            'usuarios_ampliacion' => $this->usuarios_ampliacion,
            'valor_usuario' => $this->valor_usuario,
            'radicado' => $this->radicado,
            'cup' => $this->cup,
            'cob' => $this->cob,
            'nbi' => $this->nbi,
            'un' => $this->un,
            'oep' => $this->oep,
            'departamento' => $this->departamento,
            'municipio' => $this->municipio,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
            'fecha_presentacion' => $this->fecha_presentacion,
            'fecha_aprobacion' => $this->fecha_aprobacion,
            'fecha_ajuste' => $this->fecha_ajuste,
            'usuarios_mejoramiento' => $this->usuarios_mejoramiento,
            'cofinanciacion' => $this->cofinanciacion,
        ]);

        $query->andFilterWhere(['like', 'nit_presento', $this->nit_presento])
            ->andFilterWhere(['like', 'faer_no', $this->faer_no])
            ->andFilterWhere(['like', 'proyecto', $this->proyecto])
            ->andFilterWhere(['like', 'nit_ejecuto', $this->nit_ejecuto]);

        return $dataProvider;
    }
}
