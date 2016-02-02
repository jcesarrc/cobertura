<?php

namespace app\controllers;

use app\components\AccessRule;
use app\models\Rol;
use Yii;
use app\models\Divipola;
use app\models\DivipolaSearch;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DivipolaController implements the CRUD actions for Divipola model.
 */
class DivipolaController extends Controller
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
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Divipola models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DivipolaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionChoose()
    {
        return $this->render('choose', [
            'model' => null,
        ]);
    }


    /**
     * Displays a single Divipola model.
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
     * Creates a new Divipola model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Divipola();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Divipola model.
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
     * Deletes an existing Divipola model.
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
     * Finds the Divipola model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Divipola the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Divipola::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



    public function actionLatlon($id){
        $lat = 0;
        $lon = 0;
        if(Divipola::findOne(['id'=>$id])!=null){
            $lat = Divipola::findOne(['id'=>$id])->lat;
            $lon = Divipola::findOne(['id'=>$id])->lon;
        }
        echo Json::encode(['lat'=>$lat, 'lon'=>$lon]);
    }

    public function actionCiudades()
    {
        //'options' => ArrayHelper::map(PartesModelo::findAll(['TipoTramite_id'=>$model->TipoTramite_id]), 'vista', 'nombre'),
        $out = [];

        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $data = $parents[0];
                $list = Divipola::find()->andWhere(['id_dpto'=>$data])->asArray()->all();
                //$out = self::getSubCatList($paso_tipotramite_id);
                //$out = ArrayHelper::map(PartesModelo::findAll(['TipoTramite_id'=>$paso_tipotramite_id]), 'vista', 'nombre');

                foreach ($list as $i => $item) {
                    $out[] = ['id' => $item['id'], 'name' => $item['mpio']];
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
            if (($handle = fopen($target.$filename, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {

                    $c=0;

                    $num_dpto = $data[$c++];
                    $nombre_dpto = $data[$c++];
                    $num_mpio = $data[$c++];
                    $nombre_mpio = $data[$c++];

                    if(!(Divipola::find()->where(['id_dpto'=>$num_dpto, 'id'=>$num_dpto])->exists())){
                        $model = new Divipola();
                        $model->id = $num_mpio;
                        $model->id_dpto = $num_dpto;
                        $model->dpto = $nombre_dpto;
                        $model->mpio = $nombre_mpio;
                        $model->save();
                    } else {
                        $row++;
                    }
                }
                fclose($handle);
            }
            //$this->redirect(['index']);
            $output = ['success'=>'Carga exitosa'];

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
}
