<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $this->renderSection('title') ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('fontawesome/css/all.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('ionicons/css/icon.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>">

    <?= $this->renderSection('pageStyles') ?>
</head>

<body class="hold-transition login-page">

    <main role="main" class="container">
        <?= $this->renderSection('main') ?>
    </main>

<?= $this->renderSection('pageScripts') ?>
</body>
</html>
