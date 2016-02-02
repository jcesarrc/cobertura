<?php

namespace app\models;


use Yii;

class Ldap
{

    private static $ldap = null;
    private $username;
    private $url;
    private $password;
    private $base;
    private $base_schema;

    private function __construct()
    {
        $this->username = Yii::$app->params['ldap']['userDn'];
        $this->url = Yii::$app->params['ldap']['url'];
        $this->password = Yii::$app->params['ldap']['password'];
        $this->directoryString = Yii::$app->params['ldap']['directoryString'];
        $this->base_schema = Yii::$app->params['ldap']['base.schema'];
        $this->base = Yii::$app->params['ldap']['base'];
        $this->suffix = Yii::$app->params['ldap']['suffix'];
    }

    public static function getInstance()
    {
        if (Ldap::$ldap == null) {
            Ldap::$ldap = new Ldap();
        }
        return Ldap::$ldap;
    }

    public function auth($username, $password)
    {
        if ($ds = ldap_connect($this->url)) {
            $base = $username . $this->suffix;
            return @ldap_bind($ds, $base, $password);
        }
        return null;
    }

    public function search($username)
    {
        if ($ds = $this->baseConnect()) {
            $base = $this->base_schema . ',' . $this->base;
            $filter = "($this->directoryString=$username)";
            $sr = ldap_search($ds, $base, $filter);
            $info = ldap_count_entries($ds, $sr);
            ldap_close($ds);
            return $info;
        }
        return null;
    }

    private function baseConnect()
    {
        $ds = ldap_connect($this->url);
        if ($ds && @ldap_bind($ds, $this->username, $this->password)) {
            return $ds;
        }
        return false;
    }

}