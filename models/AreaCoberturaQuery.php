<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[AreaCobertura]].
 *
 * @see AreaCobertura
 */
class AreaCoberturaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return AreaCobertura[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AreaCobertura|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}