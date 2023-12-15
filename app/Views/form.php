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

<div class="card  mt-3">

    <div class="card-header bg-secondary text-white">
        <div class="row">
            <div class="col">
                <?php echo $title; ?>
            </div>

            <div class="col d-flex justify-content-end">
                <?php if (isset($post)) : ?>
                    <?php echo anchor('post/delete/' . $post['id'],  'Delete', ['class' => 'text-white', 'onclick' => 'return confirma()']) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="card-body">
        <?php echo form_open('post/store') ?>
        <div class="form-group">
            <label class="mb-2 mt-2" for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="<?php echo isset($post['title']) ? $post['title'] : set_value('title'); ?>">
            <?php if (!empty($errors['title'])) : ?>
                <div class="alert alert-danger mt-2"><?php echo esc($errors['title']); ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label class="mb-2 mt-2" for="slug">Slug</label>
            <input name="slug" id="slug" class="form-control" value="<?php echo isset($post['slug']) ? $post['slug'] : set_value('slug'); ?>">
            <?php if (!empty($errors['slug'])) : ?>
                <div class="alert alert-danger mt-2"><?php echo esc($errors['slug']); ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label class="mb-2 mt-2" for="body">Body</label>
            <textarea name="body" id="body" class="form-control textbox"><?php echo isset($post['body']) ? $post['body'] : set_value('body'); ?></textarea>
            <?php if (!empty($errors['body'])) : ?>
                <div class="alert alert-danger mt-2"><?php echo esc($errors['body']); ?></div>
            <?php endif; ?>
        </div>

        <div class="form-group mt-3">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
        <input type="hidden" name="id" value="<?php echo isset($post) ? $post['id'] : set_value('id') ?>">
        <?php echo form_close(); ?>
    </div>
</div>

<?php echo $this->endSection() ?>