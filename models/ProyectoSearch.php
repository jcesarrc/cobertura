<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Proyecto;

/**
 * ProyectoSearch represents the model behind the search form about `app\models\Proyecto`.
 */
class ProyectoSearch extends Proyecto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bpin', 'departamento', 'municipio', 'corregimiento', 'localidad', 'operador_red'], 'integer'],
            [['nombre', 'descripcion', 'tipo_proyecto', 'direccion', 'fecha_asignacion', 'fecha_finalizacion', 'estado'], 'safe'],
            [['longitud', 'latitud', 'costo_usuario', 'valor'], 'number'],
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
        $query = Proyecto::find();

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
            'corregimiento' => $this->corregimiento,
            'localidad' => $this->localidad,
            'longitud' => $this->longitud,
            'latitud' => $this->latitud,
            'costo_usuario' => $this->costo_usuario,
            'valor' => $this->valor,
            'operador_red' => $this->operador_red,
            'fecha_asignacion' => $this->fecha_asignacion,
            'fecha_finalizacion' => $this->fecha_finalizacion,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'tipo_proyecto', $this->tipo_proyecto])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
