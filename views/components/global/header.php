    <header class="global" id="navigation">
        <nav>
            <h1 class="logo"><a href="/">Art<strong>Dash</strong></a></h1>
            <ul role="list">
                <li><a href="/">Home</a></li>
                <?php if (isset($_SESSION["user"])): ?>
                    <li><a href="/<?= $_SESSION["user"]->getUsername() ?>">Profile</a></li>
                    <li><a class="btn primary" href="/signout">Sign out</a></li>
                    <?php else: ?>
                    <li><a class="btn primary" href="/login">Sign in</a></li>
                <?php endif ?>
            </ul>
        </nav>
    </header>