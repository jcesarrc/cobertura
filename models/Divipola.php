<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "divipola".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $tipo
 * @property string $padre
 *
 * @property AreaCobertura[] $areaCoberturas
 * @property AreaCobertura[] $areaCoberturas0
 * @property AreaCobertura[] $areaCoberturas1
 * @property AreaCobertura[] $areaCoberturas2
 * @property Proyecto[] $proyectos
 */
class Divipola extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cobertura.divipola';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['nombre', 'tipo', 'padre'], 'string'],
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
            'tipo' => Yii::t('app', 'Tipo'),
            'padre' => Yii::t('app', 'Padre'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaCoberturas()
    {
        return $this->hasMany(AreaCobertura::className(), ['departamento' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaCoberturas0()
    {
        return $this->hasMany(AreaCobertura::className(), ['municipio' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaCoberturas1()
    {
        return $this->hasMany(AreaCobertura::className(), ['localidad' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaCoberturas2()
    {
        return $this->hasMany(AreaCobertura::className(), ['barrio' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectos()
    {
        return $this->hasMany(Proyecto::className(), ['departamento' => 'id']);
    }

    /**
     * @inheritdoc
     * @return DivipolaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DivipolaQuery(get_called_class());
    }
}
