<?php $this->layout("layout", ["title" => "Gallery"]) ?>

<main>
    <?php if (isset($user)): ?>
        <section class="sidebar">
            <?= $this->insert("user::sidebar", ["user" => $user]) ?>
            <article>
                <h2><?= $this->e($_SESSION["user"]->getUsername()) ?></h2>
                <h3>Gallery</h3>
                <section class="gallery">
                    <?php if (isset($gallery)): ?>
                        <?php foreach($gallery as $artwork): ?>
                            <?= $this->insert("gallery::card", ["artwork" => $artwork]) ?>
                        <?php endforeach; ?>
                    <?php endif ?>
                </section>
            </article>            
        </section>
    <?php endif ?>
</main>