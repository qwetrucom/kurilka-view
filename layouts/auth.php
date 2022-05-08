<?php

/* @var $this View */
/* @var $parametr core\tools\components\Parametr */

/* @var $content string */

use yii\web\View;

$parametr = $this->params['parametr'];
$title    = $this->params['title'];

$this->params['parametr'] = $parametr;
$this->params['title']    = $this->title;
?>
<?php
$this->beginContent('@frontend/views/layouts/blank.php'); ?>

<!--Authentication-->
<div class="auth-screen">

    <div class="container">
        <?= $this->render(
            'sections/_topbar', [
                           ]
        ); ?>

        <?= $content ?>
    </div>

</div>

<?php
$this->endContent(); ?>
