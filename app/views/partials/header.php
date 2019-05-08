<?php

/* @var $this \yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use justcoded\yii2\rbac\models\Item as RbacItem;

NavBar::begin([
    'brandLabel' => 'MotivationSystem',
//	'brandUrl'   => Yii::$app->homeUrl,
    'brandUrl' => '/lesson',
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
//        ['label' => Yii::t('app', 'Lessons'), 'url' => ['/lesson/index']],
//        ['label' => Yii::t('app', 'Category'), 'url' => ['/category/index']],
//        ['label' => Yii::t('app', 'Course'), 'url' => ['/course/index']],
//        ['label' => Yii::t('app', 'News'), 'url' => ['/news/index']],
//        ['label' => Yii::t('app', 'Tutor'), 'url' => ['/tutor/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Обратная связь', 'url' => ['/site/contact']],
        ['label' => 'АдминПанель', 'url' => ['/admin'], 'visible' => user()->can(RbacItem::PERMISSION_ADMINISTER)],
        Yii::$app->user->isGuest ? (
        ['label' => 'Войти', 'url' => ['/auth/login']]
        ) : (
            '<li>'
            . Html::beginForm(['/auth/logout'], 'post')
            . Html::submitButton(
                'Выйти (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>'
        )
    ],
]);
NavBar::end();


