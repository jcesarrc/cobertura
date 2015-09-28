<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Proyecto]].
 *
 * @see Proyecto
 */
class ProyectoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Proyecto[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Proyecto|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}