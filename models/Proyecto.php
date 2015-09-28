<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyecto".
 *
 * @property integer $bpin
 * @property string $nombre
 * @property string $descripcion
 * @property integer $departamento
 * @property integer $municipio
 * @property string $tipo_proyecto
 * @property integer $corregimiento
 * @property integer $localidad
 * @property string $direccion
 * @property double $longitud
 * @property double $latitud
 * @property double $costo_usuario
 * @property double $valor
 * @property integer $operador_red
 * @property string $fecha_asignacion
 * @property string $fecha_finalizacion
 * @property string $estado
 *
 * @property AreaCobertura[] $areaCoberturas
 * @property Divipola $departamento0
 * @property OperadorRed $operadorRed
 * @property Proyectoxcomite $proyectoxcomite
 */
class Proyecto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cobertura.proyecto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bpin'], 'required'],
            [['bpin', 'departamento', 'municipio', 'corregimiento', 'localidad', 'operador_red'], 'integer'],
            [['longitud', 'latitud', 'costo_usuario', 'valor'], 'number'],
            [['fecha_asignacion', 'fecha_finalizacion'], 'safe'],
            [['estado'], 'string'],
            [['nombre'], 'string', 'max' => 255],
            [['descripcion'], 'string', 'max' => 500],
            [['tipo_proyecto'], 'string', 'max' => 50],
            [['direccion'], 'string', 'max' => 100],
            [['departamento'], 'exist', 'skipOnError' => true, 'targetClass' => Divipola::className(), 'targetAttribute' => ['departamento' => 'id']],
            [['operador_red'], 'exist', 'skipOnError' => true, 'targetClass' => OperadorRed::className(), 'targetAttribute' => ['operador_red' => 'id_sui']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bpin' => Yii::t('app', 'Bpin'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'departamento' => Yii::t('app', 'Departamento'),
            'municipio' => Yii::t('app', 'Municipio'),
            'tipo_proyecto' => Yii::t('app', 'Tipo Proyecto'),
            'corregimiento' => Yii::t('app', 'Corregimiento'),
            'localidad' => Yii::t('app', 'Localidad'),
            'direccion' => Yii::t('app', 'Direccion'),
            'longitud' => Yii::t('app', 'Longitud'),
            'latitud' => Yii::t('app', 'Latitud'),
            'costo_usuario' => Yii::t('app', 'Costo Usuario'),
            'valor' => Yii::t('app', 'Valor'),
            'operador_red' => Yii::t('app', 'Operador Red'),
            'fecha_asignacion' => Yii::t('app', 'Fecha Asignacion'),
            'fecha_finalizacion' => Yii::t('app', 'Fecha Finalizacion'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaCoberturas()
    {
        return $this->hasMany(AreaCobertura::className(), ['bpin' => 'bpin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento0()
    {
        return $this->hasOne(Divipola::className(), ['id' => 'departamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperadorRed()
    {
        return $this->hasOne(OperadorRed::className(), ['id_sui' => 'operador_red']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectoxcomite()
    {
        return $this->hasOne(Proyectoxcomite::className(), ['bpin' => 'bpin']);
    }

    /**
     * @inheritdoc
     * @return ProyectoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProyectoQuery(get_called_class());
    }
}
