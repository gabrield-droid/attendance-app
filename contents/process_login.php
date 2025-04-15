<?php
    session_start();
    include "library/config.php";

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $data = mysqli_fetch_array($query);
    $jml = mysqli_num_rows($query);

    if ($jml > 0) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];

        header('location: /');
    }
    else {
?>
    <div class="nav-form">
        <a href="?content=login">
            <div><h3><span class="symbol"> &#128281; </span><span>Kembali </span><h3></div>
        </a>
    </div>
    <section class="form-box summary fail">
        <h2>USAHA MASUK GAGAL</h2>
    </section>
    <meta http-equiv='refresh' content='2; url=index.php?content=login'>
<?php
    }
?>