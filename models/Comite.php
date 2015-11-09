<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comite".
 *
 * @property integer $id
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $descripcion
 * @property string $tipo
 * @property integer $id_convocatoria
 * @property string $acta
 *
 * @property Convocatoria $idConvocatoria
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
        return 'cobertura.comite';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_convocatoria'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['fecha_inicio', 'fecha_fin'],'initDateBeforeEndDate'],
            [['descripcion', 'tipo', 'acta'], 'string'],
            [['id_convocatoria'], 'exist', 'skipOnError' => true, 'targetClass' => Convocatoria::className(), 'targetAttribute' => ['id_convocatoria' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'tipo' => Yii::t('app', 'Tipo'),
            'id_convocatoria' => Yii::t('app', 'Convocatoria'),
            'acta' => Yii::t('app', 'Acta'),
        ];
    }

    public function initDateBeforeEndDate($attribute, $params)
    {
        if($this->fecha_inicio>=$this->fecha_fin){
            $this->addError($attribute, 'La fecha de inicio de la convocatoria no puede ser posterior a la fecha final');
        }

    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdConvocatoria()
    {
        return $this->hasOne(Convocatoria::className(), ['id' => 'id_convocatoria']);
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
