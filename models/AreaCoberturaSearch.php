<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AreaCobertura;

/**
 * AreaCoberturaSearch represents the model behind the search form about `app\models\AreaCobertura`.
 */
class AreaCoberturaSearch extends AreaCobertura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bpin', 'departamento', 'municipio', 'localidad', 'barrio'], 'integer'],
            [['tipo_servicio', 'direccion'], 'safe'],
            [['longitud', 'latitud', 'capacidad_instalada', 'capacidad_almacenamiento'], 'number'],
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
        $query = AreaCobertura::find();

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
            'departamento' => $this->departamento,
            'municipio' => $this->municipio,
            'localidad' => $this->localidad,
            'barrio' => $this->barrio,
            'longitud' => $this->longitud,
            'latitud' => $this->latitud,
            'capacidad_instalada' => $this->capacidad_instalada,
            'capacidad_almacenamiento' => $this->capacidad_almacenamiento,
        ]);

        $query->andFilterWhere(['like', 'tipo_servicio', $this->tipo_servicio])
            ->andFilterWhere(['like', 'direccion', $this->direccion]);

        return $dataProvider;
    }
}
