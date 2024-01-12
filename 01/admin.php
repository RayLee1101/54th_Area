<?php
    session_Start();
    if(isset($_SESSION['login'])){
        header("location:admin.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="vue3.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="app">
    <nav>
        <a href="index.html">首頁</a>
        <a href="Comment.html">訪客留言</a>
        <a href="Book.html">訪客訂房</a>
        <a href="Order.html">訪客訂餐</a>
        <a href="Transport.html">交通管理</a>
        <a href="admin.php">網站管理</a>
    </nav>
    <h1>網站管理-登入</h1>
    <div class="box">
        <div class="input">
            <input type="text">
            <label for="">帳號</label>
        </div>
        <div class="input">
            <input type="text">
            <label for="">密碼</label>
        </div>
        <div class="input">
            <input type="text" v-model="answer">
            <label for="">圖形驗證碼</label>
        </div>
        <div class="verify">
            <img src="verify.php" width="100" alt="">
            <button>驗證碼重新產生</button>
        </div>
        <div class="button">
            <button class="reset">重設</button>
            <button class="login">送出</button>
        </div>
    </div>
</div>
<script>
    const {ref, reactive} = Vue
    Vue.createApp({
        setup(){
            let account = ref("")
            let password = ref("")
            let verify = ref("")
            let answer = ref()
            return {account, password, verify, answer}
        }
    }).mount("#app")
</script>
</body>
</html>
<style>
    h1{
        width: 1000px; color: white;
    }
    .box{
        width: 1000px; height: 600px;
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
    .input{
        position: relative;
        width: 70%;
        margin: 15px
    }
    .input>input{
        width: 100%;
        outline: none;
        border: 1px solid CornflowerBlue;
        color: CornflowerBlue;
        border-radius: 8px;
        font-size: 25px;
        padding: 12px;
    }
    .input>label{
        font-size: 18px;
        color: CornflowerBlue;
        position: absolute;
        background: white;
        top: -10px; left: 15px;
    }
    .verify{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .verify>button{
        margin-left: 20px;
        font-size: 20px;
        background-color: cornflowerblue;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 10px;
    }
    .button{
        position: absolute;
        bottom:0; right:0;
    }
    .reset{
        margin: 10px;
        font-size: 20px;
        background-color: white;
        color: cornflowerblue;
        border: 1px solid cornflowerblue;
        padding: 10px 20px;
        border-radius: 10px;
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