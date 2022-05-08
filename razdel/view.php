<?php

/* @var $this yii\web\View */
/* @var $parametr core\tools\components\Parametr */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $parametr core\tools\components\Parametr */
/* @var $form frontend\forms\OrderForm */

/* @var $razdel core\edit\entities\Shop\Razdel */

use core\edit\helpers\Service\BreadCrumbHelper;
use core\tools\components\Constant;
use frontend\widgets\Addon\AnonsWidget;
use frontend\widgets\LastPanelWidget;
use frontend\widgets\PanelWidget;
use frontend\widgets\Shop\RazdelsWidget;
use frontend\widgets\Shop\TagsWidget;
use yii\bootstrap5\Html;

$mainTitle   = $parametr->getRazdel();
$this->title = $razdel->name;

$this->params['breadcrumbs'][] = BreadCrumbHelper::index($mainTitle);

foreach ($razdel->parents()->all() as $parent) {
    if ($parent->depth > Constant::THIS_FIRST_NODE) {
        $this->params['breadcrumbs'][] = [
            'label' => $parent->name,
            'url'   => [
                'view',
                'id' => $parent->id
            ]
        ];
    }
}
$this->params['breadcrumbs'][] = $razdel->name;

$this->params['active_razdel'] = $razdel;
$this->params['razdel']        = $razdel;
$this->params['parametr']      = $parametr;
$this->params['title']         = $this->title;

?>

<div class='main-image-block'>
    <?php
    if ($razdel->photo) : ?>
        <section class="main-image-block">
            <?= Html::img(
                $razdel->getThumbFileUrl(
                    'photo', 'col-12'),
                [
                    'class' => 'img-fluid',
                    'alt'   => $razdel->name,
                ]
            ); ?>
        </section>
    <?php
    endif; ?>
</div>

<div class='row'>

    <article class='col-lg-9 order-lg-2 mb-3'>
        <section class='title'>
            <h1>
                <?= Html::encode($razdel->title); ?>
            </h1>
        </section>

        <section class='content-block'>

            <section class='description-block'>
                <?= $this->render(
                    '_subrazdels',
                    [
                        'razdel' => $razdel,
                    ]
                ); ?>
            </section>

            <!--контент-->
            <div class="content-body">
                <?= Yii::$app->formatter
                    ->asHtml(
                        $razdel->text,
                        [
                            'Attr.AllowedRel'      => [
                                'nofollow'
                            ],
                            'HTML.SafeObject'      => true,
                            'Output.FlashCompat'   => true,
                            'HTML.SafeIframe'      => true,
                            'URI.SafeIframeRegexp' => '%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
                        ]
                    )
                ; ?>
                <hr>
                <h5 class="text-firm-color"><?= $razdel->title; ?></h5>
                <?= $this->render(
                    '_product',
                    [
                        'dataProvider' => $dataProvider,
                        'model'        => $form,
                        'parametr'     => $parametr,
                    ]
                ); ?>

            </div>

        </section>
    </article>

    <!--################# Aside #############################################-->

    <aside class='col-lg-3 order-lg-1 pr-1'>
        <section class='aside-block'>
            <div class='title'>
                <h4>Категории товаров</h4>
            </div>
            <?= RazdelsWidget::widget(
                [
                    'active' => $this->params['active_razdel'] ?? null
                ]
            ) ?>
        </section>
        <section class='aside-block'>
            <div class='title'>
                <h4>Метки сайта</h4>
            </div>
            <div class='card'>
                <div class='card-body'>
                    <?= TagsWidget::widget(); ?>
                </div>
            </div>

        </section>
        <section class='aside-block'>
            <?= AnonsWidget::widget(); ?>
        </section>
        <section class='aside-block'>
            <?= ($razdel->content?->panels)
                ?
                PanelWidget::widget(
                    [
                        'panels' => $razdel->content->panels,
                    ]
                )
                :
                LastPanelWidget::widget(
                    [
                        'limit' => '1'
                    ])
            ?>
        </section>
    </aside>


    <!--################# End of Aside ######################################-->

</div>