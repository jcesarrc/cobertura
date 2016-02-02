<?php

namespace app\controllers;

use app\models\Comite;
use app\models\Convocatoria;
use app\models\DetalleProyecto;
use app\models\Divipola;
use app\models\Reportes;
use app\models\Subcategoria;
use Yii;
use app\models\Faer;
use app\models\FaerSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FaerController implements the CRUD actions for Faer model.
 */
class ReportesController extends Controller
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

    public function actionBeneficiadosPorDepartamento()
    {

        $vars = [];
        $series_beneficiarios[0]['name'] = "  ";
        $series_beneficiarios[0]['y'] = 1;

        $series_fondos[0]['name'] = "  ";
        $series_fondos[0]['y'] = 1;

        if (isset($_POST) && !empty($_POST)) {


            if (isset($_POST['ano'])) {

                $vars['ano'] = $_POST['ano'];

            }

            if (isset($_POST['categoria']) && !empty($_POST['categoria'])) {

                $vars['categoria'] = $_POST['categoria'];

                if (isset($_POST['subcategoria']) && !empty($_POST['subcategoria'])) {

                    $vars['subcategoria'] = $_POST['subcategoria'];

                    if (isset($_POST['convocatoria']) && !empty($_POST['convocatoria'])) {

                        $vars['convocatoria'] = $_POST['convocatoria'];

                    }

                }

            }
            $series_beneficiarios = Reportes::crearArrayDatosBeneficiarios($vars);
            $series_fondos = Reportes::crearArrayDatosFondos($vars);
        }

        $parametros['ano'] = empty($vars['ano'])?0:$vars['ano'];
        $parametros['categoria'] = empty($vars['categoria'])?0:$vars['categoria'];
        $parametros['subcategoria'] = empty($vars['subcategoria'])?'':$vars['subcategoria'];
        $parametros['convocatoria'] = empty($vars['convocatoria'])?'':$vars['convocatoria'];

        return $this->render('canvas_reportes_pie', [
            'series_beneficiarios' => $series_beneficiarios,
            'series_fondos' => $series_fondos,
            'parametros' => $parametros,
        ]);

    }

    public function actionCanvasMetas()
    {


        $tipo_proyecto = 1; //VIA TARIFA
        $series_creg = Reportes::crearArrayMetas($tipo_proyecto);
        $metas_creg = Reportes::consultarMetas($tipo_proyecto);

        $tipo_proyecto = 2; //FAER
        $series_faer = Reportes::crearArrayMetas($tipo_proyecto);
        $metas_faer = Reportes::consultarMetas($tipo_proyecto);


        $tipo_proyecto = 3; //FAZNI
        $series_fazni = Reportes::crearArrayMetas($tipo_proyecto);
        $metas_fazni = Reportes::consultarMetas($tipo_proyecto);


        return $this->render('canvas_metas', [
            'series_creg' => $series_creg,
            'metas_creg' => $metas_creg,

            'series_faer' => $series_faer,
            'metas_faer' => $metas_faer,

            'series_fazni' => $series_fazni,
            'metas_fazni' => $metas_fazni,
        ]);

    }

}
