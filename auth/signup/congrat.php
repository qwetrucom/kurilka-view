<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\core\forms\Auth\SignupForm */

use yii\helpers\Url;

$this->registerLinkTag(
    [
        'rel' => 'canonical', 'href' => Url::canonical()
    ]
);

$this->title                   = 'Регистрация пройдена успешно';
$this->params['breadcrumbs'][] = $mainTitle;

?>
<?php
$this->beginContent('@frontend/views/layouts/auth.php'); ?>
    <section class="sign-in">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="signin-image">
                        <img alt="sing up image" class="img-fluid float-end" src="img/pix/cabinet_4.jpg">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="signin-content">
                        <div class="prescript-block">
                            <h2>Регистрация пройдена успешно</h2>
                            <p>Для завершения регистрации проверьте указанный Вами e-mail. <br>
                                В пришедшем от нас письме нажмите на ссылку и становитесь полноценным участником проекта
                                Q!
                            </p>
                            <p>Если письма нет в течение 10 минут, проверьте папку "Спам". </p>
                        </div>

                        <hr>
                        <div class="signin-reference text-center">
                            <a class="btn btn-primary btn-sm"
                               href="/auth/auth/login">войти в Личный кабинет</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
$this->endContent(); ?>