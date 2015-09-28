<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area_cobertura".
 *
 * @property integer $bpin
 * @property string $tipo_servicio
 * @property integer $departamento
 * @property integer $municipio
 * @property integer $localidad
 * @property integer $barrio
 * @property string $direccion
 * @property double $longitud
 * @property double $latitud
 * @property double $capacidad_instalada
 * @property double $capacidad_almacenamiento
 *
 * @property Divipola $departamento0
 * @property Divipola $municipio0
 * @property Divipola $localidad0
 * @property Divipola $barrio0
 * @property Proyecto $bpin0
 */
class AreaCobertura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cobertura.area_cobertura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bpin', 'departamento', 'municipio', 'localidad', 'barrio'], 'required'],
            [['bpin', 'departamento', 'municipio', 'localidad', 'barrio'], 'integer'],
            [['tipo_servicio', 'direccion'], 'string'],
            [['longitud', 'latitud', 'capacidad_instalada', 'capacidad_almacenamiento'], 'number'],
            [['departamento'], 'exist', 'skipOnError' => true, 'targetClass' => Divipola::className(), 'targetAttribute' => ['departamento' => 'id']],
            [['municipio'], 'exist', 'skipOnError' => true, 'targetClass' => Divipola::className(), 'targetAttribute' => ['municipio' => 'id']],
            [['localidad'], 'exist', 'skipOnError' => true, 'targetClass' => Divipola::className(), 'targetAttribute' => ['localidad' => 'id']],
            [['barrio'], 'exist', 'skipOnError' => true, 'targetClass' => Divipola::className(), 'targetAttribute' => ['barrio' => 'id']],
            [['bpin'], 'exist', 'skipOnError' => true, 'targetClass' => Proyecto::className(), 'targetAttribute' => ['bpin' => 'bpin']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bpin' => Yii::t('app', 'Bpin'),
            'tipo_servicio' => Yii::t('app', 'Tipo Servicio'),
            'departamento' => Yii::t('app', 'Departamento'),
            'municipio' => Yii::t('app', 'Municipio'),
            'localidad' => Yii::t('app', 'Localidad'),
            'barrio' => Yii::t('app', 'Barrio'),
            'direccion' => Yii::t('app', 'Direccion'),
            'longitud' => Yii::t('app', 'Longitud'),
            'latitud' => Yii::t('app', 'Latitud'),
            'capacidad_instalada' => Yii::t('app', 'Capacidad Instalada'),
            'capacidad_almacenamiento' => Yii::t('app', 'Capacidad Almacenamiento'),
        ];
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
    public function getMunicipio0()
    {
        return $this->hasOne(Divipola::className(), ['id' => 'municipio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalidad0()
    {
        return $this->hasOne(Divipola::className(), ['id' => 'localidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarrio0()
    {
        return $this->hasOne(Divipola::className(), ['id' => 'barrio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBpin0()
    {
        return $this->hasOne(Proyecto::className(), ['bpin' => 'bpin']);
    }

    /**
     * @inheritdoc
     * @return AreaCoberturaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AreaCoberturaQuery(get_called_class());
    }
}
