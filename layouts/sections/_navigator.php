<?php

use frontend\widgets\NavigatorWidget;
use yii\helpers\Html;

/* @var $parametr core\tools\components\Parametr */
/* @var $id int */

$name = $parametr->getClearName();

$id ?: 1;
$class  = ($id != 2) ? 'navbar sticky-top navbar-expand-lg' : 'navbar navbar-expand-lg';
$thisId = ($id != 2) ? null : 'id = "mainNav"'

?>

<nav class="<?= $class; ?>" <?= $thisId; ?>>
    <div class='container'>
        <?= Html::a(
            $name,
            '@homepage',
            [
                'class' => 'navbar-brand',
            ]
        );
        ?>
        <button class='navbar-toggler'
                type='button'
                data-bs-toggle='collapse'
                data-bs-target='#main_nav'
                aria-expanded='false'
                aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='main_nav'>

            <?= NavigatorWidget::widget(
                [
                    'id' => $id
                ]
            );
            ?>

        </div>
        <!-- navbar-collapse.// -->
    </div>
</nav>