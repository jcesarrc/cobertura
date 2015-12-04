<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operadorRed".
 *
 * @property integer $id_sui
 * @property integer $nit
 * @property string $razon_social
 * @property string $represetante_legal
 * @property string $revisor_fiscal
 * @property string $contador
 * @property string $direccion
 * @property integer $telefono
 * @property integer $celular
 * @property string $correo
 * @property string $direccion_web
 *
 * @property Proyecto[] $proyectos
 */
class OperadorRed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cobertura.operadorRed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sui'], 'required'],
            [['id_sui', 'telefono', 'celular'], 'integer'],
            [['razon_social', 'contador', 'direccion', 'nit'], 'string'],
            [['represetante_legal', 'revisor_fiscal', 'direccion_web'], 'string', 'max' => 255],
            [['correo'], 'string', 'max' => 100],
            [['nit'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sui' => Yii::t('app', 'ID SUI'),
            'nit' => Yii::t('app', 'NIT'),
            'razon_social' => Yii::t('app', 'Razón Social'),
            'represetante_legal' => Yii::t('app', 'Representante Legal'),
            'revisor_fiscal' => Yii::t('app', 'Revisor Fiscal'),
            'contador' => Yii::t('app', 'Contador'),
            'direccion' => Yii::t('app', 'Dirección'),
            'telefono' => Yii::t('app', 'Télefono'),
            'celular' => Yii::t('app', 'Celular'),
            'correo' => Yii::t('app', 'Correo'),
            'direccion_web' => Yii::t('app', 'Dirección Web'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectos()
    {
        return $this->hasMany(Proyecto::className(), ['operador_red' => 'id_sui']);
    }

    /**
     * @inheritdoc
     * @return OperadorRedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OperadorRedQuery(get_called_class());
    }
}
