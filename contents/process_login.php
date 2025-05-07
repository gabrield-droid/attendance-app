<?php
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
        
        header('location: /home');
    }
    else {
        $stmt->close();
        $db_con->close();
?>
    <section class="form-box summary fail">
        <h2>USAHA MASUK GAGAL</h2>
    </section>
<?php
    }
?>