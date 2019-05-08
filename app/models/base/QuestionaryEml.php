<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "questionary_eml".
 *
 * @property integer $idquestionary_eml
 * @property integer $question_idquestion
 * @property integer $achievement_idachievement
 * @property string $answertoquestion
 * @property string $date_add
 *
 * @property \app\models\Achievement $achievementIdachievement
 * @property \app\models\Question $questionIdquestion
 */
class QuestionaryEml extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'achievementIdachievement',
            'questionIdquestion'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_idquestion', 'achievement_idachievement'], 'required'],
            [['question_idquestion', 'achievement_idachievement'], 'integer'],
            [['date_add'], 'safe'],
            [['answertoquestion'], 'string', 'max' => 45],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'questionary_eml';
    }

    /**
     *
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock
     *
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idquestionary_eml' => Yii::t('app', 'Idquestionary Eml'),
            'question_idquestion' => Yii::t('app', 'Question Idquestion'),
            'achievement_idachievement' => Yii::t('app', 'Achievement Idachievement'),
            'answertoquestion' => Yii::t('app', 'Answertoquestion'),
            'date_add' => Yii::t('app', 'Date Add'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAchievementIdachievement()
    {
        return $this->hasOne(\app\models\Achievement::className(), ['idachievement' => 'achievement_idachievement']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionIdquestion()
    {
        return $this->hasOne(\app\models\Question::className(), ['idquestion' => 'question_idquestion']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\QuestionaryEmlQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\QuestionaryEmlQuery(get_called_class());
    }
}
