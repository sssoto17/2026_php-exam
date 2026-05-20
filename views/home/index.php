<?php $this->layout("layout") ?>

<main>
    <h1>Welcome</h1>
    <p>Hello <?= $this->e($name ?? "") ?></p>
    <p>Today is <?= $this->e($day ?? "") ?>.</p>
</main>