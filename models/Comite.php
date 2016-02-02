<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comite".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $tipo
 * @property string $nombre
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $observaciones
 * @property integer $subtipo
 * @property integer $convocatoria
 *
 * @property Categoria $tipo0
 * @property Convocatoria $convocatoria0
 * @property Subcategoria $subtipo0
 * @property Faer[] $faers
 * @property Participantes[] $participantes
 * @property Proyectoxcomite[] $proyectoxcomites
 */
class Comite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comite';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'observaciones'], 'string'],
            [['tipo', 'subtipo'], 'required'],
            [['tipo', 'subtipo', 'convocatoria'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['nombre'], 'string', 'max' => 255],
            [['tipo'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['tipo' => 'id']],
            [['convocatoria'], 'exist', 'skipOnError' => true, 'targetClass' => Convocatoria::className(), 'targetAttribute' => ['convocatoria' => 'id']],
            [['subtipo'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategoria::className(), 'targetAttribute' => ['subtipo' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'tipo' => Yii::t('app', 'Tipo'),
            'nombre' => Yii::t('app', 'Nombre'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
            'observaciones' => Yii::t('app', 'Observaciones'),
            'subtipo' => Yii::t('app', 'Subtipo'),
            'convocatoria' => Yii::t('app', 'Convocatoria'),
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
    public function getConvocatoria0()
    {
        return $this->hasOne(Convocatoria::className(), ['id' => 'convocatoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubtipo0()
    {
        return $this->hasOne(Subcategoria::className(), ['id' => 'subtipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaers()
    {
        return $this->hasMany(Faer::className(), ['comite' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipantes()
    {
        return $this->hasMany(Participantes::className(), ['id_comite' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectoxcomites()
    {
        return $this->hasMany(Proyectoxcomite::className(), ['idComite' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ComiteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ComiteQuery(get_called_class());
    }
}
