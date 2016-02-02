<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "convocatoria".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $tipo
 * @property boolean $activa
 *
 * @property Categoria $tipo0
 * @property Faer[] $faers
 */
class Convocatoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'convocatoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'fecha_inicio', 'fecha_fin'], 'required'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['tipo'], 'integer'],
            [['activa'], 'boolean'],
            [['nombre', 'descripcion'], 'string', 'max' => 255],
            [['tipo'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['tipo' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
            'tipo' => Yii::t('app', 'Tipo'),
            'activa' => Yii::t('app', 'Activa'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo0()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'tipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaers()
    {
        return $this->hasMany(Faer::className(), ['convocatoria' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ConvocatoriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConvocatoriaQuery(get_called_class());
    }
}
