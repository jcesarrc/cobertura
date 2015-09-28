<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_proyecto".
 *
 * @property integer $id
 * @property string $nombre
 */
class TipoProyecto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cobertura.tipo_proyecto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 255],
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
     * @inheritdoc
     * @return TipoProyectoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipoProyectoQuery(get_called_class());
    }
}
