<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/globalStyle.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/reset.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Blog</title>


</head>

<body class="text-light">
    <header class="bgBlue w-100">
        <nav class="container d-flex justify-content-center align-items-baseline ">
            <a class="text-white link-underline link-underline-opacity-0 fs-1 text" href="<?php echo base_url() ?>">Meu Blog</a>

            <div class="d-flex justify-content-center align-items-center">
                <ul class="d-flex justify-content-center align-items-center gap-2">
                    <a class="text-white  link-underline link-underline-opacity-0 hoverMenu" href="<?php echo base_url() ?>">Home</a>
                    <a class="text-white link-underline link-underline-opacity-0 hoverMenu" href="<?php echo base_url('post/create') ?>">New Post</a>
                </ul>
            </div>
        </nav>

    </header>
    <main>

        <div class="container text-black">
            <?php echo $this->renderSection('conteudo') ?>

        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>