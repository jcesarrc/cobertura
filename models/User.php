<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    public function rules()
    {
        return [
            [['username'], 'required', 'on' => 'creation'],
            [['username'], 'unique', 'on' => 'creation'],
            [['username'], 'existeEnLdap', 'on' => 'creation'],
            [['username'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return parent::scenarios();
    }


    public function existeEnLdap($attribute, $params)
    {
        if (!(Ldap::getInstance()->search($this->username) >= 1)) {
            $this->addError($attribute, "El usuario no fue encontrado en el LDAP");
        }
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accesstoken' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param  string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::find()->where(['username' => $username])->one();
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authkey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authkey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        if ($r = Ldap::getInstance()->auth($this->username, $password)) {
            //Autenticar primero con el LDAP
            return $r;
        } else {
            //Intente usar el password que está en la BD
            return $this->password === $password;
        }
    }

    public function search($params)
    {
        $query = static::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'like', 'username', $this->username,
        ]);
        $query->orderBy("id");

        //$query->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }

    public static function cambiarEstado($id)
    {
        $user = self::findIdentity($id);
        $isAdmin = Rol::hasRole($id, Rol::ROLE_SUPER);
        if (!$isAdmin) {
            $user->habilitado = !$user->habilitado;
            $user->save();
        } else {
            Yii::$app->session->setFlash('danger', 'No puede modificar al administrador del sistema');
        }
    }


    public static function actualizarRoles($id, $array_roles){
        $roles = "";
        foreach($array_roles as $item)
            $roles = $roles . "," . $item;
        $user = static::findIdentity($id);
        $user->role = $roles;
        return $user->save();
    }
}
