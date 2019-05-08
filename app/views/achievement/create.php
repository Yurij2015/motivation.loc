<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Achievement */

$this->title = Yii::t('app', 'Create Achievement');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Achievement'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
