<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->achievementEmpls,
        'key' => 'idachievement_empl'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'idachievement_empl',
        [
                'attribute' => 'user.id',
                'label' => Yii::t('app', 'User')
            ],
        'date_add',
        'date_up',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'achievement-empl'
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
