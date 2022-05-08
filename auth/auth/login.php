<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model common\core\forms\Auth\LoginForm */
/* @var $parametr core\edit\entities\Parametr */

use frontend\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);

$this->title                   = 'Вход в Личный кабинет';
$this->params['breadcrumbs'][] = $mainTitle;

$this->registerLinkTag(
    [
        'rel' => 'canonical', 'href' => Url::canonical()
    ]
);
?>
<section class="sign-in">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="signin-image">
                    <img alt="sign-up image" class="img-fluid float-end" src="./img/login/<?= rand(1, 20); ?>.jpg">
                </div>

            </div>
            <div class="col-md-3">
                <?= $this->render(
                    '/layouts/sections/_messages'); ?>
                <div class="signin-content">
                    <h3><?= $parametr->getName(); ?></h3>
                    <div class="signin-form">
                        <form method="POST" class="register-form">
                            <?php

                            $form = ActiveForm::begin(
                                [
                                    'id'     => 'login-form',
                                    'method' => 'POST',
                                ]
                            ); ?>
                            <?= $form->field($model, 'username')
                                     ->label(
                                         false)
                                     ->textInput(
                                         [
                                             'placeholder' => 'логин'
                                         ]
                                     )
                            ; ?>
                            <?= $form->field($model, 'password')
                                     ->label(
                                         false)
                                     ->passwordInput(
                                         [
                                             'placeholder' => 'пароль'
                                         ]
                                     )
                            ; ?>
                            <?= $form->field($model, 'rememberMe')
                                     ->label(
                                         'запомнить на 30 дней')
                                     ->checkbox()
                            ; ?>
                            <div class="text-center">
                                <?= Html::submitButton('Войти', [
                                                                  'class' => 'btn btn-primary', 'name' => 'login-button'
                                                              ]
                                ); ?>
                            </div>

                            <?php
                            ActiveForm::end(); ?>
                        </form>
                    </div>
                    <hr>
                    <div class="block-padding text-center">
                        <a href="<?= Html::encode(Url::to(
                            [
                                '/auth/signup/request'
                            ]
                        )); ?>"
                           class="btn btn-secondary btn-sm">зарегистрироваться</a>

                        <p class="small"><?= Html::a(
                                'Забыл пароль', Url::to(
                                [
                                    'auth/reset/request'
                                ]
                            )); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
