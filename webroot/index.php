<?php
    $projects = [
        [
            'name'      => 'Матрица в3',
            'complete'  => '90',
            'date'      => '25/06/2021'
        ],
        [
            'name'      => 'Майндбокс доработка',
            'complete'  => '50',
            'date'      => '28/06/2021'
        ],
        [
            'name'      => 'Ответ хранение в3',
            'complete'  => '98',
            'date'      => '12/07/2021'
        ],
        [
            'name'      => 'РСД в2',
            'complete'  => '10',
            'date'      => '30/07/2021'
        ],
        [
            'name'      => 'Внедрение БПК 3.0',
            'complete'  => '60',
            'date'      => '1/01/2022'
        ]
    ];
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TPT6GSB');</script>
    <!-- End Google Tag Manager -->
    <title>Дэшборд отдела разработки Мечта</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="css/theme-v1.min.css" rel="stylesheet" media="all">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TPT6GSB"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="site-wrapper">
        <header>
            <h1>Дэшборд отдела разработки Мечта</h1>
        </header>
        <main>
            <section>
                <img src="images/vision-01.png" alt="Дэшборд отдела разработки Мечта">
                <a href="team.php"><img src="images/team-01.png" alt="Дэшборд отдела разработки Мечта"></a>
            </section>
            <section class="projects">
                <h2>Проекты</h2>
                <?php foreach ($projects as $project): ?>
                    <div class="projects-item">
                        <div class="projects-item-name"><?= $project['name'] ?></div>
                        <div class="projects-item-date"><?= $project['date'] ?></div>
                    </div>
                <?php endforeach; ?>
            </section>
        </main>
    </div>
</body>
</html>