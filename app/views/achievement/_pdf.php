<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Achievement */

$this->title = $model->idachievement;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Achievement'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievement-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Achievement').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'idachievement', 'visible' => false],
        'name',
        'description',
        'date_add',
        'date_up',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerAchievementEmpl->totalCount){
    $gridColumnAchievementEmpl = [
        ['class' => 'yii\grid\SerialColumn'],
        'idachievement_empl',
        [
                'attribute' => 'user.id',
                'label' => Yii::t('app', 'User')
            ],
                'date_add',
        'date_up',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerAchievementEmpl,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Achievement Empl')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnAchievementEmpl
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerQuestionaryEml->totalCount){
    $gridColumnQuestionaryEml = [
        ['class' => 'yii\grid\SerialColumn'],
        'idquestionary_eml',
        [
                'attribute' => 'questionIdquestion.question',
                'label' => Yii::t('app', 'Question Idquestion')
            ],
                'answertoquestion',
        'date_add',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerQuestionaryEml,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Questionary Eml')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnQuestionaryEml
    ]);
}
?>
    </div>
</div>
