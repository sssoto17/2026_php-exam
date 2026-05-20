<?php

if(isset($_SESSION["user"]) ){
    header("Location: /feed");
};

?>

<?php $this->layout("layout", ["title" => "Sign in"]) ?>

<main>
    <section class="flow-space">
        <h2>Sign in</h2>
        <form action="/api/login" method="post">
            <div>
                <label for="user_email">Email</label>    
                <input id="user_email" name="email" type="email" placeholder="JohnDoe@gmail.com" />
            </div>
        <button class="btn secondary">Sign in</button>
        </form>
    </section>
</main>