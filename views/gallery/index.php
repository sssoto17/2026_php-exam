<?php $this->layout("layout", ["title" => "Gallery"]) ?>

<main>
    <p>Grid view of artwork</p>
    <section>
        <?php foreach($users as $user): ?>
            <p><?= $this->e($user->getFirstName()) ?></p>
            <p><?= $this->e($user->getLastName()) ?></p>
            <p><?= $this->e($user->getEmail()) ?></p>
        <?php endforeach; ?>
    </section>
</main>