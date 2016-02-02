<?php

namespace app\models;


use yii\base\Model;

class Rol extends Model
{
    /**
     * ROLE_SUPER es el rol del superadministrador del sistema, puede acceder a cualquier módulo y modificar datos
     * en los diferentes módulos. Igualmente puede crear usuarios a partir del LDAP y modificar sus roles si es
     * necesario
     * El usuario con el rol ROLE_SUPER tiene por defecto username admin y el password está en la tabla Usuario de la Base
     * de datos, adicionalmente debe evitar modificarse (directamente a través de la BD), salvo el password (en caso de que se
     * requiera)
     * Puede existir más de un usuario con el rol ROLE_SUPER, pero debería dejarse al menos el usuario original (admin)
     * con ese rol.
     */
    const ROLE_SUPER = 1000;

    /**
     * ROLE_ADMIN es el rol de un usuario del ministerio con capacidad de modificar datos en los diferentes módulos.
     * Se diferencia del ROLE_SUPER en que este usuario puede ser cualquier usuario o usuarios que se crearon del LDAP
     * del Ministerio.
     * El usuario con ROLE_SUPER es sólo por tener un usuario de emergencia para poder dar permisos a otros como ADMINS
     * en caso de que los ADMINS no puedan autenticarse o no trabajen más en la institución
     */

    const ROLE_ADMIN = 100;


    /**
     * ROLE_COMITES permite entrar a ver comités y a aprobar proyectos en cada comité
     *
     */

    const ROLE_COMITES = 50;


    /**
     * ROLE_PROYECTOS es un rol que permite cargar proyecto, pero no permite acceder a ninguna opcion de configuracion o
     * administracion
     */

    const ROLE_PROYECTOS = 20;

    /**
     * ROLE_REPORTES permite ingresar a las opciones de generar los reportes gráficos y en tablas
     */

    const ROLE_REPORTES = 10;


    public static function hasRole($id, $role)
    {
        return in_array($role, self::getRolesId($id));
    }

    public static function getRolesId($id)
    {
        $roles = explode(",", User::find()->where(['id' => $id])->one()->role);
        return $roles;
    }

    public static function getListaRoles()
    {
        $roles = [
            self::ROLE_SUPER => [
                'name' => 'Superadministrador',
                'desc' => '',
            ],
            self::ROLE_ADMIN => [
                'name' => 'Administrador',
                'desc' => '',
            ],
            self::ROLE_COMITES => [
                'name' => 'Aprobación comités',
                'desc' => '',
            ],
            self::ROLE_PROYECTOS => [
                'name' => 'Cargar proyectos',
                'desc' => '',
            ],
            self::ROLE_REPORTES => [
                'name' => 'Generar reportes',
                'desc' => '',

            ],
        ];


        $roles = [
            self::ROLE_SUPER => 'Superadministrador',
            self::ROLE_ADMIN => 'Administrador',
            self::ROLE_COMITES => 'Aprobación comités',
            self::ROLE_PROYECTOS => 'Cargar proyectos',
            self::ROLE_REPORTES => 'Generar reportes',
        ];

        return $roles;
    }

}