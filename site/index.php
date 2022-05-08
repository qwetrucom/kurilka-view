<?php

use frontend\assets\AppAsset;
use frontend\assets\FontAwesomeAsset;
use frontend\assets\IndexAsset;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $razdels core\edit\entities\Shop\Razdel[] */
/* @var $model core\edit\entities\Admin\Information */
/* @var $mainPage core\edit\entities\Content\Page; */
/* @var $parametr core\tools\components\Parametr */
/* @var $sliders core\edit\entities\Addon\Anons[] */
/* @var $pages core\edit\entities\Content\Page[] */
/* @var $color string */
/* @var $banner array */
/* @var $razdels array */
/* @var $portfolio array */
/* @var $content string */
/* @var $id int */

$this->title = $model->name . ' | ' . strip_tags($model->title);

$this->params['parametr'] = $parametr;
$this->params['title']    = $this->title;

IndexAsset::register($this);
AppAsset::register($this);

$this->params['parametr'] = $parametr;
$this->params['title']    = $this->title;

?>

<!--#Hero Area  ###################################################################### -->
<div class="hero-area card">
    <?= Html::img(
        $model->getThumbFileUrl(
            'photo',
            'col-12'),
        [
            'class' => 'card-img',
            'alt'   => $model->title
        ]
    ); ?>

    <div class='card-img-overlay'>
        <div class='left-text'>
            <p class='vivify driveInBottom delay-500 duration-3000'>Разработка сайтов</p>
            <p class='vivify driveInBottom delay-750 duration-3000'>электронной торговли,</p>
            <p class='vivify driveInBottom delay-1000 duration-3000'>ориентированных</p>
            <p class='vivify driveInBottom delay-1500 duration-3000'>на SEO-продвижение</p>
        </div>
    </div>
</div>
<div class="alert-box"></div>
<!--#End of Hero Area  ###################################################################### -->

<?= $this->render(
    '/layouts/sections/_navigator',
    [
        'parametr' => $parametr,
        'id'       => 1
    ]
); ?>

<?= $this->render(
    '/layouts/sections/_messages',
    [
        'parametr' => $parametr
    ]
); ?>

<!--Devs Area  ###################################################################### -->

<section class="devs-area">
    <div class="container">

        <div class="gallery row row-cols-1 row-cols-md-3 g-3">
            <?php
            $i = 1;
            foreach ($razdels as $razdel) :
                {
                    if ($i == 7) {
                        break;
                    }
                    ?>
                    <div class="col">

                        <div class="card h-100 bg-dark border-secondary rounded-0 <?php
                        if ($i > 4): echo 'black-gradient'; endif; ?>">
                            <?= Html::img(
                                $razdel->getThumbFileUrl('photo', 'col-6'),
                                [
                                    'class' => 'card-img'
                                ]
                            ); ?>

                            <div class="card-img-overlay">
                                <h2 class="card-title text-end">
                                    <?= Html::a(
                                        Html::encode($razdel->name),
                                        $razdel->url
                                    ); ?></h2>
                            </div>

                            <div class="card-body">
                                <?= Html::encode($razdel->title); ?>
                            </div>
                        </div>

                    </div>
                    <?php
                    $i++;
                }
            endforeach; ?>
        </div>
    </div>
</section>

