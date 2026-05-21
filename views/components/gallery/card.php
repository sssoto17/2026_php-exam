<?php if (isset($artwork)): ?>
    <article class="card">
        <img src="<?= $this->e($artwork->getPath()) ?>" alt="<?= $this->e($artwork->getTitle()) ?>">
        <div class="filter"></div>
        <h4>
            <a href="gallery/<?= $this->e($artwork->getSlug()) ?>"><?= $this->e($artwork->getTitle()) ?></a></h4>
    </article>
<?php endif ?>