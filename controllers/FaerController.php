<?php

namespace app\controllers;

use app\models\DetalleProyecto;
use Yii;
use app\models\Faer;
use app\models\FaerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FaerController implements the CRUD actions for Faer model.
 */
class FaerController extends Controller
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
     * Lists all Faer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FaerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Faer model.
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
     * Creates a new Faer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($tipo_proyecto=0)
    {
        $model = new Faer();
        if(!isset($tipo_proyecto)&&$tipo_proyecto==0) $tipo_proyecto = 1;
        $model->tipo_proyecto=$tipo_proyecto;
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/detalle-proyecto/create', 'numero' => $model->numero]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Faer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->numero]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionChoose()
    {
        return $this->render('choose', [
            'model' => null,
        ]);
    }


    public function actionFileUpload(){

        if (empty($_FILES['attachment'])) {
            echo json_encode(['error' => 'No seleccionó ningun archivo']);
            return;
        }

        // a flag to see if everything is ok
        $success = null;

        $file = $_FILES['attachment'];

        $target = '/var/www/html/cobertura/web/files/';

        $filename = $file['name'];

        if(file_exists($target.$filename)) unlink($target.$filename);

        $success = move_uploaded_file($_FILES['attachment']['tmp_name'], $target.$filename) ? true : false;

        // check and process based on successful status
        if ($success === true) {
            $row = 1;
            $numero_faer = 0;
            $numero = 0;
            if (($handle = fopen($target.$filename, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    $c=0;
                    $no_faer = $data[$c++];
                    $tmp = Faer::find()->where(['faer_no'=>$no_faer]);
                    if(!$tmp->exists()){
                        $model = new Faer();
                        $model->faer_no = $no_faer;
                        $model->radicado = $data[$c++];
                        $model->proyecto = $data[$c++];
                        $model->nit_presento = $data[$c++];
                        $model->nit_ejecuto = $data[$c++];
                        $model->fecha_radicacion = $data[$c++];
                        $model->fecha_aprobacion = $data[$c++];
                        $model->oep = $data[$c++];
                        $model->save();
                        $numero = $model->numero;
                        if($numero==null){
                            $tmp = Faer::findOne(['faer_no'=>$no_faer]);
                            $numero = $tmp->numero;
                        }
                    } else {
                        $c = 8;
                        $tmp = Faer::findOne(['faer_no'=>$no_faer]);
                        $numero = $tmp->numero;
                    }
                    if($numero!=0){
                        $model_detalle = new DetalleProyecto();
                        $model_detalle->numero = $numero;
                        $model_detalle->id_departamento = $data[$c++];
                        $model_detalle->id_municipio = $data[$c++];
                        $model_detalle->descripcion_veredas = $data[$c++];
                        $model_detalle->latitud = $data[$c++];
                        $model_detalle->longitud = $data[$c++];
                        $model_detalle->total = $data[$c++];
                        $model_detalle->cofinanciacion = $data[$c++];
                        $model_detalle->aporte_fondo = $data[$c++];
                        $model_detalle->usuarios_existentes = $data[$c++];
                        $model_detalle->usuarios_nuevos = $data[$c++];
                        $model_detalle->save();
                    }
                    $row++;
                }
                fclose($handle);
            }
            //$this->redirect(['index']);
            $output = ['error'=>'Carga exitosa'];

        } elseif ($success === false) {
            $output = ['error' => 'Error subiendo archivo'];
            // delete any uploaded files
            //unlink($file);
        } else {
            $output = ['error' => 'No se procesó el archivo'];
        }

        // return a json encoded response for plugin to process successfully
        echo json_encode($output);

    }

    /**
     * Deletes an existing Faer model.
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
     * Finds the Faer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Faer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Faer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
