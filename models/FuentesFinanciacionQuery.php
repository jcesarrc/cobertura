<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[FuentesFinanciacion]].
 *
 * @see FuentesFinanciacion
 */
class FuentesFinanciacionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return FuentesFinanciacion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FuentesFinanciacion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}