<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%lesson}}".
 *
 * @property int $id
 * @property string $name
 * @property string $number
 * @property string $description
 * @property int $course_id
 * @property string $content
 *
 * @property Course $course
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%lesson}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id'], 'required'],
            [['course_id'], 'integer'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 45],
            [['number'], 'string', 'max' => 10],
            [['description'], 'string', 'max' => 245],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'number' => Yii::t('app', 'Number'),
            'description' => Yii::t('app', 'Description'),
            'course_id' => Yii::t('app', 'Course ID'),
            'content' => Yii::t('app', 'Content'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }
}
