<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faer".
 *
 * @property integer $numero
 * @property string $nit_presento
 * @property string $valor_total
 * @property string $solicitud_faer
 * @property integer $tipo_proyecto
 * @property string $valor_usuario
 * @property integer $radicado
 * @property string $cup
 * @property string $cob
 * @property string $nbi
 * @property string $un
 * @property string $oep
 * @property string $faer_no
 * @property string $proyecto
 * @property string $nit_ejecuto
 * @property integer $departamento
 * @property integer $municipio
 * @property string $latitud
 * @property string $longitud
 * @property string $fecha_radicacion
 * @property string $fecha_aprobacion
 * @property string $fecha_ajuste
 * @property integer $usuarios_mejoramiento
 * @property string $cofinanciacion
 */
class Faer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cobertura.faer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['faer_no','proyecto','nit_presento','fecha_radicacion'],'required'],
            [['oep'], 'number'],
            [['radicado','tipo_proyecto'], 'integer'],
            [['fecha_radicacion', 'fecha_aprobacion'], 'safe'],
            [['nit_presento', 'nit_ejecuto'], 'string', 'max' => 20],
            [['faer_no'], 'string', 'max' => 12],
            [['proyecto'], 'string', 'max' => 500],
            [['faer_no'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'numero' => Yii::t('app', 'Numero'),
            'faer_no' => Yii::t('app', 'Faer No'),
            'radicado' => Yii::t('app', 'Radicado'),
            'proyecto' => Yii::t('app', 'Proyecto'),
            'nit_presento' => Yii::t('app', 'Nit Presento'),
            'nit_ejecuto' => Yii::t('app', 'Nit Ejecuto'),
            'fecha_radicacion' => Yii::t('app', 'Fecha Presentacion'),
            'fecha_aprobacion' => Yii::t('app', 'Fecha Aprobacion'),
            'oep' => Yii::t('app', 'Oep'),
            'tipo_proyecto' => Yii::t('app', 'Tipo Proyecto'),
        ];
    }

    /**
     * @inheritdoc
     * @return FaerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FaerQuery(get_called_class());
    }
}
