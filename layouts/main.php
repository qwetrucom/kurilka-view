<?php
/* @var $this yii\web\View */
/* @var $content string */
/* @var $parametr core\tools\components\Parametr */

$parametr = $this->params['parametr'];
$title    = $this->params['title'];

?><?php
$this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="<?= Yii::$app->language ?>" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="<?= Yii::$app->language ?>" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="<?= Yii::$app->language ?>">
<!--<![endif]-->
<head>
    <?= $this->render(
        'sections/_header',
        [
            'parametr' => $parametr,
            'title'    => $title,
        ]
    ); ?>
    <?php
    $this->head() ?>
</head>

<body>
<?php
$this->beginBody() ?>



    <?= $content ?>

 
<?= $this->render(
    'sections/_footer',
    [
        'parametr' => $parametr
    ]
); ?>

    <div class='arrow-block'>
        <button onclick='topFunction()' id='myBtn' title='Вверх'>
            <i class='fa-solid fa-circle-arrow-up'></i>
        </button>
    </div>


<?php
$this->endBody() ?>
<?php
if ($parametr->isRemote()): ?>
<!--//- Counters #############################################################-->

    <?= $this->render(
        'sections/_matomo',
    );
    $this->render('sections/_counts', [
        'parametr' => $parametr
    ]); ?>

<!--//- End Counters #######################################################-->

<?php
endif; ?>

</body>
</html>

<?php
$this->endPage() ?>