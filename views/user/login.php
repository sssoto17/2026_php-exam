<?php

if(isset($_SESSION["user"]) ){
    header("Location: /feed");
};

?>

<?php $this->layout("layout", ["title" => "Sign in"]) ?>

<main>
    <section class="container flow-space">
        <h2>Sign in</h2>
        <form method="post">
            <div>
                <label for="user_email">Email</label>    
                <input aria-invalid="<?= isset($error) ? "true" : "false" ?>" id="user_email" name="email" type="email" placeholder="JohnDoe@gmail.com" value="<?= $this->e($data["email"] ?? "") ?? "" ?>" />
            </div>
            <div>
                <label for="user_password">Password</label>    
                <input aria-invalid="<?= isset($error) ? "true" : "false" ?>" id="user_password" name="password" type="password" />
            </div>
            <?php if (isset($error)): ?>
            <div>
                <small class="error"><?= $error ?></small>
            </div>
            <?php endif ?>
        <button class="btn secondary">Sign in</button>
        </form>
        <p>Don't have an account? <a href="/signup" class="link">Sign up now</a></p>
    </section>
</main>