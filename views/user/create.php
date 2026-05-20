<?php $this->layout("layout", ["title" => "ArtDash | Create an account"]) ?>

<main>
    <section class="flow-space">
        <h2>Create an account</h2>
        <form method="post">
            <div>
                <label for="user_username">Username</label>    
                <input id="user_username" name="username" />
            </div>
            <div>
                <label for="user_first_namme">First name</label>    
                <input id="user_first_name" name="first_name" />
            </div>
            <div>
                <label for="user_last_namme">Last name</label>    
                <input id="user_last_name" name="last_name" />
            </div>
            <div>
                <label for="user_email">Email</label>    
                <input id="user_email" name="email" type="email" placeholder="JohnDoe@gmail.com" />
            </div>
            <div>
                <label for="user_password">Password</label>    
                <input id="user_password" name="password" type="password" />
            </div>
        <button class="btn secondary">Sign up now</button>
        </form>
    </section>
</main>