<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <h1>LOGIN</h1>
            <form action="<?php echo base_url('login/cek_login');?>" method="post" class="fform">
                <label for="username">Username</label>
                <input type="text" name="username">
                <label for="password">Password</label>
                <input type="password" name="password">
                <button type="submit">Submit</button>
                <a href="<?= base_url('home');?>">Cancel</button>
            </form>
        </div>
    </div>
</body>
</html>