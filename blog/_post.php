<?php

/* @var $this yii\web\View */

/* @var $model core\edit\entities\Blog\Post */

use yii\bootstrap5\Html;
use yii\helpers\Url;

$url = Url::to(['post', 'slug' => $model->slug]);
?>

<?php
if ($model->mainPhoto): ?>
    <div class="row pb-3 animate-box" data-animate-effect="fadeInLeft">
        <div class="col-md-4 blog-img">
            <?= Html::a(
                Html::img(
                    $model->mainPhoto
                        ->getThumbFileUrl(
                            'file',
                            'col-3'
                        ),
                    [
                        'class' => 'img-fluid'
                    ]),
                $url) ?>
        </div>
        <div class="col-md-8 content-body">
            <h4>
                <?= Html::a($model->name, $url) ?>
            </h4>
            <?= Yii::$app->formatter
                ->asHtml($model->description) ?>
            <hr>
            <?= Html::a('читать...', $url) ?>
        </div>
    </div>
<?php
else: ?>
    <div class="col-md-12 pb-3 animate-box" data-animate-effect="fadeInLeft">
        <h4>
            <?= Html::a($model->name, $url) ?>
        </h4>
        <p>
            <?= Yii::$app->formatter
                ->asHtml($model->description) ?>
        </p>
        <hr>
        <?= Html::a('читать...', $url) ?>
    </div>
<?php
endif; ?>