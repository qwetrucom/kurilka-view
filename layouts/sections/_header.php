<?php

use yii\helpers\Html;

/* @var $title string */
/* @var $this yii\web\View */
/* @var $parametr core\tools\components\Parametr */

?><!-- Control the behavior of search engine crawling and indexing -->
<!-- Settings -->
<meta charset="<?= Yii::$app->charset ?>"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="initial-scale=1.0, width=device-width, shrink-to-fit=no">

<!-- Completely opt out of DNS prefetching by setting to "off" -->
<meta http-equiv="x-dns-prefetch-control" content="on">
<!--Links Prefetch-->
<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
<link rel="preconnect" href="https://kit.fontawesome.com" crossorigin>
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<link rel="preconnect" href="https://unpkg.com" crossorigin>

<!-- Search Engines -->
<meta name="robots" content="index, follow">
<meta name="googlebot" content="index, follow">
<meta name="referrer" content="origin-when-crossorigin">
<meta name="format-detection" content="telephone=no"/>
<meta name="format-detection" content="address=no"/>
<meta name="csrf-param" content="_csrf-frontend">
<meta name="msapplication-TileColor" content="#000000">
<meta name="theme-color" content="#000000">
<meta name="google" content="notranslate">
<meta name="author" content="<?= ($parametr) ? Yii::$app->formatter
    ->asHtml($parametr?->name) : null ?>"/>
<meta name="copyright" content="(c)<?= date('Y'); ?>">
<meta http-equiv="Reply-to" content="<?= ($parametr) ? Yii::$app->formatter
    ->asHtml($parametr?->email) : ' ' ?>">
<meta name="ICBM" content="<?= strip_tags($parametr?->title); ?>">
<meta name="geo.region" content="RU-Москва">
<meta name="geo.placename" content="Москва/Россия">
<meta name="geo.position" content="<?= $parametr?->getLgt(); ?>, <?= $parametr?->getLtd(); ?>"/>
<meta name="ICBM" content="<?= $parametr?->getLgt(); ?>, <?= $parametr?->getLtd(); ?>"/>
<!--Links-->
<link rel="index" href="<?= Yii::getAlias('@homepage'); ?>">
<link rel="manifest" href="/img/manifest.webmanifest">
<!--Favicons-->
<link rel="icon" href="/img/fav/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/img/fav/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="/img/fav/favicon-512x512.png" sizes="512x512">
<link rel="apple-touch-startup-image" href="/img/fav/apple-touch-icon-152x152.png">
<link rel="icon" type="image/png" href="/img/fav/favicon-512x512.png" sizes="512x512">
<link rel="icon" type="image/png" href="/img/fav/favicon-196x196.png" sizes="196x196">
<link rel="icon" type="image/png" href="/img/fav/favicon-128x128.png" sizes="128x128">
<link rel="icon" type="image/png" href="/img/fav/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/img/fav/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/img/fav/favicon-16x16.png" sizes="16x16">

<!-- Apple Touch Icons -->
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/img/fav/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="/img/fav/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/img/fav/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="/img/fav/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/fav/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/img/fav/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/img/fav/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/img/fav/apple-touch-icon-152x152.png">

<!-- Metro Tiles -->
<meta name="application-name" content="sup">
<meta name="msapplication-TileColor" content="#000000">
<meta name="msapplication-square70x70logo" content="/img/fav/mstile-70x70.png">
<meta name="msapplication-TileImage" content="/img/fav/mstile-144x144.png">
<meta name="msapplication-square150x150logo" content="/img/fav/mstile-150x150.png">
<meta name="msapplication-wide310x150logo" content="/img/fav/mstile-310x150.png">
<meta name="msapplication-square310x310logo" content="/img/fav/mstile-310x310.png">

<meta name="skype_toolbar" content="skype_toolbar_parser_compatible">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="skype_toolbar" content="skype_toolbar_parser_compatible">

<meta property="og:type" content="website">
<meta property="og:locale" content="ru_RU">
<meta property="og:image:height" content="150">
<meta property="og:image:width" content="150">
<meta property="og:site_name" content="<?= strip_tags($parametr->name) ?? ' '; ?>">
<meta property="article:author" content="<?= strip_tags($parametr->name) ?? ' '; ?>">

<?= Html::csrfMetaTags(); ?>
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<title><?= Html::encode($title); ?></title>
