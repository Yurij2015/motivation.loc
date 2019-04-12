<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property int $visibility
 * @property string $date
 * @property string $header
 * @property string $text
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['visibility', 'order_date_fmt', 'header', 'text'], 'required'],
            [['visibility'], 'integer'],
            [['date'], 'safe'],
            [['text'], 'string'],
            [['header'], 'string', 'max' => 255],
            [['order_date_fmt'], 'date', 'format'=>'php:Y-m-d'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'visibility' => Yii::t('app', 'Visibility'),
            'date' => Yii::t('app', 'Date'),
            'header' => Yii::t('app', 'Header'),
            'text' => Yii::t('app', 'Text'),
        ];
    }

    public function getOrder_date_fmt() {
        return substr($this->date,0,10);
    }

    public function setOrder_date_fmt($value) {
        $this->date = $value;
    }

}
