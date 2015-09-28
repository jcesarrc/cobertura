<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Comite]].
 *
 * @see Comite
 */
class ComiteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Comite[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Comite|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}