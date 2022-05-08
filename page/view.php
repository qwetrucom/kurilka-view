<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $parametr array */
/* @var $root core\edit\entities\Page */
/* @var $model core\edit\entities\Page */

$this->title = $model->title;

$this->params['breadcrumbs'][] = [
    'label' => $root->name, 'url' => [
        'index'
    ]
];
foreach ($model->parents as $parent) {
    if ($parent->depth > 1) {
        $this->params['breadcrumbs'][] = [
            'label' => $parent->name, 'url' => [
                'view',
                'id' => $parent->id
            ]
        ];
    }
}
$this->params['breadcrumbs'][] = $model->name;

$this->params['active_page'] = $model;
$this->params['page']        = $model;
$this->params['parametr']    = $parametr;
$this->params['title']       = $this->title;

?>

<div class="row">

    <article class="col-lg-9">
        <div class="title">
            <h1><?= Html::encode($model->title); ?></h1>
        </div>
        <?php
        if ($model->photo): ?>
            <div class="main-img">
                <a href="<?= $model->getThumbFileUrl('photo', 'col-12'); ?>">
                    <img src="<?= $model->getThumbFileUrl('photo', 'col-9'); ?>"
                         alt="<?= Html::encode($model->name); ?>"
                         class="img-fluid"/>
                </a>
            </div>
        <?php
        endif; ?>
        <div class="content-body">
            <?= Yii::$app->formatter
                ->asHtml($model->text)
            ; ?>
        </div>
    </article>

    <aside class="col-lg-3">


    </aside>
</div>
