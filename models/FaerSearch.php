<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Faer;
use yii\helpers\ArrayHelper;

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
            //'categoria' => $this->categoria,
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

    public function searchforcomite($params)
    {

        $query = Faer::find();

        if(isset($_POST['comite']) && !empty($_POST['comite'])) {

            $comite = $_POST['comite'];

            $proyectos = ArrayHelper::getColumn(ProyectosComite::find()->where(['comite' => $comite])->asArray()->all(), 'proyecto');

            $query->where(['in', 'numero', $proyectos]);

        }

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
            //'categoria' => $this->categoria,
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


    public function searchfixed($id){


        $comite = Comite::findOne(['id'=>$id]);

        $proyectos_ya_asignados = ArrayHelper::getColumn(ProyectosComite::find()->asArray()->all(),'proyecto', false);

        $query = Faer::find()
            ->where(['categoria'=>$comite->tipo]);

        if(!empty($proyectos_ya_asignados)) {
            $query = $query->andWhere(['not in', 'numero', $proyectos_ya_asignados]);
        }

        if(strtoupper($comite->getSubtipo0()->one()->nombre) != "GENERAL"){
            $query = $query->andWhere(['subcategoria' => $comite->subtipo]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;

    }
}
