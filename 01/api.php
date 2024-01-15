<?php
    include("pdo.php");
    session_start();
    if(isset($_GET['login'])){
        $account = $_POST['account'];
        $rows = $pdo -> query("SELECT * FROM `user` WHERE `account` = '$account'") -> fetch();
        if($rows == ""){
            ?><script>alert("帳號有誤")</script><?php
        }else{
            if($_POST['password'] != $rows['password']){
                ?><script>alert("密碼有誤")</script><?php
            }else{
                if($_POST['verify'] != $_SESSION['verify']){
                    ?><script>alert("驗證碼有誤")</script><?php
                }else{
                    ?><script>alert("登入成功")</script><?php
                    ?><script>location.href='admin.html'</script><?php
                }
            }
        }
        ?><script>location.href='admin.php'</script><?php
    }

    if(isset($_GET['get_comment'])){
        $rows = $pdo -> query("SELECT * FROM `comment`") -> fetchAll();
        echo JSON_encode($rows);
    }
?>