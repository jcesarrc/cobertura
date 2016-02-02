<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MetasCobertura]].
 *
 * @see MetasCobertura
 */
class MetasCoberturaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MetasCobertura[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MetasCobertura|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
