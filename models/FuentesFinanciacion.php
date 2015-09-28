<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fuentesFinanciacion".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Fuentesxproyecto[] $fuentesxproyectos
 */
class FuentesFinanciacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cobertura.fuentesFinanciacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuentesxproyectos()
    {
        return $this->hasMany(Fuentesxproyecto::className(), ['id_fuente' => 'id']);
    }

    /**
     * @inheritdoc
     * @return FuentesFinanciacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FuentesFinanciacionQuery(get_called_class());
    }
}
