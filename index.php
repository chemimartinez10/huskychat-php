<?php
    session_start();
    if (isset($_SESSION['unique_id'])) {
        header("location: users.php");
    }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Husky realtime chat</header>
            <form action="#">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First name</label>
                        <input id="fnamefield" type="text" placeholder="First name" name="fname" required>
                    </div>
                    <div class="field input">
                        <label>Last name</label>
                        <input id="lnamefield" type="text" placeholder="Last name" name="lname" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email address</label>
                    <input id="emailfield" type="text" placeholder="Email" name="email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input id="passfield" type="password" name="password" placeholder="Password" required>
                    <i id="passeye" class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Select an image</label>
                    <input id="imagefield" type="file" name="image" placeholder="Profile picture" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to chat">
                </div>
            </form>
            <div class="link">Already signed up? <a href="login.php">Login now!</a></div>
        </section>
    </div>
</body>
<script src="js/pass-showing.js"></script>
<script src="js/signup.js"></script>
</html>