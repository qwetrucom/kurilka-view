<?php

use frontend\widgets\Addon\LastPanelWidget;
use frontend\widgets\Shop\RazdelsWidget;
use yii\bootstrap5\Html;

/* @var $this yii\web\View */
/* @var $parametr core\tools\components\Parametr */
/* @var $post core\edit\entities\Blog\Post */

$this->params['parametr']      = $parametr;
$this->params['title']         = $this->title;

$this->title = $post->title;

$this->params['breadcrumbs'][] = [
        'label' => 'Блог', 
        'url' => ['index']
];

$this->params['breadcrumbs'][] = $this->title;

$tagLinks = [];

foreach ($post->tags as $tag) {
    $tagLinks[] = Html::a(Html::encode($tag->name), ['tag', 'slug' => $tag->slug]);
}
?>

<div class="row">
    <div class="col-lg-6">
        <div class="about-img" style="background-image: url(/img/bg/blog_03.jpg);">
            <div class="about-img-2 animate-box" data-animate-effect="fadeInRight"
                 style="background-image: url(
                 <?php if ($post->mainPhoto): ?>
                     <?= $post->mainPhoto->getThumbFileUrl('file', 'col-3') ?>
                 <?php else: ?>
                         /img/bg/blog_18.jpg
                 <?php endif; ?>);">

            </div>
        </div>
        <?php foreach ($post->photos as $i => $photo): ?>
            <?php if ($i != 0): ?>
                <li class="image-additional">
                    <a class="thumbnail"
                       href="<?= $photo->getThumbFileUrl('file', 'col-12') ?>"
                       title="">
                        <img src="<?= $photo->getThumbFileUrl('file', 'col-3') ?>"
                             alt=""/>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
        <aside id="refer-block" class="d-none d-lg-block">
            <div class="animate-box" data-animate-effect="fadeInRight">
                <?= RazdelsWidget::widget(
[
                    'active' => null,
                ]
); ?>
            </div>
            <div class="animate-box" data-animate-effect="fadeInRight">
                <?=
                LastPanelWidget::widget(
[
                    'limit' => '1',]);
                ?>
            </div>
        </aside>
    </div>

    <div class="col-lg-6 animate-box" data-animate-effect="fadeInRight">
        <div class="about-desc">
            <?= Html::tag('span', Html::tag('small', Yii::$app->formatter->asDatetime($post->created_at))); ?>
            <?= Html::tag('span', 'Блог', ['class' => 'heading-meta']
); ?>
            <?= Html::tag('h1', $post->name) ?>
        </div>

        <div class="content-body">
            <?= Yii::$app->formatter->asHtml($post->text, [
                'Attr.AllowedRel' => ['nofollow'],
                'HTML.SafeObject' => true,
                'Output.FlashCompat' => true,
                'HTML.SafeIframe' => true,
                'URI.SafeIframeRegexp' => '%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
            ]
); ?>
            <div class="next-page-body">

            </div>
            <hr class="style4">
            <p>метки: <?= implode(', ', $tagLinks) ?></p>
        </div>
    </div>
</div>
<div class="d-lg-none d-md-block">
    <div class="row">
        <div class="col-md-6 animate-box" data-animate-effect="fadeInRight">
            <?=
            LastPanelWidget::widget(
[
                'limit' => '1',
            ]);
            ?>
        </div>
    </div>
</div>
