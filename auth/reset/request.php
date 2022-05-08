<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model common\core\forms\Auth\PasswordResetRequestForm */

/* @var $parametr core\tools\components\Parametr */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title                   = 'Сброс пароля';
$this->params['breadcrumbs'][] = [
    'label' => 'Личный кабинет', 'url' => [
        'cabinet/default/index'
    ]
];
$this->params['breadcrumbs'][] = $mainTitle;
$this->params['parametr']      = $parametr;
$this->params['title']         = $this->title;

$this->registerLinkTag(
    [
        'rel' => 'canonical', 'href' => Url::canonical()
    ]
);
?>

<section class="sign-in">
    <div class="container">

        <div class="col-md-8 offset-md-2">
            <div class="big-title">
                <h1><?= Html::encode($this->title); ?></h1>
            </div>

            <div class="block-padding">
                <p>Пожалуйста, укажите e-mail, указанный при регистрации. <br>
                    Мы пришлем ссылку для установки нового
                    пароля.</p>

                <div class="col-lg-5">
                    <?php
                    $form = ActiveForm::begin(
                        [
                            'id' => 'request-password-reset-form'
                        ]
                    ); ?>

                    <?= $form->field($model, 'email')
                             ->textInput(
                                 [
                                     'autofocus' => true
                                 ]
                             )
                    ; ?>

                    <div class="form-group text-center">
                        <?= Html::submitButton('Отправить', [
                                                              'class' => 'btn btn-primary'
                                                          ]
                        ); ?>
                    </div>

                    <?php
                    ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
