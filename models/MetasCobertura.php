<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "metas_cobertura".
 *
 * @property integer $id
 * @property integer $categoria
 * @property integer $ano
 * @property integer $cobertura
 */
class MetasCobertura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'metas_cobertura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoria', 'ano'], 'required'],
            [['categoria', 'ano', 'cobertura'], 'integer'],
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
            'categoria' => Yii::t('app', 'Categoria'),
            'ano' => Yii::t('app', 'Año'),
            'cobertura' => Yii::t('app', 'Numero de beneficiarios'),
        ];
    }

    /**
     * @inheritdoc
     * @return MetasCoberturaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MetasCoberturaQuery(get_called_class());
    }
}
