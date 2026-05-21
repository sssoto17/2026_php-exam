<?php if (isset($user)): ?>
        <aside>
            <nav>
                <ul>
                    <a href="/<?= $user->getUsername() ?>">Profile</a>
                </ul>
                <ul>
                    <a href="/<?= $user->getUsername() ?>/gallery">Gallery</a>
                </ul>
            </nav>
        </aside>
    <?php endif ?>