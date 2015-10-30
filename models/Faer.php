<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faer".
 *
 * @property integer $numero
 * @property string $nit_presento
 * @property integer $radicado
 * @property string $oep
 * @property string $faer_no
 * @property string $proyecto
 * @property string $nit_ejecuto
 * @property string $fecha_radicacion
 * @property string $fecha_aprobacion
 * @property integer $tipo_proyecto
 *
 * @property DetalleProyecto[] $detalleProyectos
 * @property OperadorRed $nitPresento
 * @property OperadorRed $nitEjecuto
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
            [['radicado', 'tipo_proyecto'], 'integer'],
            [['oep'], 'number'],
            [['fecha_radicacion', 'fecha_aprobacion'], 'safe'],
            [['nit_presento', 'nit_ejecuto'], 'string', 'max' => 20],
            [['faer_no'], 'string', 'max' => 12],
            [['proyecto'], 'string', 'max' => 9999],
            [['faer_no'], 'unique'],
            [['nit_presento'], 'exist', 'skipOnError' => true, 'targetClass' => OperadorRed::className(), 'targetAttribute' => ['nit_presento' => 'nit']],
            [['nit_ejecuto'], 'exist', 'skipOnError' => true, 'targetClass' => OperadorRed::className(), 'targetAttribute' => ['nit_ejecuto' => 'nit']],
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
            'radicado' => Yii::t('app', 'Radicado'),
            'oep' => Yii::t('app', 'Oep'),
            'faer_no' => Yii::t('app', 'Faer No'),
            'proyecto' => Yii::t('app', 'Proyecto'),
            'nit_ejecuto' => Yii::t('app', 'Nit Ejecuto'),
            'fecha_radicacion' => Yii::t('app', 'Fecha Radicacion'),
            'fecha_aprobacion' => Yii::t('app', 'Fecha Aprobacion'),
            'tipo_proyecto' => Yii::t('app', 'Tipo Proyecto'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleProyectos()
    {
        return $this->hasMany(DetalleProyecto::className(), ['numero' => 'numero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNitPresento()
    {
        return $this->hasOne(OperadorRed::className(), ['nit' => 'nit_presento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNitEjecuto()
    {
        return $this->hasOne(OperadorRed::className(), ['nit' => 'nit_ejecuto']);
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
