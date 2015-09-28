<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "participantes".
 *
 * @property string $documento
 * @property string $tipo_documento
 * @property string $nombres
 * @property string $apellidos
 * @property string $nombre_entidad
 * @property string $nit_entidad
 * @property string $cargo
 * @property integer $telefono
 * @property string $correo
 * @property integer $id_comite
 *
 * @property Comite $idComite
 */
class Participantes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cobertura.participantes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['documento', 'id_comite'], 'required'],
            [['tipo_documento', 'nombres', 'apellidos', 'nombre_entidad', 'nit_entidad', 'cargo', 'correo'], 'string'],
            [['telefono', 'id_comite'], 'integer'],
            [['documento'], 'string', 'max' => 30],
            [['id_comite'], 'exist', 'skipOnError' => true, 'targetClass' => Comite::className(), 'targetAttribute' => ['id_comite' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'documento' => Yii::t('app', 'Documento'),
            'tipo_documento' => Yii::t('app', 'Tipo Documento'),
            'nombres' => Yii::t('app', 'Nombres'),
            'apellidos' => Yii::t('app', 'Apellidos'),
            'nombre_entidad' => Yii::t('app', 'Nombre Entidad'),
            'nit_entidad' => Yii::t('app', 'Nit Entidad'),
            'cargo' => Yii::t('app', 'Cargo'),
            'telefono' => Yii::t('app', 'Telefono'),
            'correo' => Yii::t('app', 'Correo'),
            'id_comite' => Yii::t('app', 'Id Comite'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdComite()
    {
        return $this->hasOne(Comite::className(), ['id' => 'id_comite']);
    }

    /**
     * @inheritdoc
     * @return ParticipantesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ParticipantesQuery(get_called_class());
    }
}
