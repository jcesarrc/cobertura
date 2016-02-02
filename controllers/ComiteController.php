<?php

namespace app\controllers;

use app\components\AccessRule;
use app\models\Convocatoria;
use app\models\Rol;
use app\models\Subcategoria;
use Yii;
use app\models\Comite;
use app\models\ComiteSearch;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ComiteController implements the CRUD actions for Comite model.
 */
class ComiteController extends Controller
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
     * Lists all Comite models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ComiteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comite model.
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
     * Creates a new Comite model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Comite();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Comite model.
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
     * Deletes an existing Comite model.
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
     * Finds the Comite model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comite the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comite::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSubcategorias($selected = '')
    {
        //'options' => ArrayHelper::map(PartesModelo::findAll(['TipoTramite_id'=>$model->TipoTramite_id]), 'vista', 'nombre'),
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $data = $parents[0];
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
                echo Json::encode(['output'=>$out, 'selected'=>$selected]);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);

    }


    public function actionConvocatorias($selected = '')
    {
        //'options' => ArrayHelper::map(PartesModelo::findAll(['TipoTramite_id'=>$model->TipoTramite_id]), 'vista', 'nombre'),
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $tipo = $parents[0];
                $subtipo = $parents[1];
                if($subtipo==4 || $subtipo==7){
                    $list = Convocatoria::find()->where(['tipo'=>$tipo])->asArray()->all();
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
                echo Json::encode(['output'=>$out, 'selected'=>$selected]);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);

    }
}
