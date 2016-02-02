<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProyectosComite]].
 *
 * @see ProyectosComite
 */
class ProyectosComiteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ProyectosComite[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProyectosComite|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
