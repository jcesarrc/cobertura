<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DetalleProyecto]].
 *
 * @see DetalleProyecto
 */
class DetalleProyectoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return DetalleProyecto[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DetalleProyecto|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}