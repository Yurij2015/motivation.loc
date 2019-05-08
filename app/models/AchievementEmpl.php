<?php

namespace app\models;

use Yii;
use \app\models\base\AchievementEmpl as BaseAchievementEmpl;

/**
 * This is the model class for table "achievement_empl".
 */
class AchievementEmpl extends BaseAchievementEmpl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id', 'achievement_idachievement'], 'required'],
            [['user_id', 'achievement_idachievement'], 'integer'],
            [['date_add', 'date_up'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
