<?php

/* @var $this yii\web\View */
/* @var $model common\core\forms\User\UserEditForm */
/* @var $user core\edit\entities\User\User */

/* @var $parametr core\tools\components\Parametr */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title                   = 'Править данные для ' . $user->nickname;
$this->params['breadcrumbs'][] = [
    'label' => 'Личный кабинет', 'url' => [
        'cabinet/default/index'
    ]
];
$this->params['breadcrumbs'][] = 'Данные профиля';
$this->params['parametr']      = $parametr;
$this->params['title']         = $this->title;

$this->registerLinkTag(
    [
        'rel' => 'canonical', 'href' => Url::canonical()
    ]
);


?>

<div class="col-sm-8">
    <?php
    $form = ActiveForm::begin(); ?>
    <div class="card">
        <div class="card-header bg-dark text-white"><?= Html::encode($this->title); ?></div>
        <div class="card-body text-dark">
            <?= $form->field($model, 'nickname')
                     ->textInput(
                         [
                             'maxLength' => true
                         ]
                     )
                     ->label(
                         'Псевдоним на сайте')
            ; ?>
            <?= $form->field($model, 'email')
                     ->textInput(
                         [
                             'maxLength' => true
                         ]
                     )
            ; ?>
            <div class="form-group">
                <?= Html::submitButton('Сохранить', [
                                                      'class' => 'btn btn-primary'
                                                  ]
                ); ?>
            </div>
        </div>
    </div>
    <?php
    ActiveForm::end(); ?>
    <div class="block-padding text-end">
        <?= Html::tag(
            'p', Html::a(
            'Сменить пароль', '/auth/reset/request', [
                                'type' => 'button', 'class' => 'btn btn-success', 'target' => 'blank'
                            ]
        )); ?>

    </div>
</div>
