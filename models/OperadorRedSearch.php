<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OperadorRed;

/**
 * OperadorRedSearch represents the model behind the search form about `app\models\OperadorRed`.
 */
class OperadorRedSearch extends OperadorRed
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sui', 'nit', 'telefono', 'celular'], 'integer'],
            [['razon_social', 'represetante_legal', 'revisor_fiscal', 'contador', 'direccion', 'correo', 'direccion_web'], 'safe'],
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
        $query = OperadorRed::find();

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
            'id_sui' => $this->id_sui,
            'nit' => $this->nit,
            'telefono' => $this->telefono,
            'celular' => $this->celular,
        ]);

        $query->andFilterWhere(['like', 'razon_social', $this->razon_social])
            ->andFilterWhere(['like', 'represetante_legal', $this->represetante_legal])
            ->andFilterWhere(['like', 'revisor_fiscal', $this->revisor_fiscal])
            ->andFilterWhere(['like', 'contador', $this->contador])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'direccion_web', $this->direccion_web]);

        return $dataProvider;
    }
}
