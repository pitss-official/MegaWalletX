<?php namespace Frontend;
use Middleware\Auth; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php View::component('global.meta') ?>
    <title><?=env('name')?></title>
    <link rel="stylesheet" href="/public/css/fa.all.min.css">
    <link rel="stylesheet" href="/public/css/adminlte.min.css">
    <link rel="stylesheet" href="/public/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<noscript>
    You need to enable JavaScript to run this react app - <?=env('name')?>.
</noscript>
<div id="root">

</div>
<script>

    const user=<?= json_encode(Auth::user())?>;
    const app={
        name:"<?=env('name')?>",
    }
</script>
<script src="/public/js/others/jquery.min.js"></script>
<script src="/public/js/others/bootstrap.bundle.min.js"></script>
<script src="/public/js/others/adminlte.min.js"></script>
<script src="/public/js/others/axios.js"></script>
<script src="/public/app.js" defer></script>
</body>
</html>