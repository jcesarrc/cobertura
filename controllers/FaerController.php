<?php

namespace app\controllers;

use app\models\Comite;
use app\models\Convocatoria;
use app\models\DetalleProyecto;
use app\models\ProyectosComite;
use app\models\Subcategoria;
use Yii;
use app\models\Faer;
use app\models\FaerSearch;
use yii\helpers\Json;
use yii\helpers\Url;
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


    public function actionIndex2($id)
    {
        $searchModel = new FaerSearch();
        $dataProvider = $searchModel->searchfixed($id);
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $comite = Comite::findOne(['id'=>$id]);
        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'comite'=>$comite,
        ]);
    }


    public function actionIndex3()
    {
        $searchModel = new FaerSearch();
        $dataProvider = $searchModel->searchforcomite(Yii::$app->request->queryParams);

        return $this->render('index3', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionAprobar()
    {
        if(isset($_POST['id'])){

            $comite = $_POST['id'];

            if(isset($_POST['fecha'])){
                $fecha_aprobacion = $_POST['fecha'];
            }

            if(isset($_POST['acta'])){
                $acta_aprobacion = $_POST['acta'];
            }

            if(isset($_POST['selection'])){
                $proyectos[] = strtok($_POST['selection'],",");
            }

            if(!empty($proyectos)){

                foreach($proyectos as $id){

                    $pc = new ProyectosComite();
                    $pc->comite = $comite;
                    $pc->fecha_aprobacion = $fecha_aprobacion;
                    $pc->acta_aprobacion = $acta_aprobacion;
                    $pc->proyecto = $id;
                    $pc->save();

                }
            }

            Yii::$app->session->setFlash('success', 'Proyectos aprobados');
            $this->redirect(Url::to(['index2','id'=>$comite]));


        }
    }

        /**
     * Displays a single Faer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $lista_detalle_proyecto = DetalleProyecto::findAll(['numero' => $id]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'lista_detalles' => $lista_detalle_proyecto,
        ]);
    }

    /**
     * Creates a new Faer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($categoria = 0, $subcategoria = 0, $convocatoria = 0)
    {
        $model = new Faer();
        if (!isset($categoria) && $categoria == 0) $categoria = 1;
        $model->categoria = $categoria;
        if (!isset($subcategoria) && $subcategoria == 0) $subcategoria = 1;
        $model->subcategoria = $subcategoria;
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


    public function actionFileUpload()
    {

        if (empty($_FILES['attachment'])) {
            echo json_encode(['error' => 'No seleccionó ningun archivo']);
            return;
        }

        // a flag to see if everything is ok
        $success = null;

        $file = $_FILES['attachment'];

        $target = '/var/www/html/cobertura/web/files/';

        $filename = $file['name'];

        if (file_exists($target . $filename)) unlink($target . $filename);

        $success = move_uploaded_file($_FILES['attachment']['tmp_name'], $target . $filename) ? true : false;

        // check and process based on successful status
        if ($success === true) {
            $row = 1;
            if (($handle = fopen($target . $filename, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                    $c = 0;
                    $n_faer = $data[$c++];
                    if (!(Faer::find()->where(['faer_no' => $n_faer])->exists())) {
                        $model = new Faer();
                        $model->faer_no = $n_faer;
                        $model->radicado = intval($data[$c++]);
                        $model->proyecto = $data[$c++];
                        $model->nit_presento = $data[$c++];
                        $model->nit_ejecuto = $data[$c++];
                        $model->fecha_radicacion = $data[$c++];
                        $model->fecha_aprobacion = $data[$c++];
                        $model->oep = doubleval($data[$c++]);
                        $model->categoria = 3;
                        $model->subcategoria = 8;
                        $model->convocatoria = 1;
                        $numero = 0;
                        //var_dump($model);die();
                        if ($model->save()) {
                            if (Faer::find()->where(['faer_no' => $n_faer])->exists()) {
                                $tmp = Faer::findOne(['faer_no' => $n_faer]);
                                $numero = $tmp->numero;
                            }
                        } else var_dump($model->getErrors());
                    } else {
                        $c = 8;
                        $tmp = Faer::findOne(['faer_no' => $n_faer]);
                        $numero = $tmp->numero;
                    }
                    if ($numero != 0) {
                        $model_detalle = new DetalleProyecto();
                        $model_detalle->numero = $numero;
                        $model_detalle->id_departamento = intval($data[$c++]);
                        $model_detalle->id_municipio = intval($data[$c++]);
                        $model_detalle->descripcion_veredas = $data[$c++];
                        $model_detalle->latitud = doubleval($data[$c++]);
                        $model_detalle->longitud = doubleval($data[$c++]);
                        $model_detalle->total = doubleval($data[$c++]);
                        $model_detalle->cofinanciacion = doubleval($data[$c++]);
                        $model_detalle->aporte_fondo = doubleval($data[$c++]);
                        $model_detalle->usuarios_existentes = intval($data[$c++]);
                        $model_detalle->usuarios_nuevos = intval($data[$c]);
                        if (!$model_detalle->save()) {
                            var_dump($model_detalle->getErrors());
                        }
                    }
                    $row++;
                }
                fclose($handle);
            }
            //$this->redirect(['index']);
            $output = ['success' => 'Carga exitosa'];

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


    public function actionSubcategorias()
    {
        //'options' => ArrayHelper::map(PartesModelo::findAll(['TipoTramite_id'=>$model->TipoTramite_id]), 'vista', 'nombre'),
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $data = $parents[0];
                //$id_categoria = Comite::findOne(['id'=>$data])->tipo0->id;
                $list = Subcategoria::find()->where(['categoria'=>$data])->asArray()->all();
                //$out = self::getSubCatList($paso_tipotramite_id);
                //$out = ArrayHelper::map(PartesModelo::findAll(['TipoTramite_id'=>$paso_tipotramite_id]), 'vista', 'nombre');

                foreach ($list as $i => $item) {
                    $out[] = ['id' => $item['id'], 'name' => $item['nombre']];
                }

                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);

    }


    public function actionConvocatorias()
    {
        //'options' => ArrayHelper::map(PartesModelo::findAll(['TipoTramite_id'=>$model->TipoTramite_id]), 'vista', 'nombre'),
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $categoria = $parents[0];
                $subcategoria = $parents[1];
                if($subcategoria==4 || $subcategoria==7){
                    $list = Convocatoria::find()->where(['tipo'=>$categoria])->asArray()->all();
                }else $list = [];

                //$out = self::getSubCatList($paso_tipotramite_id);
                //$out = ArrayHelper::map(PartesModelo::findAll(['TipoTramite_id'=>$paso_tipotramite_id]), 'vista', 'nombre');

                foreach ($list as $i => $item) {
                    $out[] = ['id' => $item['id'], 'name' => $item['descripcion']];
                }

                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);

    }
}
