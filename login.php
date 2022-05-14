<?php
    session_start();
    if (isset($_SESSION['unique_id'])) {
        header("location: users.php");
    }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Husky realtime chat</header>
            <form action="#">
                <div class="error-txt">This is an error message</div>
                <div class="field input">
                    <label>Email address</label>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input id="passfield" name="password" type="password" placeholder="Enter your password" required>
                    <i id="passeye" class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to chat">
                </div>
            </form>
            <div class="link">Not yet signed up? <a href="/">Register now!</a></div>
        </section>
    </div>
</body>
<script src="js/pass-showing.js"></script>
<script src="js/login.js"></script>
</html>