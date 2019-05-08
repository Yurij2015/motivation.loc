<?php

namespace app\models;

use Yii;
use \app\models\base\Question as BaseQuestion;

/**
 * This is the model class for table "question".
 */
class Question extends BaseQuestion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['date_add'], 'safe'],
            [['question'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
