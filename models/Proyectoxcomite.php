<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyectoxcomite".
 *
 * @property integer $bpin
 * @property integer $idComite
 * @property string $fecha
 * @property double $valor_aprobado
 * @property string $acta_aprobacion
 *
 * @property Comite $idComite0
 * @property Proyecto $bpin0
 */
class Proyectoxcomite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cobertura.proyectoxcomite';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bpin'], 'required'],
            [['bpin', 'idComite'], 'integer'],
            [['fecha'], 'safe'],
            [['valor_aprobado'], 'number'],
            [['acta_aprobacion'], 'string'],
            [['idComite'], 'exist', 'skipOnError' => true, 'targetClass' => Comite::className(), 'targetAttribute' => ['idComite' => 'id']],
            [['bpin'], 'exist', 'skipOnError' => true, 'targetClass' => Proyecto::className(), 'targetAttribute' => ['bpin' => 'bpin']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bpin' => Yii::t('app', 'Bpin'),
            'idComite' => Yii::t('app', 'Id Comite'),
            'fecha' => Yii::t('app', 'Fecha'),
            'valor_aprobado' => Yii::t('app', 'Valor Aprobado'),
            'acta_aprobacion' => Yii::t('app', 'Acta Aprobacion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdComite0()
    {
        return $this->hasOne(Comite::className(), ['id' => 'idComite']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBpin0()
    {
        return $this->hasOne(Proyecto::className(), ['bpin' => 'bpin']);
    }

    /**
     * @inheritdoc
     * @return ProyectoxcomiteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProyectoxcomiteQuery(get_called_class());
    }
}
