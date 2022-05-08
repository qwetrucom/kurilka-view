<?php
/* @var $parametr core\tools\components\Parametr */
?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []
            ).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(<?= $parametr->metrica ?>, "init", {
        id:<?= $parametr->metrica ?>,
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true
    });
</script>
<noscript>
    <div>
        <img src="https://mc.yandex.ru/watch/<?= $parametr->metrica ?>" style="position:absolute; left:-9999px;"
             alt=""/>
    </div>
</noscript>
<!-- /Yandex.Metrika counter -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-<?= $parametr->analytics ?>"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'UA-<?= $parametr->analytics ?>-1');
</script>
