<?php
    session_start();
    include "library/config.php";

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    $stmt = $db_con->prepare("SELECT username, password FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($u_name, $u_pass);

    if ($stmt->fetch()) {
        $stmt->close();
        $db_con->close();
        
        $_SESSION['username'] = $u_name;
        $_SESSION['password'] = $u_pass;
        
        header('location: /');
    }
    else {
        $stmt->close();
        $db_con->close();
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