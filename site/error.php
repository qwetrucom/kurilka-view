<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $parametr core\tools\components\Parametr */

/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Ошибка " . nl2br(Html::encode($name));

$parametr = Yii::$app->parametr;

$this->params['breadcrumbs'][] = nl2br(Html::encode($name));

$this->registerLinkTag(
    [
        'rel' => 'canonical', 'href' => Url::canonical()
    ]
);

$this->params['parametr'] = $parametr;
$this->params['title']    = $this->title;

?>

<?php
$this->beginContent('@frontend/views/layouts/blank.php'); ?>
<section class="error-screen">

    <div class="container">
        <div class="col-md-9 title">
            <h1><?= Html::encode($this->title); ?></h1>
        </div>
        <div class="row">
            <article class="col-md-9">
                <div class="block-padding">
                    <div class="alert alert-danger">
                        <?= nl2br(Html::encode($message)); ?>
                    </div>
                    <div class="page-error">
                        <p>
                            Сервер не может обработать Ваш запрос. Вероятно случилась какая-то странная ошибка.
                        </p>
                        <p>
                            Пожалуйства вернитесь на предыдущую страницу.
                        </p>
                    </div>
                </div>
            </article>

            <aside id="refer-block" class="col-md-3 hidden-sm">

            </aside>
        </div>
    </div>
</section>
