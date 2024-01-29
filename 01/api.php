<?php
    include("pdo.php");
    session_start();
    if(isset($_GET['login'])){
        $_SESSION['login'] = true;
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
    if(isset($_GET['delete_comment'])){
        $id = $_GET['id'];
        $pdo -> query("DELETE FROM `comment` WHERE `comment`.`id` = $id");
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
    if(isset($_GET['new_book'])){
        $date = date("Y-m-d");
        $rows = $pdo -> query("SELECT * FROM `book` WHERE `create_day` = '$date'") -> fetchAll(2);
        $room_id = date("Ymd") . "" . str_pad(count($rows) + 1,4,"0", STR_PAD_LEFT);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $remark = $_POST['remark'];
        $room = $_POST['room'];
        $first = $_POST['first'];
        $last = $_POST['last'];
        $pdo -> query("INSERT INTO `book` (`id`, `room_id`, `name`, `email`, `phone`, `remark`, `room`, `firstday`, `lastday`, `create_day`) VALUES (NULL, '$room_id', '$name', '$email', '$phone', '$remark', '$room', '$first', '$last', current_timestamp())");
        echo JSON_encode($room_id);
    }
    if(isset($_GET['get_book'])){

    }
?>