<!-- Template  Area ###################################################################### -->
<section class='template-area'>
    <div class='container header'>
        <h1 class=''>Шаблоны и
            фреймворки</h1>
    </div>
    <div class='carousel slide' data-bs-interval='3000' data-bs-ride='carousel' id='myCarousel'>
        <div class='carousel-indicators'>
            <?php
            $i = 0;
            foreach ($sliders as $slider) : ?>
                <button aria-current='true' aria-label='<?= Html::encode($slider->name); ?>'
                    <?php
                    if ($i == 0) echo 'class="active"'; ?> data-bs-slide-to='<?= $i; ?>'
                        data-bs-target='#myCarousel' type='button'></button>
                <?php
                $i++;
            endforeach;
            ?>
        </div>
        <div class='carousel-inner'>
            <?php
            $i = 1;
            foreach ($sliders as $slider) :
                {
                    $slider_url = Url::toRoute(
                        $slider->reference
                    );
                    ?>
                    <div class='carousel-item <?php
                    if ($i == 1) echo 'active'; ?> '>
                        <?= Html::img(
                            $slider->getThumbFileUrl(
                                'photo', 'col-12'
                            ), [
                                'class' => 'd-block w-100'
                            ]
                        ) ?>
                        <div class='container'>
                            <div class='carousel-caption styles-block slide-<?= $i; ?> d-none d-md-block'>
                                <h2><?= Html::encode($slider->name); ?></h2>
                                <?= Yii::$app->formatter
                                    ->asHtml($slider->description)
                                ; ?>
                                <p>  <?= Html::a(
                                        'смотреть...', $slider_url,
                                        [
                                            'class' => 'btn btn-lg btn-primary',
                                            'role'  => 'button'
                                        ]); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
            endforeach; ?>

        </div>
        <button class='carousel-control-prev' data-bs-slide='prev' data-bs-target='#myCarousel' type='button'>
            <span aria-hidden='true' class='carousel-control-prev-icon'></span>
            <span class='visually-hidden'>Назад</span>
        </button>
        <button class='carousel-control-next' data-bs-slide='next' data-bs-target='#myCarousel' type='button'>
            <span aria-hidden='true' class='carousel-control-next-icon'></span>
            <span class='visually-hidden'>Вперед</span>
        </button>
    </div>
</section>

<!--Portfolio Area ###################################################################### -->
<section class="portfolio-area">
    <div class="container header">
        <div class="row align-items-center">
            <div class="col-12 col-lg-5 d-flex flex-column align-items-lg-end parent">
                <img alt=""
                     class="box-shadow w-100 image1 vivify driveInLeft delay-500 duration-3000"
                     src="img/portfolio.jpg"
                >
                <img alt=""
                     class="box-shadow w-100 image2 vivify driveInRight delay-750 duration-3000"
                     src="img/port/kb77.jpg"
                >
            </div>
            <div class="col-lg-2 d-none d-lg-block"></div>


            <div class="col-12 col-lg-4">
                <h2 class="title"

                >Наши работы</h2>
                <div class="description"
                >Примеры некоторых работ,
                    созданных
                    за 20 лет
                </div>
                <div class="text-end m-4">
                    <a class="btn btn-danger btn-with-ball"
                       href="/portfolio"
                    >смотреть<span
                                class="btn-ball"></span>
                    </a>
                </div>

            </div>
        </div>
    </div>


    <div class="container portfolio-widget">
        <div class="row g-3">
            <?php
            foreach ($pages as $page):
                $i = 0;
                $url = Url::toRoute(
                    [
                        'page/view',
                        'id' => $page->id
                    ]
                );
                ?>

                <div class="col-1 col-lg-3 col-md-4 col-sm-6">
                    <a class="card h-100" href="<?= $url; ?>">
                        <span class="card-img d-flex align-items-center justify-content-center flex-column">
                            <span class="p-18">
                                <?=
                                Html::img($page->getThumbFileUrl(
                                    'photo', 'col-3'
                                ),
                                          [
                                              'class' => 'img-fluid',
                                          ]
                                ); ?>         
                            </span>
                        </span>
                        <div class="card-body bg-dark text-white small">
                            <?= Html::encode($page->title); ?>
                        </div>
                    </a>
                </div>
                <?php
                $i++;
            endforeach; ?>

        </div>
    </div>
</section>

<!--Conditions  Area ############################################################# -->
<section class="conditions-area">
    <div class="container">
        <h2 class="title">Наши решения</h2>

        <div class='row row-cols-1 row-cols-md-3 g-3'>
            <?php
            foreach ($model->notes as $note):
                ?>
                <div class="col">
                    <div class="feature card h-100">
                        <?= Yii::$app->formatter
                            ->asHtml($note->text)
                        ; ?>
                    </div>
                </div>
            <?php
            endforeach; ?>

        </div>
    </div>
</section>
