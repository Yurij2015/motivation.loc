<?php

namespace app\models;

use Yii;
use \app\models\base\QuestionaryEml as BaseQuestionaryEml;

/**
 * This is the model class for table "questionary_eml".
 */
class QuestionaryEml extends BaseQuestionaryEml
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['question_idquestion', 'achievement_idachievement'], 'required'],
            [['question_idquestion', 'achievement_idachievement'], 'integer'],
            [['date_add'], 'safe'],
            [['answertoquestion'], 'string', 'max' => 45],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
