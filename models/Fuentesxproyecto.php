<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fuentesxproyecto".
 *
 * @property integer $bpin
 * @property integer $id_fuente
 * @property double $valor
 * @property integer $anio
 * @property string $observacion
 *
 * @property FuentesFinanciacion $idFuente
 */
class Fuentesxproyecto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cobertura.fuentesxproyecto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bpin'], 'required'],
            [['bpin', 'id_fuente', 'anio'], 'integer'],
            [['valor'], 'number'],
            [['observacion'], 'string'],
            [['id_fuente'], 'exist', 'skipOnError' => true, 'targetClass' => FuentesFinanciacion::className(), 'targetAttribute' => ['id_fuente' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bpin' => Yii::t('app', 'Bpin'),
            'id_fuente' => Yii::t('app', 'Id Fuente'),
            'valor' => Yii::t('app', 'Valor'),
            'anio' => Yii::t('app', 'Anio'),
            'observacion' => Yii::t('app', 'Observacion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFuente()
    {
        return $this->hasOne(FuentesFinanciacion::className(), ['id' => 'id_fuente']);
    }

    /**
     * @inheritdoc
     * @return FuentesxproyectoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FuentesxproyectoQuery(get_called_class());
    }
}
