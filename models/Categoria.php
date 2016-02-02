<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property Comite[] $comites
 * @property Convocatoria[] $convocatorias
 * @property Subcategoria[] $subcategorias
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 255],
            [['nombre'], 'unique'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComites()
    {
        return $this->hasMany(Comite::className(), ['tipo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConvocatorias()
    {
        return $this->hasMany(Convocatoria::className(), ['tipo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategorias()
    {
        return $this->hasMany(Subcategoria::className(), ['categoria' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CategoriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoriaQuery(get_called_class());
    }
}
