<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Faer]].
 *
 * @see Faer
 */
class FaerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Faer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Faer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}