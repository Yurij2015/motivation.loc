<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tutor".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $phone
 * @property string $adders
 *
 * @property Course[] $courses
 */
class Tutor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tutor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'adders'], 'string', 'max' => 245],
            [['description'], 'string', 'max' => 45],
            [['phone'], 'string', 'max' => 15],
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
            'description' => Yii::t('app', 'Description'),
            'phone' => Yii::t('app', 'Phone'),
            'adders' => Yii::t('app', 'Adders'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['tutor_id' => 'id']);
    }
}
