<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subtipo_proyecto".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $id_tipo
 *
 * @property TipoProyecto $idTipo
 */
class SubtipoProyecto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cobertura.subtipo_proyecto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo'], 'required'],
            [['id_tipo'], 'integer'],
            [['nombre'], 'string', 'max' => 255],
            [['id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoProyecto::className(), 'targetAttribute' => ['id_tipo' => 'id']],
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
            'id_tipo' => Yii::t('app', 'Tipo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipo()
    {
        return $this->hasOne(TipoProyecto::className(), ['id' => 'id_tipo']);
    }

    /**
     * @inheritdoc
     * @return SubtipoProyectoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SubtipoProyectoQuery(get_called_class());
    }
}
