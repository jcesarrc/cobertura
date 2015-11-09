<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "convocatoria".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $requisitos
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $tipo
 *
 * @property Comite[] $comites
 */
class Convocatoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cobertura.convocatoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'fecha_inicio', 'tipo'], 'required'],
            [['fecha_inicio', 'fecha_fin'],'initDateBeforeEndDate'],
            [['nombre', 'descripcion', 'requisitos', 'fecha_fin', 'tipo'], 'string'],
            [['fecha_inicio'], 'safe'],
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
            'descripcion' => Yii::t('app', 'Descripción'),
            'requisitos' => Yii::t('app', 'Requisitos'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
            'tipo' => Yii::t('app', 'Tipo'),
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
    public function getComites()
    {
        return $this->hasMany(Comite::className(), ['id_convocatoria' => 'id']);
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
