<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\Module;
use kartik\datecontrol\DateControl;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Achievement */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'AchievementEmpl',
        'relID' => 'achievement-empl',
        'value' => \yii\helpers\Json::encode($model->achievementEmpls),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'QuestionaryEml',
        'relID' => 'questionary-eml',
        'value' => \yii\helpers\Json::encode($model->questionaryEmls),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="achievement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'idachievement', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'placeholder' => 'Description']) ?>

    <!--    --><? //= $form->field($model, 'date_add')->textInput() ?>

    <?= $form->field($model, 'date_add')->widget(DatePicker::class, [
        'options' => ['placeholder' => Yii::t('app', 'Select issue date ...')],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
            'orientation' => "bottom",
        ]
    ]); ?>

    <!--    --><? //= $form->field($model, 'date_up_fmt')->widget(\kartik\datecontrol\DateControl::classname(), [
    //        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
    //        'saveFormat' => 'php:Y-m-d',
    //        'ajaxConversion' => true,
    //        'options' => [
    //            'pluginOptions' => [
    //                'placeholder' => Yii::t('app', 'Choose Date Add'),
    //                'autoclose' => true
    //            ]
    //        ],
    //    ]); ?>

    <?= $form->field($model, 'date_up')->widget(\kartik\widgets\DateTimePicker::class, [
        'options' => ['placeholder' => Yii::t('app','Select issue date ...')],
        'pluginOptions' => [
            'placeholder' => Yii::t('app', 'Choose Date Up'),
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii',

        ],
    ]); ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'AchievementEmpl')),
            'content' => $this->render('_formAchievementEmpl', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->achievementEmpls),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'QuestionaryEml')),
            'content' => $this->render('_formQuestionaryEml', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->questionaryEmls),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
