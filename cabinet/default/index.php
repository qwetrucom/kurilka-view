<?php

/* @var $this yii\web\View */

/* @var $parametr core\tools\components\Parametr */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title                   = 'Личный кабинет';
$this->params['breadcrumbs'][] = $mainTitle;
$this->params['parametr']      = $parametr;
$this->params['title']         = $this->title;

?>
<div class="block-padding">
    <h4>Приветствуем вас,
        <?php
        if ($user): echo Html::encode($user->nickname);
        endif; ?>
    </h4>
    <p>Такое дело, что мы не храним никаких данных о наших пользователях. Поэтому нет
        понимания, что показывать в Вашем личном кабинете, кроме фотографии котиков.</p>
    <?= Html::img(Url::to('@imgpage/cats/' . rand(1, 31) . '.jpg'),
                  [
                      'class' => 'img-fluid', 'alt' => 'Персональные данные'
                  ]
    ); ?>
    <p>Если Вам кажется, что пришло время изменить псевдоним, контактный e-mail или пароль, то мешать не будем. Это
        единственная информация о Вас, которую мы храним* и которую Вы можете поменять в любой момент.</p>
    <hr>
    <p class="p-4">
        <small>*Пароли мы храним в хэше. Если потеряете, восстановить не сможем.</small></p>
    </p>
    <div class="row">
        <div class="col-md-6 text-center">
            <?= Html::a(
                'Изменить контактные данные', [
                '/cabinet/profile/edit'
            ],  [
                    'class' => 'btn btn-primary'
                ]
            ); ?>
        </div>
        <div class="col-md-6 text-center">
            <?= Html::a(
                'Изменить пароль', [
                '/auth/reset/request'
            ],  [
                    'class' => 'btn btn-success'
                ]
            ); ?>
        </div>
    </div>
</div>
