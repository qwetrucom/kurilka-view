<?php

/* @var $this View */
/* @var $content string */

/* @var $parametr core\tools\components\Parametr */

use yii\web\View;

$parametr = $this->params['parametr'];
$title    = $this->params['title'];

$this->params['parametr'] = $parametr;

?>
<?php
$this->beginContent('@frontend/views/layouts/blank.php'); ?>

<div class="cabinet-screen">

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
