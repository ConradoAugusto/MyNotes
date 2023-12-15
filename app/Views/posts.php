<?php echo $this->extend('layout') ?>

<?php echo $this->section('conteudo') ?>

<script>
    function confirma() {
        if (!confirm("Confirma a exclusão?")) {
            return false;
        }
        return true;
    }
</script>

<br>
<h1>Blog de Techs</h1>

<hr>

<?php if (count($posts) > 0) : ?>
    <?php foreach ($posts as $post) : ?>
        <div class="card my-2">
            <div class="card-header bg-primary"></div>
            <div class="card-body">
                <div class="row">
                    <div class="d-flex ">

                        <div class="col-sm-11">
                            <h3><?php echo $post['title'] ?></h3>
                        </div>
                        <div class="d-flex  gap-3">

                            <div class="col-sm-1 ">
                                <?php echo anchor('post/edit/' . $post['id'], '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-pencil-fill hoverEdit" viewBox="0 0 16 16">
  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
  </svg>') ?>

                            </div>
                            <div class="col d-flex justify-content-end">
                                <?php if (isset($post)) : ?>
                                    <?php echo anchor('post/delete/' . $post['id'],  '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="red" class="bi bi-trash hoverDelete" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
  </svg>', ['class' => 'text-white', 'onclick' => 'return confirma()']) ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo word_limiter(nl2br($post['body']), 40)  ?>
                <p class="mb-0 mt-3"><?php echo anchor('post/view/' . $post['id'], 'Leia mais...') ?></p>
            </div>
        </div>
    <?php endforeach; ?>

<?php else : ?>
    <p class="d-flex justify-content-center border border-1">Crie seu primeiro post</p>
<?php endif; ?>

<?php echo $this->endSection() ?>