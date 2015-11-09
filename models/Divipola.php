<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "divipola".
 *
 * @property integer $id
 * @property integer $id_dpto
 * @property string $dpto
 * @property string $mpio
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
            [['id','id_dpto'], 'required'],
            [['id','id_dpto'], 'integer'],
            [['dpto', 'mpio'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Cod Mpio'),
            'id_dpto' => Yii::t('app', 'Cod Dpto'),
            'dpto' => Yii::t('app', 'Departamento'),
            'mpio' => Yii::t('app', 'Municipio'),
        ];
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
