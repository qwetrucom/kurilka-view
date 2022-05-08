<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$url = Url::to(
    [
        '/page/view', 'id' => $page->id
    ]
);
?>
<?php
if ($page->content && $page->isActive()) : ?>
    <div class="row bg-light page-depth-<?= $page->depth; ?>">
        <?php
        if ($page->photo) : ?>
            <div class="col-md-4">
                <div class="main-image-block">
                    <?= Html::a(
                        Html::img($page->getThumbFileUrl(
                            'photo', 'col-6'
                        ),
                                  [
                                      'class' => 'img-fluid',
                                  ]
                        ), $url);
                    ?>
                </div>
            </div>
            <div class="col-md-8">
                <h3 class="title">
                    <?= Html::a(
                        Html::encode($page?->title), $url); ?>
                </h3>

                <?= Yii::$app->formatter
                    ->asHtml($page?->content->description)
                ; ?>

                <?php
                foreach ($page->children as $page) : ?>
                    <?= $this->render(
                        '_subpages', [
                                       'page' => $page,
                                   ]
                    ); ?>
                <?php
                endforeach; ?>

                <div class="alone-button text-end">
                    <?= Html::a(
                        '<i class="fas fa-arrow-alt-circle-right"></i>', [
                        '/page/view', 'id' => $page->id
                    ],  [
                            'class' => 'badge bg-secondary mb-2'
                        ]
                    ); ?>
                </div>
            </div>
        <?php
        else : ?>
            <div class="col-md-10 m-auto">
                <?= Yii::$app->formatter
                    ->asHtml($page?->content->description)
                ; ?>
                <div class="alone-button text-end">
                    <?= Html::a(
                        '<i class="fas fa-arrow-alt-circle-right"></i>', [
                        '/page/view', 'id' => $page->id
                    ],  [
                            'class' => 'badge bg-secondary mb-2'
                        ]
                    ); ?>
                </div>
            </div>
        <?php
        endif; ?>
    </div>

<?php
endif; ?>
