<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_proyecto".
 *
 * @property integer $id
 * @property integer $id_departamento
 * @property integer $id_municipio
 * @property string $descripcion_veredas
 * @property string $latitud
 * @property string $longitud
 * @property string $total
 * @property string $aporte_fondo
 * @property string $cofinanciacion
 * @property integer $usuarios_nuevos
 * @property integer $usuarios_existentes
 * @property integer $numero
 *
 * @property Faer $numero0
 */
class DetalleProyecto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_proyecto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_departamento', 'id_municipio', 'latitud', 'longitud', 'total'], 'required'],
            [['id_departamento', 'id_municipio', 'usuarios_nuevos', 'usuarios_existentes', 'numero'], 'integer'],
            [['latitud', 'longitud', 'total', 'aporte_fondo', 'cofinanciacion'], 'number'],
            [['descripcion_veredas'], 'string', 'max' => 9999],
            [['numero'], 'exist', 'skipOnError' => true, 'targetClass' => Faer::className(), 'targetAttribute' => ['numero' => 'numero']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_departamento' => Yii::t('app', 'Departamento'),
            'id_municipio' => Yii::t('app', 'Municipio'),
            'descripcion_veredas' => Yii::t('app', 'Veredas'),
            'latitud' => Yii::t('app', 'Latitud'),
            'longitud' => Yii::t('app', 'Longitud'),
            'total' => Yii::t('app', 'Total'),
            'aporte_fondo' => Yii::t('app', 'Aporte Fondo'),
            'cofinanciacion' => Yii::t('app', 'Cofinanciación'),
            'usuarios_nuevos' => Yii::t('app', 'Usuarios Nuevos'),
            'usuarios_existentes' => Yii::t('app', 'Usuarios Existentes'),
            'numero' => Yii::t('app', 'Número'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNumero0()
    {
        return $this->hasOne(Faer::className(), ['numero' => 'numero']);
    }

    /**
     * @inheritdoc
     * @return DetalleProyectoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DetalleProyectoQuery(get_called_class());
    }
}
