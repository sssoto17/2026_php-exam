<?php $this->layout("layout", ["title" => isset($user) ? $user->getUsername() : ""]) ?>

<main>
    <?php if (isset($user)): ?>
        <section class="sidebar">
            <?= $this->insert("user::sidebar", ["user" => $user]) ?>
            <article>
                <h2><?= $this->e($_SESSION["user"]->getUsername()) ?></h2>
            </article>
        </section>
    <?php endif ?>
</main>