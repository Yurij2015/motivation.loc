<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Achievement */

?>
<div class="achievement-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->idachievement) ?></h2>
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
</div>