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
        $rows = $pdo -> query("SELECT * FROM `comment`") -> fetchAll(2);
        echo JSON_encode($rows);
    }
    if(isset($_GET['new_comment'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $content = $_POST['content'];
        $number = $_POST['number'];
        $pdo -> query("INSERT INTO `comment` (`id`, `name`, `email`, `email_state`, `phone`, `phone_state`, `content`, `number`, `create_time`, `update_time`, `delete_time`) VALUES (NULL, '$name', '$email', '1', '$phone', '1', '$content', '$number', current_timestamp(), current_timestamp(), NULL)");
        echo JSON_encode("success");
    }
    if(isset($_GET['del_comment'])){
        $id = $_GET['id'];
        $pdo -> query("UPDATE `comment` SET `delete_time` = current_timestamp() WHERE `comment`.`id` = $id");
        echo JSON_encode("success");
    }
    if(isset($_GET['set_comment'])){
        $id = $_GET['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $email_state = $_POST['email_state'];
        $phone = $_POST['phone'];
        $phone_state = $_POST['phone_state'];
        $content = $_POST['content'];
        $number = $_POST['number'];
        $pdo -> query("UPDATE `comment` SET `name` = '$name', `email` = '$email', `email_state` = '$email_state', `phone` = '$phone', `phone_state` = '$phone_state', `content` = '$content', `number` = '$number' WHERE `comment`.`id` = $id");
        echo JSON_encode("success");
    }
    if(isset($_GET['get_day_num'])){
        $day = $_GET['day'];
        $rows = $pdo -> query("SELECT* FROM `book` WHERE `firstday` <= $day AND `lastday` >= $day") -> fetchAll(2);
        echo JSON_encode($rows);
    }
?>