<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\core\forms\Auth\SignupForm */

/* @var $parametr core\tools\components\Parametr */

use frontend\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

AppAsset::register($this);

$this->registerLinkTag(
    [
        'rel' => 'canonical', 'href' => Url::canonical()
    ]
);

$this->title                   = 'Регистрация';
$this->params['breadcrumbs'][] = $mainTitle;
$this->params['parametr']      = $parametr;
$this->params['title']         = $this->title;


?>
<section class="sign-in">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="signin-image">
                    <img alt="sing up image" class="img-fluid float-end" src="./img/pix/cabinet_17.jpg">
                </div>
            </div>
            <div class="col-md-3">
                <div class="signin-content">
                    <div class="prescript-block">
                        Для регистрации заполните поля ниже:
                    </div>
                    <?php
                    Pjax::begin(
                        [
                        ]
                    );
                    $form = ActiveForm::begin(
                        [
                            'id' => 'form-signup'
                        ]
                    ); ?>
                    <?= $form->field($model, 'username')
                             ->label(
                                 false)
                             ->textInput(
                                 [
                                     'autofocus' => true, 'placeholder' => 'Логин'
                                 ]
                             )
                    ; ?>
                    <?= $form->field($model, 'nickname')
                             ->label(
                                 false)
                             ->textInput(
                                 [
                                     'autofocus' => true, 'placeholder' => 'Ваш псевдоним на сайте'
                                 ]
                             )
                    ; ?>
                    <?= $form->field($model, 'email')
                             ->label(
                                 false)
                             ->textInput(
                                 [
                                     'autofocus' => true, 'placeholder' => 'email'
                                 ]
                             )
                    ; ?>
                    <?= $form->field($model, 'password')
                             ->label(
                                 false)
                             ->passwordInput(
                                 [
                                     'autofocus' => true, 'placeholder' => 'Пароль'
                                 ]
                             )
                    ; ?>
                    <div class="form-group">
                        <?= Html::submitButton('Зарегистрироваться', [
                                                                       'class' => 'btn btn-primary', 'name' => 'signup-button'
                                                                   ]
                        ); ?>
                    </div>
                    <?php
                    ActiveForm::end();
                    Pjax::end(); ?>

                    <div class="prescript-block">
                        После регистрации в системе Вы получите письмо со ссылкой для подтверждения указанного Вами
                        e-mail.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
