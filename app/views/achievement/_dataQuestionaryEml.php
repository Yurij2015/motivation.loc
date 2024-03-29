<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->questionaryEmls,
        'key' => 'idquestionary_eml'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'idquestionary_eml',
        [
                'attribute' => 'questionIdquestion.question',
                'label' => Yii::t('app', 'Question Idquestion')
            ],
        'answertoquestion',
        'date_add',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'questionary-eml'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
