<?php

use core\edit\helpers\Shop\PriceHelper;
use yii\bootstrap5\Html;
use yii\caching\TagDependency;
use yii\helpers\HtmlPurifier;
use yii\helpers\StringHelper;

/* @var $parametr array */
/* @var $root array */
/* @var $brands array */
/* @var $products array */
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $brand core\edit\entities\Shop\Razdel */

$this->title = 'Бренды'

?>
<section class="razdel-screen">
    <div class="container">
        <article>
            <div class="title">
                <h1><?= $this->title; ?></h1>
            </div>


            <?php foreach ($brands as $brand):
                $url = [
                    'razdel/brand', 'id' => $brand->id
                ];
                $dependency = new TagDependency(
                    [
                        'tags' => [
                            'brands'
                        ]
                    ]
                )
                ?>
                <div class="mb-3">
                    <a name="<?= $brand->id ?>"></a>
                </div>

                <?php
                if (
                    $this->beginCache('razdel-index' . $brand->id, [
                                                                     'cache'      => 'yii\caching\FileCache',
                                                                     'dependency' => $dependency
                                                                 ]
                    )
                ) { ?>

                    <div class="card razdel h-100">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?= Html::a(
                                    Html::img($brand->getThumbFileUrl('photo', 'col-6'),
                                              [
                                                  'class' => 'img-fluid'
                                              ]
                                    ), $url); ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body razdel">
                                    <?= Html::tag(
                                        'h4', Html::a(
                                        Html::encode($brand->title), $url),
                                        [
                                            'class' => 'card-title'
                                        ]
                                    );
                                    ?>
                                    <?= Yii::$app->formatter
                                        ->asHtml($brand->content->description)
                                    ; ?>
                                    <?php
                                    foreach ($brand->products as $product) : ?>
                                        <?php
                                        if ($product) : ?>
                                            <div class="product-box">

                                            <?php
                                            if ($product) : ?>
                                                <?= Html::tag(
                                                    'h5', $product->title); ?>
                                                <p><?= HtmlPurifier::process(StringHelper::truncateWords(strip_tags($product->description), 20)); ?></p>
                                                <p> <span class="price">
                                            <?= PriceHelper::format($product->property->price1); ?></span>
                                                    <small>руб.</small>
                                                </p>
                                                </div>
                                            <?php
                                            endif; ?>
                                        <?php
                                        endif; ?>
                                    <?php
                                    endforeach;
                                    ?>

                                </div>
                                <div class="reference">
                                    <?= Html::a(
                                        'подробнее',
                                        [
                                            'razdel/view', 'id' => $brand->id
                                        ]
                                    ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $this->endCache();
                }
            endforeach;
            ?>

        </article>
    </div>
</section>
