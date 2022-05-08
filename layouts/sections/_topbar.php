<?php

use yii\bootstrap5\Breadcrumbs;

?>

<!-- ##== Breadcrumbs Section == -->
<div class="breadcrumb-widget">
    <?= Breadcrumbs::widget(
        [
            'homeLink'     => [
                'label' => ('Главная'), 
                'url' => '@homepage'
            ],
            'itemTemplate' => "<li> {link}</li>\n",
            'links'        => isset($this->params['breadcrumbs']
            ) ? $this->params['breadcrumbs'] : [],
            'options'      => [
                'class' => 'd-flex justify-content-end',
            ],
        ]
    ); ?>
</div>

<?= $this->render(
    '_messages'); ?>
