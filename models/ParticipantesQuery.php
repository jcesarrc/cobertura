<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Participantes]].
 *
 * @see Participantes
 */
class ParticipantesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Participantes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Participantes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}