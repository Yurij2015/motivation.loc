<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;


/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'visibility')->textInput() ?>

<!--    <?//= $form->field($model, 'date')->textInput() ?>-->

    <?= $form->field($model, 'order_date_fmt')->widget(DatePicker::class, [
        'options' => ['placeholder' => Yii::t('app','Select issue date ...')],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
            'orientation' => "bottom",
        ]
    ]); ?>


    <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

<!--    <?//= $form->field($model, 'text')->textarea(['rows' => 6]) ?>-->

    <?=  $form->field($model, 'text')->widget(TinyMce::className(), [
    'options' => ['rows' => 20],
    'language' => 'ru',
    'clientOptions' => [
    'plugins' => [
    'advlist autolink lists link charmap  print hr preview pagebreak',
    'searchreplace wordcount textcolor visualblocks visualchars code fullscreen nonbreaking',
    'save insertdatetime media table contextmenu template paste image'
    ],
    'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
    ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
