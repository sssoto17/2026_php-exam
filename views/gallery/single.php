<?php $this->layout("layout") ?>

<main>
    <?php if (isset($artwork) and isset($user)): ?>
        <section>
            <h2><?= $this->e($artwork->getTitle()) ?></h2>
            <h3>by <?= $this->e($user->getUsername()) ?></h3>
            <img src="<?= $this->e($artwork->getPath()) ?>" alt="<?= $this->e($artwork->getTitle()) ?>">
        </section>
    <?php endif ?>
</main>