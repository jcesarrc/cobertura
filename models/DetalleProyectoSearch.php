<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetalleProyecto;

/**
 * DetalleProyectoSearch represents the model behind the search form about `app\models\DetalleProyecto`.
 */
class DetalleProyectoSearch extends DetalleProyecto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_departamento', 'id_municipio', 'usuarios_nuevos', 'usuarios_existentes', 'numero'], 'integer'],
            [['descripcion_veredas'], 'safe'],
            [['latitud', 'longitud', 'total', 'aporte_fondo', 'cofinanciacion'], 'number'],
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
        $query = DetalleProyecto::find();

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
            'id_departamento' => $this->id_departamento,
            'id_municipio' => $this->id_municipio,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
            'total' => $this->total,
            'aporte_fondo' => $this->aporte_fondo,
            'cofinanciacion' => $this->cofinanciacion,
            'usuarios_nuevos' => $this->usuarios_nuevos,
            'usuarios_existentes' => $this->usuarios_existentes,
            'numero' => $this->numero,
        ]);

        $query->andFilterWhere(['like', 'descripcion_veredas', $this->descripcion_veredas]);

        return $dataProvider;
    }
}
