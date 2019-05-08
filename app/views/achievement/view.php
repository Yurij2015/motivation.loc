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
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model->idachievement],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idachievement], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idachievement], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-achievement-empl']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Achievement Empl')),
        ],
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-questionary-eml']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Questionary Eml')),
        ],
        'columns' => $gridColumnQuestionaryEml
    ]);
}
?>

    </div>
</div>
