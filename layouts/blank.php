<?php
/* @var $this View */
/* @var $content string */

/* @var $parametr core\tools\components\Parametr */

use frontend\assets\AppAsset;
use frontend\assets\TopJsAsset;
use frontend\widgets\NavigatorWidget;
use yii\bootstrap5\Html;
use yii\web\View;

AppAsset::register($this);
TopJsAsset::register($this);

$parametr = $this->params['parametr'];
$title    = $this->params['title'];

$this->params['parametr'] = $parametr;
$this->params['title']    = $title;

?>
<?php
$this->beginContent('@frontend/views/layouts/main.php'); ?>

<!--Navigator ###################################################################### -->

<?= $this->render(
    'sections/_navigator',
    [
        'parametr' => $parametr,
        'id' => 2
    ]
); ?>

<div class="clearfix"></div>

<!-- End of Navigator ###################################################################### -->


<!-- ======= Breadcrumbs ======= -->
<section class='breadcrumbs'>
    <div class='container'>
            <?= $this->render(
                'sections/_topbar',
                [
                    'parametr' => $parametr
                ]
            ); ?>
    </div>
</section>
<!-- End Breadcrumbs -->

<!-- Main wrapper of the page ##########################################-->

<main id="wrapper">
    

    <?= $content ?>


</main>
<!--//- End Wrapper ####################################################-->



<?php
$this->endContent(); ?>
