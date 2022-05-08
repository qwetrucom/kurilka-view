<?php

/* @var $this yii\web\View */
/* @var $post core\edit\entities\Blog\Post */

/* @var $model core\edit\forms\Blog\CommentForm */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Комментарий';

$this->params['breadcrumbs'][] = [
        'label' => 'Блог', 
        'url' => 'index'
];

$this->params['breadcrumbs'][] = [
        'label' => $post->category->name, 
        'url' => [
                'view', 
                'slug' => $post->category->slug
        ]];
$this->params['breadcrumbs'][] = [
        'label' => $post->title, 
        'url' => [
                'post', 
                'id' => $post->id
        ]
];

$this->params['breadcrumbs'][] = $this->title;

$this->params['active_category'] = $post->category;


?>

<div class="blog-screen-<?= $post->category->id; ?>">

    <div class="container work-block">

        <div class="comment-block col-md-9">
            <div class="single-block-inner">
                <div class="comment-title">
                    <p>Тема:</p>
                    <h3><?= Html::encode($post->title) ?></h3>
                </div>
                <div class="comment-view">
                    <?php $form = ActiveForm::begin([
                        'action' => ['comment', 
'id' => $post->id],
                    ]); ?>

                    <?= Html::activeHiddenInput($model, 'parentID') ?>
                    <?= $form->field($model, 'text')
                             ->label('Ваш комментарий:')
                             ->textarea(['rows' => 5]
); ?>

                    <div class="form-group">
                        <?= Html::submitButton(
                                'Отправка', 
                                [
                                        'class' => 'btn btn-primary'
                                ]
); ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                    <hr class="dotted">
                    <div class="smalltype">
                        * Комментарии могут оставлять только зарегистрированные пользователи
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

