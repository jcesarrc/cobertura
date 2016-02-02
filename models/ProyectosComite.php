<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyectos_comite".
 *
 * @property integer $id
 * @property integer $proyecto
 * @property integer $comite
 * @property string $fecha_aprobacion
 * @property string $acta_aprobacion
 * @property string $usuario_aprobo
 */
class ProyectosComite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyectos_comite';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['proyecto', 'comite'], 'integer'],
            [['fecha_aprobacion'], 'safe'],
            [['acta_aprobacion', 'usuario_aprobo'], 'string', 'max' => 255],
            [['comite'], 'exist', 'skipOnError' => true, 'targetClass' => Comite::className(), 'targetAttribute' => ['comite' => 'id']],
            [['proyecto'], 'exist', 'skipOnError' => true, 'targetClass' => Faer::className(), 'targetAttribute' => ['proyecto' => 'numero']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'proyecto' => Yii::t('app', 'Proyecto'),
            'comite' => Yii::t('app', 'Comite'),
            'fecha_aprobacion' => Yii::t('app', 'Fecha Aprobacion'),
            'acta_aprobacion' => Yii::t('app', 'Acta Aprobacion'),
            'usuario_aprobo' => Yii::t('app', 'Usuario Aprobo'),
        ];
    }

    /**
     * @inheritdoc
     * @return ProyectosComiteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProyectosComiteQuery(get_called_class());
    }
}
