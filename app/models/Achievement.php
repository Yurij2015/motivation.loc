<?php

namespace app\models;

use Yii;
use \app\models\base\Achievement as BaseAchievement;

/**
 * This is the model class for table "achievement".
 */
class Achievement extends BaseAchievement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['date_add', 'date_up'], 'safe'],
            [['name'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 255]
        ]);
    }
	
}
