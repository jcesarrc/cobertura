<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TipoProyecto]].
 *
 * @see TipoProyecto
 */
class TipoProyectoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return TipoProyecto[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TipoProyecto|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}