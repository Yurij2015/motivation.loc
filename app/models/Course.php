<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property string $description
 * @property int $tutor_id
 *
 * @property Tutor $tutor
 * @property Lesson[] $lessons
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'tutor_id'], 'integer'],
            [['description'], 'string', 'max' => 245],
            [['id'], 'unique'],
            [['tutor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tutor::className(), 'targetAttribute' => ['tutor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'description' => Yii::t('app', 'Description'),
            'tutor_id' => Yii::t('app', 'Tutor ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTutor()
    {
        return $this->hasOne(Tutor::className(), ['id' => 'tutor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLessons()
    {
        return $this->hasMany(Lesson::className(), ['course_id' => 'id']);
    }
}
