<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <a href="index.html">首頁</a>
        <a href="Comment.html">訪客留言</a>
        <a href="Book.html">訪客訂房</a>
        <a href="Order.html">訪客訂餐</a>
        <a href="Transport.html">交通資訊</a>
        <a href="admin.php">網站管理</a>
    </nav>
    <div class="title">
        <h1>訪客訂房 訂房完成</h1>
    </div>
    <div class="box">
        <h1>訂房完成 您的訂房編號為：<?=$_GET['room_id']?></h1>
        <div class="send">
            <button class="login" onclick="location.href='index.html'">返回</button>
        </div>
    </div>
</body>
</html>
<style>
    .box{
        width: 1200px; height: 350px;
        position: relative;
        background-color: white;
        padding: 20px;
        border: none;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .send{
        position: absolute;
        bottom:0; right:0;
    }
    .login{
        margin: 10px;
        font-size: 20px;
        background-color: cornflowerblue;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
    }
</style>