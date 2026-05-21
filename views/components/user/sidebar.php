<?php if (isset($user)): ?>
        <aside>
            <nav>
                <ul>
                    <a href="/<?= $user->getUsername() ?>">Profile</a>
                </ul>
                <ul>
                    <a href="/<?= $user->getUsername() ?>/gallery">Gallery</a>
                </ul>
                <?php if ($_SESSION["user"]->getId() === $user->getId()): ?>
                    <ul>
                        <a href="/gallery/new">Add new artwork</a>
                    </ul>
                <?php endif ?>
            </nav>
        </aside>
    <?php endif ?>