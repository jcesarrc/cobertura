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
 * @property integer $subcategoria
 * @property integer $convocatoria
 * @property integer $categoria
 *
 * @property DetalleProyecto[] $detalleProyectos
 * @property Categoria $categoria0
 * @property Convocatoria $convocatoria0
 * @property Subcategoria $subcategoria0
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
        return 'faer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subcategoria', 'convocatoria', 'categoria', 'proyecto', 'faer_no', 'nit_presento', 'nit_ejecuto', 'fecha_radicacion', 'fecha_aprobacion'], 'required'],
            [['radicado','subcategoria', 'convocatoria', 'categoria'], 'integer'],
            [['oep'], 'number'],
            [['fecha_radicacion', 'fecha_aprobacion'], 'safe'],
            [['nit_presento', 'nit_ejecuto'], 'string', 'max' => 20],
            [['faer_no'], 'string', 'max' => 12],
            [['proyecto'], 'string', 'max' => 9999],
            [['faer_no'], 'unique'],
            [['nit_presento'], 'exist', 'skipOnError' => true, 'targetClass' => OperadorRed::className(), 'targetAttribute' => ['nit_presento' => 'nit']],
            [['nit_ejecuto'], 'exist', 'skipOnError' => true, 'targetClass' => OperadorRed::className(), 'targetAttribute' => ['nit_ejecuto' => 'nit']],
            [['categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria' => 'id']],
            [['convocatoria'], 'exist', 'skipOnError' => true, 'targetClass' => Convocatoria::className(), 'targetAttribute' => ['convocatoria' => 'id']],
            [['subcategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategoria::className(), 'targetAttribute' => ['subcategoria' => 'id']],
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
            'faer_no' => Yii::t('app', 'No de Proyecto'),
            'proyecto' => Yii::t('app', 'Proyecto'),
            'nit_ejecuto' => Yii::t('app', 'Nit Ejecuto'),
            'fecha_radicacion' => Yii::t('app', 'Fecha Radicacion'),
            'fecha_aprobacion' => Yii::t('app', 'Fecha Aprobacion'),
            'subcategoria' => Yii::t('app', 'Subcategoria'),
            'convocatoria' => Yii::t('app', 'Convocatoria'),
            'categoria' => Yii::t('app', 'Categoria'),
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
    public function getCategoria0()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConvocatoria0()
    {
        return $this->hasOne(Convocatoria::className(), ['id' => 'convocatoria']);
    }

    public function getSubcategoria0()
    {
        return $this->hasOne(Subcategoria::className(), ['id' => 'subcategoria']);
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


    public function consultarProyectosSinAprobar($id_comite){



    }
}
