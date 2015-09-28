<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Proyectoxcomite]].
 *
 * @see Proyectoxcomite
 */
class ProyectoxcomiteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Proyectoxcomite[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Proyectoxcomite|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}