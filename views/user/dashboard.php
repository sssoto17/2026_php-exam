<?php $this->layout("layout", ["title" => $user->getUsername() ?? ""]) ?>

<main>
    <h1>User profile</h1>
    <p><?= $this->e($user->getUsername()) ?></p>
</main>