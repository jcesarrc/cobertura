<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subcategoria".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $categoria
 *
 * @property Comite[] $comites
 * @property Faer[] $faers
 * @property Categoria $categoria0
 */
class Subcategoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subcategoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'categoria'], 'required'],
            [['categoria'], 'integer'],
            [['nombre'], 'string', 'max' => 255],
            [['categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria' => 'id']],
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
            'categoria' => Yii::t('app', 'Categoria'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComites()
    {
        return $this->hasMany(Comite::className(), ['subtipo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaers()
    {
        return $this->hasMany(Faer::className(), ['subcategoria' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria0()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria']);
    }

    /**
     * @inheritdoc
     * @return SubcategoriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SubcategoriaQuery(get_called_class());
    }
}
