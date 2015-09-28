<?php

namespace app\controllers;

use Yii;
use app\models\AreaCobertura;
use app\models\AreaCoberturaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AreaCoberturaController implements the CRUD actions for AreaCobertura model.
 */
class AreaCoberturaController extends Controller
{
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
     * Lists all AreaCobertura models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AreaCoberturaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AreaCobertura model.
     * @param integer $bpin
     * @param integer $departamento
     * @param integer $municipio
     * @param integer $localidad
     * @param integer $barrio
     * @return mixed
     */
    public function actionView($bpin, $departamento, $municipio, $localidad, $barrio)
    {
        return $this->render('view', [
            'model' => $this->findModel($bpin, $departamento, $municipio, $localidad, $barrio),
        ]);
    }

    /**
     * Creates a new AreaCobertura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AreaCobertura();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'bpin' => $model->bpin, 'departamento' => $model->departamento, 'municipio' => $model->municipio, 'localidad' => $model->localidad, 'barrio' => $model->barrio]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AreaCobertura model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $bpin
     * @param integer $departamento
     * @param integer $municipio
     * @param integer $localidad
     * @param integer $barrio
     * @return mixed
     */
    public function actionUpdate($bpin, $departamento, $municipio, $localidad, $barrio)
    {
        $model = $this->findModel($bpin, $departamento, $municipio, $localidad, $barrio);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'bpin' => $model->bpin, 'departamento' => $model->departamento, 'municipio' => $model->municipio, 'localidad' => $model->localidad, 'barrio' => $model->barrio]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AreaCobertura model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $bpin
     * @param integer $departamento
     * @param integer $municipio
     * @param integer $localidad
     * @param integer $barrio
     * @return mixed
     */
    public function actionDelete($bpin, $departamento, $municipio, $localidad, $barrio)
    {
        $this->findModel($bpin, $departamento, $municipio, $localidad, $barrio)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AreaCobertura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $bpin
     * @param integer $departamento
     * @param integer $municipio
     * @param integer $localidad
     * @param integer $barrio
     * @return AreaCobertura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($bpin, $departamento, $municipio, $localidad, $barrio)
    {
        if (($model = AreaCobertura::findOne(['bpin' => $bpin, 'departamento' => $departamento, 'municipio' => $municipio, 'localidad' => $localidad, 'barrio' => $barrio])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
