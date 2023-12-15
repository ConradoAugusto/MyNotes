<?php echo $this->extend('layout') ?>

<?php echo $this->section('conteudo') ?>

<div class="card mt-3">
    <div class="card-header bg-success text-white">
        Mensagem
    </div>
    <div class="card-body">
        <?php $mensagem = session()->getFlashdata('mensagem'); ?>

        <?php if (!empty($mensagem)) :  ?>
            <p><?php echo $mensagem ?></p>

        <?php else :  ?>
            <p class="mt-3 m-3">Seu post foi salvo com sucesso</p>

        <?php endif; ?>

        <p class="mt-3 m-3"><?php echo anchor(base_url(), 'Página Inicial') ?></p>

    </div>
</div>

<?php echo $this->endSection() ?>