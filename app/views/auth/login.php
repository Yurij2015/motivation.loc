<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\forms\LoginForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

//Определение заголовка страницы
$this->title = 'Вход в систему';
//Формирование хлебных крошке
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
<!--    Заголовоа для формы авторизации-->
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Пожалуйста, заполните все поля:</p>
    <!--	Форма авторизации на сайте-->
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
    <!--	Поле ввода имени пользователя-->
    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
    <!--	Поле ввода пароля пользователя-->
    <?= $form->field($model, 'password')->passwordInput() ?>
    <!--	Кнопка запомнить-->
    <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ]) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <!--            Кнопка Войти-->
            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <div class="row">
        <div class="col-md-3 col-md-offset-1">
            <p>Нет аккаунта? <?= Html::a('Регистрация!', ['auth/register']) ?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-md-offset-1">
            <p>Забыли пароль? <?= Html::a('Восстановить!', ['auth/password-request']) ?></p>
        </div>
    </div>

</div>
