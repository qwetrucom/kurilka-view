<?php

/* @var $content array */
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<?php
$this->beginContent('@frontend/views/layouts/blank.php'); ?>

<div class="search-screen">

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
