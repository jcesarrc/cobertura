<?php

namespace app\controllers;

use app\models\Comite;
use app\models\Faer;
use Yii;
use app\models\ProyectosComite;
use app\models\ProyectosComiteSearch;
use yii\data\ArrayDataProvider;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProyectosComiteController implements the CRUD actions for ProyectosComite model.
 */
class ProyectosComiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProyectosComite models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new ProyectosComiteSearch();
        $dataProvider = $searchModel->searchfixed($id);
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionSinAprobar($id){

        $comite = Comite::findOne(['id'=>$id]);

        $proyectos = Faer::find()
            ->where(['categoria'=>$comite->tipo]);

        if(strtoupper($comite->getSubtipo0()->one()->nombre) != "GENERAL"){
            $proyectos = $proyectos->andWhere(['subcategoria' => $comite->subtipo]);
        }

        $proyectos = $proyectos->all();

        $html = $this->renderAjax('_por_aprobar',[
            'proyectos'=>$proyectos
        ]);

        return Json::encode($html);
    }

    /**
     * Displays a single ProyectosComite model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProyectosComite model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProyectosComite();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProyectosComite model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProyectosComite model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProyectosComite model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProyectosComite the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProyectosComite::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
