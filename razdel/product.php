<?php

/* @var $this yii\web\View */
/* @var $parametr core\tools\components\Parametr */
/* @var $product core\edit\entities\Shop\Product\Product */

/* @var $cartForm common\core\forms\Shop\AddToCartForm */

use core\edit\helpers\Shop\PriceHelper;
use frontend\assets\MagnificPopupAsset;
use yii\helpers\Html;

$this->title = $product->title;

$this->params['breadcrumbs'][] = [
    'label' => $parametr->mainLabel, 'url' => [
        'index'
    ]
];
foreach ($product->razdel->parents as $parent) {
    if (!$parent->getRoot()) {
        $this->params['breadcrumbs'][] = [
            'label' => $parent->name, 'url' => [
                'view',
                'id' => $parent->id
            ]
        ];
    }
}
$this->params['breadcrumbs'][] = [
    'label' => $product->razdel->name, 'url' => [
        'view',
        'id' => $product->razdel->id
    ]
];
$this->params['breadcrumbs'][] = Yii::$app->formatter
    ->asHtml($product->title);
$this->params['active_razdel'] = $product->razdel;
$this->params['razdel']        = $product->razdel;
$this->params['parametr']      = $parametr;
$this->params['title']         = $this->title;

MagnificPopupAsset::register($this);
?>

<?php
if ($this->beginCache(
    'razdel-product' . $product->id,
    [
        'cache'      => 'yii\caching\FileCache',
        'dependency' => [
            'class' => 'yii\caching\TagDependency',
            'tags'  => [
                'product' . $product->id,
            ],
        ],
    ]
)) { ?>

<?php
if ($product->photos) : ?>
<div class="main-image-block">
    <ul class="thumbnails">
        <?php
        foreach ($product->photos as $i => $photo) : ?>
            <?php
            if ($i == 0) : ?>
                <li>
                    <a class="thumbnail"
                       href="<?= $photo->getThumbFileUrl('file', 'col-12'); ?>">
                        <img src="<?= $photo->getThumbFileUrl('file', 'col-9'); ?>"
                             alt="<?= Html::encode($product->name); ?>"
                             class="img-fluid"/>
                    </a>
                </li>
            <?php
            else : ?>
                <li class="image-additional">
                    <a class="thumbnail"
                       href="<?= $photo->getThumbFileUrl('file', 'col-12'); ?>"
                       title="">
                        <img src="<?= $photo->getThumbFileUrl('file', 'col-3'); ?>"
                             alt=""/>
                    </a>
                </li>
            <?php
            endif; ?>
        <?php
        endforeach; ?>
    </ul>
    <?php
    endif; ?>

    <div class="block-padding">
        <div class="price-title">
            <h5>Цена:</h5>
        </div>
        <div class="price-body">
            <span class="price"><?= PriceHelper::format($product->property->price1); ?></span>
            <small>руб.</small>
        </div>
        <hr class="style1">
        <ul class="list-unstyled">
            <?php
            if ($product->brand) : ?>
                <li>Марка:
                    <?= Html::a($product->brand->name, [
                                                         'brand', 'id' => $product->brand->id
                                                     ]
                    ); ?>
                </li>
            <?php
            endif; ?>
            <li>
                Метки:
                <?php
                foreach ($product->tags as $tag) : ?>
                    <?= Html::a($tag->name, [
                                              'tag', 'id' => $tag->id
                                          ]
                    ); ?>,
                <?php
                endforeach; ?>
            </li>
        </ul>
    </div>
    <div class="block-padding">
        <?= Yii::$app->formatter
            ->asHtml(
                $product->text,
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
        Другие услуги в разделе "<?= Html::a($product->razdel->title, [
                                                                        'view',
                                                                        'id' => $product->razdel_id
                                                                    ]
        ); ?>"
    </div>
    <?php
    if ($parametr->advert) : ?>
        <div class="block-padding">
            <?= Yii::$app->formatter
                ->asHtml($parametr->advert)
            ; ?>
        </div>
    <?php
    endif; ?>

    <?php
    $this->endCache();
    }
    ?>

    <?php
    $js = <<<EOD
$('.thumbnails').magnificPopup({
    type: 'image',
    delegate: 'a',
    gallery: {
        enabled:true
    }
});
EOD;
    $this->registerJs($js); ?>
