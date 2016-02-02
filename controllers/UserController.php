<?php

namespace app\controllers;

use app\components\AccessRule;
use app\models\Rol;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;

class UserController extends Controller
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
                        ],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new User();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionHabilitar($id)
    {
        User::cambiarEstado($id);
        $this->redirect(Url::to(['/user']));
    }

    public function actionCreate()
    {

        $model = new User(['scenario' => 'creation']);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

    }

    public function actionRoles($id){

        if(isset($_POST['enviado'])){
            if(User::actualizarRoles($id, $_POST['roles']))
                Yii::$app->session->setFlash('success', 'Roles actualizados');
                $this->redirect(['/user']);
        }
        else {
            return $this->render('roles',[
                'lista_roles' => Rol::getListaRoles(),
                'roles_actuales' => Rol::getRolesId($id)
            ]);
        }

    }

}