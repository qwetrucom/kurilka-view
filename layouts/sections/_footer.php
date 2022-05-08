<?php

use yii\bootstrap5\Html;
use yii\helpers\Url;

?>

<!-- Start Footer #################################################################################################################-->
<div class="clearfix"></div>

<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>kb77<span>.</span></h3>
                    <p>
                        <strong>Email:</strong> info@kb77.ru<br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4></h4>
                    <ul>

                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">

                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <div class="additional-links mt-3">

                        <?php if (Yii::$app->user->isGuest) : ?>
                            <?= Html::a(
                                '<i class="fas fa-sign-in-alt"></i>', '/login'); ?>
                        <?php else : ?>
                            <?= Html::a(
                                '<i class="fas fa-tasks"></i>',
                                Url::to('@backpage'),
                                [
                                    'class' => 'btn btn-default btn-flat'
                                ]
                            ); ?>

                            <?= Html::a(
                                '<i class="fas fa-desktop"></i>',
                                [
                                    '/cabinet'
                                ],
                                [
                                    'class' => 'btn btn-default btn-flat'
                                ]
                            ); ?>
                            <?= Html::a(
                                '<i class="fas fa-sign-out-alt"></i>',
                                [
                                    '/logout'
                                ],
                                [
                                    'class' => 'btn btn-default btn-flat'
                                ]
                            ); ?>
                        <?php endif; ?>
                    </div>

                </div>

            </div>
        </div>
    </div>

</footer><!-- End Footer -->