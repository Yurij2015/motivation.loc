<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "achievement_empl".
 *
 * @property integer $idachievement_empl
 * @property integer $user_id
 * @property integer $achievement_idachievement
 * @property string $date_add
 * @property string $date_up
 *
 * @property \app\models\Achievement $achievementIdachievement
 * @property \app\models\User $user
 */
class AchievementEmpl extends \yii\db\ActiveRecord
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
            'user'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'achievement_idachievement'], 'required'],
            [['user_id', 'achievement_idachievement'], 'integer'],
            [['date_add', 'date_up'], 'safe'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'achievement_empl';
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
            'idachievement_empl' => Yii::t('app', 'Idachievement Empl'),
            'user_id' => Yii::t('app', 'User ID'),
            'achievement_idachievement' => Yii::t('app', 'Achievement Idachievement'),
            'date_add' => Yii::t('app', 'Date Add'),
            'date_up' => Yii::t('app', 'Date Up'),
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
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id']);
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
     * @return \app\models\AchievementEmplQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\AchievementEmplQuery(get_called_class());
    }
}
