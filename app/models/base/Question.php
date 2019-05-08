<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "question".
 *
 * @property integer $idquestion
 * @property string $question
 * @property string $date_add
 *
 * @property \app\models\QuestionaryEml[] $questionaryEmls
 */
class Question extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'questionaryEmls'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_add'], 'safe'],
            [['question'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
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
            'idquestion' => Yii::t('app', 'Idquestion'),
            'question' => Yii::t('app', 'Question'),
            'date_add' => Yii::t('app', 'Date Add'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionaryEmls()
    {
        return $this->hasMany(\app\models\QuestionaryEml::className(), ['question_idquestion' => 'idquestion']);
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
     * @return \app\models\QuestionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\QuestionQuery(get_called_class());
    }
}
