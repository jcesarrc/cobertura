<?php

namespace app\controllers;

use Yii;
use app\models\Participantes;
use app\models\ParticipantesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ParticipantesController implements the CRUD actions for Participantes model.
 */
class ParticipantesController extends Controller
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
     * Lists all Participantes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ParticipantesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Participantes model.
     * @param string $documento
     * @param integer $id_comite
     * @return mixed
     */
    public function actionView($documento, $id_comite)
    {
        return $this->render('view', [
            'model' => $this->findModel($documento, $id_comite),
        ]);
    }

    /**
     * Creates a new Participantes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_comite)
    {
        $model = new Participantes();
        $model->id_comite = $id_comite;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'documento' => $model->documento, 'id_comite' => $model->id_comite]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Participantes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $documento
     * @param integer $id_comite
     * @return mixed
     */
    public function actionUpdate($documento, $id_comite)
    {
        $model = $this->findModel($documento, $id_comite);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'documento' => $model->documento, 'id_comite' => $model->id_comite]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Participantes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $documento
     * @param integer $id_comite
     * @return mixed
     */
    public function actionDelete($documento, $id_comite)
    {
        $this->findModel($documento, $id_comite)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Participantes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $documento
     * @param integer $id_comite
     * @return Participantes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($documento, $id_comite)
    {
        if (($model = Participantes::findOne(['documento' => $documento, 'id_comite' => $id_comite])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
