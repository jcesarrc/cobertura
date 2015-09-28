<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[OperadorRed]].
 *
 * @see OperadorRed
 */
class OperadorRedQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return OperadorRed[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OperadorRed|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}