<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Divipola]].
 *
 * @see Divipola
 */
class DivipolaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Divipola[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Divipola|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}