<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $parametr core\tools\components\Parametr */

/* @var $model common\core\forms\Auth\ResetPasswordForm */

use frontend\widgets\Common\AlertWidget;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Установка нового пароля';

$this->params['breadcrumbs'][] = $mainTitle;
$this->params['parametr']      = $parametr;
$this->params['title']         = $this->title;

$this->registerLinkTag(
    [
        'rel' => 'canonical', 'href' => Url::canonical()
    ]
);
?>

<div class="container">

    <div class="col-md-8 offset-md-2">
        <div class="big-title">
            <h1><?= Html::encode($this->title); ?></h1>
        </div>
        <div class="block-padding">
            <p>Пожалуйста, установите новый пароль:</p>

            <div class="col-lg-5">
                <?php
                $form = ActiveForm::begin(
                    [
                        'id' => 'reset-password-form'
                    ]
                ); ?>

                <?= $form->field($model, 'password')
                         ->passwordInput(
                             [
                                 'autofocus' => true
                             ]
                         )
                ; ?>

                <div class="form-group text-center">
                    <?= Html::submitButton('Установить', [
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
