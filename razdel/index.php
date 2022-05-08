<?php

use yii\bootstrap5\Html;

/* @var $parametr core\tools\components\Parametr */
/* @var $root array */
/* @var $razdels array */
/* @var $products array */
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $razdel core\edit\entities\Shop\Razdel */

$this->params['parametr'] = $parametr;
$this->params['title']    = $this->title;

$mainTitle = $parametr->getRazdel();

$this->params['breadcrumbs'][] = [
    'label' => $mainTitle, 'url' => [
        'index'
    ]
];
$this->params['breadcrumbs'][] = $mainTitle;

?>
<article>
    <section class="title">
        <h1>
            <?= Yii::$app->formatter
                ->asHtml($parametr->title)
            ; ?>
        </h1>
    </section>

    <section class="description-block">

        <?= Yii::$app->formatter
            ->asHtml($parametr->description)
        ; ?>

        <div class='vivify driveInBottom delay-1500 duration-2500 
                d-flex align-items-center justify-content-between'>
            <?php
            foreach ($razdels as $razdel):
                if ($razdel->depth == 2) : ?>
                    <?= Html::a($razdel->name, '#' . $razdel->id); ?>
                <?php
                endif;
            endforeach;
            ?>
            <?= Html::a(
                'Все услуги', '/uslugi/spisok'); ?>
        </div>
    </section>

    <section class="content-block">

        <?php
        $i = 2;
        foreach ($razdels as $razdel):
            if ($razdel->depth == 2):

                        $url = [
                            'razdel/view', 'id' => $razdel->id
                        ];
                        ?>
                        <div class="mb-3">
                            <a name="<?= $razdel->id ?>"></a>
                        </div>

                        <div class="card vivify driveInBottom delay-<?= $i * 500; ?> duration-2000">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <?= Html::a(
                                           Html::img(
                                               $razdel->getThumbFileUrl(
                                                   'photo', 'col-6'),
                                               [
                                                   'class' => 'img-fluid'
                                               ]
                                        ), $url
                                    ); ?>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <?= Html::tag(
                                            'h4', Html::a(
                                            Html::encode($razdel->title), $url
                                        ),
                                            [
                                                'class' => 'card-title pt-3'
                                            ]
                                        );
                                        ?>
                                        <?= Yii::$app->formatter
                                            ->asHtml($razdel->description)
                                        ; ?>
                                    </div>

                                    <div class="reference">
                                        <?= Html::a(
                                            'подробнее',
                                            [
                                                'razdel/view', 'id' => $razdel->id
                                            ],
                                            [
                                                'class' => 'btn btn-sm btn-outline-danger'
                                            ]
                                        ); ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php
                        $i++;
                    endif;
                endforeach;
                ?>

            </section>
        </article>