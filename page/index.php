<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $parametr array */
/* @var $root core\edit\entities\Page */
/* @var $models core\edit\entities\Page */

$this->title = $root->title;

$this->params['breadcrumbs'][] = [
    'label' => $root->name
];

$this->params['parametr'] = $parametr;
$this->params['title']    = $this->title;

?>
<div class="container">

    <div class="row">

        <article class="col-lg-9">


            <?php
            foreach ($models as $model): ?>
                <div class="card">
                    <?php
                    if ($model->photo): ?>
                        <a
                                href="<?= $model->getThumbFileUrl('photo', 'col-12'); ?>">
                            <img src="<?= $model->getThumbFileUrl('photo', 'col-9'); ?>"
                                 alt="<?= Html::encode($model->name); ?>"
                                 class="card-img-top"/>
                        </a>
                    <?php
                    endif; ?>
                    <div class="card-header">
                        <h3><?= Html::encode($model->title); ?></h3>
                    </div>
                    <div class="card-body">
                        <?= Yii::$app->formatter
                            ->asHtml($model->description)
                        ; ?>
                    </div>
                    <div class="card-footer refer-block">
                        <?= Html::a(
                            'читать', [
                            'view',
                            'id' => $model->id
                        ],  [
                                'class' => 'btn btn-secondary'
                            ]
                        ); ?>
                    </div>
                </div>

            <?php endforeach; ?>

        </article>

        <aside class="col-lg-3">


        </aside>
    </div>
</div>