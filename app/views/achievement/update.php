<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Achievement */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Achievement',
]) . ' ' . $model->idachievement;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Achievement'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idachievement, 'url' => ['view', 'id' => $model->idachievement]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="achievement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
