<?php

use core\edit\helpers\Shop\PriceHelper;
use yii\bootstrap5\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\StringHelper;

/* @var $parametr array */
/* @var $root array */
/* @var $razdels array */
/* @var $products array */
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $razdel core\edit\entities\Shop\Razdel */

$this->title = Yii::$app->formatter
    ->asHtml($root->title);

$this->params['breadcrumbs'][] = [
    'label' => $productTitle, 'url' => [
        'index'
    ]
];
$this->params['breadcrumbs'][] = 'Список';
$this->params['razdel']        = $root;
$this->params['parametr']      = $parametr;
$this->params['title']         = $this->title;
?>

<?php
foreach ($razdels as $razdel):
    if ($razdel->depth > 1):
        $url = [
            'razdel/view', 'id' => $razdel->id
        ];
        ?>
        <div class="card razdel">
            <div class="card-header">
                <?= Html::tag(
                    'h4', Html::a(
                    Html::encode($razdel->title), $url),
                    [
                        'class' => 'card-title pt-3'
                    ]
                );
                ?>
            </div>

            <div class="card-body razdel">
                <?php
                foreach ($razdel->products as $product) : ?>
                    <?php
                    if ($product->isActive()) : ?>
                        <?php
                        if ($product):
                            $url = [
                                '/razdel/product', 'id' => $product->id
                            ];
                            ?>
                            <div class="product-box row">
                                <div class="col-md-3">
                                    <?= Html::a(
                                        Html::img($product->mainPhoto->getThumbFileUrl('file', 'col-3'),
                                                  [
                                                      'class' => 'img-fluid'
                                                  ]
                                        ), $url); ?>
                                </div>

                                <div class="col-md-9">
                                    <?= Html::a(
                                        Html::tag(
                                            'h5', $product->title), $url); ?>
                                    <p><?= HtmlPurifier::process(StringHelper::truncateWords(strip_tags($product->description), 20)); ?></p>
                                    <p> <span class="price">
                                            <?= PriceHelper::format($product->property?->price1); ?></span>
                                        <small>руб.</small>
                                    </p>
                                    <div class="reference">
                                        <?= Html::a(
                                            'подробнее oб услуге "' . $product->title . '"', $url,
                                            [
                                                'class' => 'btn btn-sm btn-outline-danger'
                                            ]
                                        ); ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endif; ?>
                    <?php
                    endif; ?>
                <?php
                endforeach;
                ?>
            </div>
            <div class="card-footer bg-secondary reference">
                <?= Html::a(
                    'подробнее oб услугах в разделе ' . $razdel->name,
                    [
                        'razdel/view', 'id' => $razdel->id
                    ]
                ); ?>
            </div>
        </div>
    <?php endif;
endforeach;
?>
