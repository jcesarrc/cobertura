<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Participantes;

/**
 * ParticipantesSearch represents the model behind the search form about `app\models\Participantes`.
 */
class ParticipantesSearch extends Participantes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['documento', 'tipo_documento', 'nombres', 'apellidos', 'nombre_entidad', 'nit_entidad', 'cargo', 'correo'], 'safe'],
            [['telefono', 'id_comite'], 'integer'],
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
        $query = Participantes::find();

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
            'telefono' => $this->telefono,
            'id_comite' => $this->id_comite,
        ]);

        $query->andFilterWhere(['like', 'documento', $this->documento])
            ->andFilterWhere(['like', 'tipo_documento', $this->tipo_documento])
            ->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'nombre_entidad', $this->nombre_entidad])
            ->andFilterWhere(['like', 'nit_entidad', $this->nit_entidad])
            ->andFilterWhere(['like', 'cargo', $this->cargo])
            ->andFilterWhere(['like', 'correo', $this->correo]);

        return $dataProvider;
    }
}
