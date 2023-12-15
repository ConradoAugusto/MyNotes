<?php echo $this->extend('layout') ?>
<?php echo $this->section('conteudo') ?>

<div class="card mt-5">
    <div class="card-body">
        <h1><?php echo $post['title'] ?></h1>
        <?php echo nl2br($post['body']) ?>
        <p class="mt-3"><?php echo anchor(base_url(), 'Voltar') ?></p>
    </div>
</div>

<did class="card mt-4">
    <div class="card-header bg-secondary text-white">
        Comentários
    </div>
    <div class="card-body">
        <?php if (count($comentarios) > 0) : ?>
            <?php foreach ($comentarios as $comentario) : ?>
                <div class="card my-3">
                    <div class="card-body">
                        <p class="small">Comentário feito em: <?php echo date('d/m/Y H:i:s', strtotime($comentario['created_at'])) ?> </p>
                        <h4><?php echo $comentario['comentario'] ?></h4>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Seja o primeiro a comentar</p>
        <?php endif; ?>
        <div class="card">
            <div class="card-body">
                <?php echo form_open('comentario/store') ?>
                <div class="form-group">
                    <textarea class="form-control" name="comentario" id="comentario" cols="30" rows="3"></textarea>
                    <?php if (!empty($errors['comentario'])) : ?>
                        <div class="alert alert-danger mt-2"><?php echo $errors['comentario'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success mt-2">Enviar</button>
                </div>
                <input type="hidden" name="id_post" value="<?php echo $post['id'] ?>">
                <?php echo form_close(); ?>

            </div>
        </div>


    </div>
</did>

<?php echo $this->endSection() ?>