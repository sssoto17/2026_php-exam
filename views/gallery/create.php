<?php $this->layout("layout", ["title" => "Create artwork"]) ?>

<main>
    <section class="flow-space container">
        <h2>Add new artwork</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="flex">
                <div>
                    <label for="art_title">Title</label>    
                    <input id="art_title" name="title" value="<?= $this->e($data["title"] ?? "") ?? "" ?>" />
                </div>
                <input name="img" type="file" accept="image/*" />
            </div>
            <div>
                <label for="art_description">Description</label>    
                <textarea id="art_description" name="description" value="<?= $this->e($data["description"] ?? "") ?? "" ?>" ></textarea>
            </div>
                <div>
                    <label for="art_category">Category</label>    
                    <input id="art_category" name="category" value="<?= $this->e($data["category"] ?? "") ?? "" ?>" />
                </div>
                <div class="flex">
                    <label class="small" for="art_is_private">Make private</label>    
                    <input id="art_is_private" name="is_private" type="checkbox" value="<?= $this->e($data["is_private"] ?? "") ?? "" ?>" />
                </div>
            <?php if (isset($error)): ?>
            <div>
                <small class="error"><?= $error ?></small>
            </div>
            <?php endif ?>
        <button class="btn secondary">Publish</button>
        </form>
    </section>
</main>