<?php $this->layout("layout", ["title" => "Create an account"]) ?>

<main>
    <section class="flow-space container">
        <h2>Create an account</h2>
        <form method="post">
            <div>
                <label for="user_username">Username</label>    
                <input id="user_username" name="username" value="<?= $this->e($data["username"] ?? "") ?? "" ?>" />
            </div>
            <div class="flex">
                <div>
                    <label for="user_first_namme">First name</label>    
                    <input id="user_first_name" name="first_name" value="<?= $this->e($data["first_name"] ?? "") ?? "" ?>" />
                </div>
                <div>
                    <label for="user_last_namme">Last name</label>    
                    <input id="user_last_name" name="last_name" value="<?= $this->e($data["last_name"] ?? "") ?? "" ?>" />
                </div>
            </div>
            <div>
                <label for="user_email">Email</label>    
                <input id="user_email" name="email" type="email" placeholder="JohnDoe@gmail.com" value="<?= $this->e($data["email"] ?? "") ?? "" ?>" />
            </div>
            <div>
                <label for="user_password">Password</label>    
                <input id="user_password" name="password" type="password" />
            </div>
            <div>
                <label for="user_password_confirm">Confirm password</label>    
                <input id="user_password_confirm" name="password_confirm" type="password" />
            </div>
            <?php if (isset($error)): ?>
            <div>
                <small class="error"><?= $error ?></small>
            </div>
            <?php endif ?>
        <button class="btn secondary">Sign up now</button>
        </form>
        <p>Already have an account? <a href="/login" class="link">Log in</a></p>
    </section>
</main>