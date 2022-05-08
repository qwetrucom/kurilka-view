<?php

use frontend\widgets\Addon\PanelWidget;

/* @var $this yii\web\View */
/* @var $content core\edit\entities\Page */
/* @var $parametr core\tools\components\Parametr */
/* @var $dataProvider yii\data\ActiveDataProvider */

$parametr = $this->params['parametr'];
$title    = $this->params['title'];

$this->params['parametr'] = $parametr;
$this->params['title']    = $this->title;;

?>

<?php
$this->beginContent('@frontend/views/layouts/blank.php'); ?>

<div class="page-screen">

    <div class="container">

        <?= $this->render(
            'sections/_topbar', [
                           ]
        ); ?>

        <?= $content ?>

    </div>

</div><!-- End Blog Section -->

<?php
$this->endContent(); ?>
