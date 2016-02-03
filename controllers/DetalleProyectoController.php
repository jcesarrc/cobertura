<?php

namespace app\controllers;

use app\components\AccessRule;
use app\models\Rol;
use Yii;
use app\models\Faer;
use app\models\DetalleProyecto;
use app\models\DetalleProyectoSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetalleProyectoController implements the CRUD actions for DetalleProyecto model.
 */
class DetalleProyectoController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                // We will override the default rule config with the new AccessRule class
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => ['index','create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index','create', 'update', 'delete'],
                        'allow' => true,
                        // Allow users:
                        'roles' => [
                            Rol::ROLE_SUPER,
                            Rol::ROLE_ADMIN,
                            Rol::ROLE_PROYECTOS
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all DetalleProyecto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetalleProyectoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DetalleProyecto model.
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
     * Creates a new DetalleProyecto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($numero)
    {
        $model = new DetalleProyecto();
        $model->numero = $numero;
        $model->aporte_fondo = $model->total - $model->cofinanciacion;

        $model_faer = Faer::findOne(['numero'=>$numero]);

        $lista_detalle_proyecto = DetalleProyecto::findAll(['numero'=>$numero]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model = new DetalleProyecto();
            $model->numero = $numero;
            $model->aporte_fondo = $model->total - $model->cofinanciacion;
            $this->refresh();
        }

        return $this->render('create', [
            'model' => $model,
            'model_faer' => $model_faer,
            'lista_detalles' => $lista_detalle_proyecto
        ]);

    }

    /**
     * Updates an existing DetalleProyecto model.
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
     * Deletes an existing DetalleProyecto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id, $numero)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['create', 'numero'=>$numero]);
    }


     public function actionDeleteAndReturn($id, $numero)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['create','numero'=>$numero]);
    }

    /**
     * Finds the DetalleProyecto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DetalleProyecto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DetalleProyecto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
