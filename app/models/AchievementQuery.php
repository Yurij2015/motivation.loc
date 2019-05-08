<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Achievement]].
 *
 * @see Achievement
 */
class AchievementQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Achievement[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Achievement|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
