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
 * @property integer $usuarios_ampliacion
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
 * @property string $fecha_presentacion
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
            [['valor_total', 'solicitud_faer', 'valor_usuario', 'cup', 'cob', 'nbi', 'un', 'oep', 'latitud', 'longitud', 'cofinanciacion'], 'number'],
            [['usuarios_ampliacion', 'radicado', 'departamento', 'municipio', 'usuarios_mejoramiento'], 'integer'],
            [['fecha_presentacion', 'fecha_aprobacion', 'fecha_ajuste'], 'safe'],
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
            'nit_presento' => Yii::t('app', 'Nit Presento'),
            'valor_total' => Yii::t('app', 'Valor Total'),
            'solicitud_faer' => Yii::t('app', 'Solicitud Faer'),
            'usuarios_ampliacion' => Yii::t('app', 'Usuarios Ampliacion'),
            'valor_usuario' => Yii::t('app', 'Valor Usuario'),
            'radicado' => Yii::t('app', 'Radicado'),
            'cup' => Yii::t('app', 'Cup'),
            'cob' => Yii::t('app', 'Cob'),
            'nbi' => Yii::t('app', 'Nbi'),
            'un' => Yii::t('app', 'Un'),
            'oep' => Yii::t('app', 'Oep'),
            'faer_no' => Yii::t('app', 'Faer No'),
            'proyecto' => Yii::t('app', 'Proyecto'),
            'nit_ejecuto' => Yii::t('app', 'Nit Ejecuto'),
            'departamento' => Yii::t('app', 'Departamento'),
            'municipio' => Yii::t('app', 'Municipio'),
            'latitud' => Yii::t('app', 'Latitud'),
            'longitud' => Yii::t('app', 'Longitud'),
            'fecha_presentacion' => Yii::t('app', 'Fecha Presentacion'),
            'fecha_aprobacion' => Yii::t('app', 'Fecha Aprobacion'),
            'fecha_ajuste' => Yii::t('app', 'Fecha Ajuste'),
            'usuarios_mejoramiento' => Yii::t('app', 'Usuarios Mejoramiento'),
            'cofinanciacion' => Yii::t('app', 'Cofinanciacion'),
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
