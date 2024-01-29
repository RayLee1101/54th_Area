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
        <a href="Transport.html">交通資訊</a>
        <a href="admin.php">網站管理</a>
    </nav>
    <h1>網站管理 登入</h1>
    <form class="box" method="post" action="api.php?login">
        <div class="input">
            <input type="text" v-model="account" name="account">
            <label for="">帳號</label>
        </div>
        <div class="input">
            <input type="text" v-model="password" name="password">
            <label for="">密碼</label>
        </div>
        <div class="input">
            <input type="text" v-model="verify" name="verify">
            <label for="">圖形驗證碼</label>
        </div>
        <div class="verify">
            <img :src="url" width="100" alt="">
            <button @click="verify_reset" type="button">驗證碼重新產生</button>
        </div>
        <div class="button">
            <button class="reset" type="button" @click="reset">重設</button>
            <button class="login" type="submit">送出</button>
        </div>
    </form>
</div>
<script>
    const {ref, reactive} = Vue
    Vue.createApp({
        setup(){
            let account = ref("")
            let password = ref("")
            let verify = ref("")
            let url = ref("verify.php")
            const verify_reset = () => {
                url.value = "verify.php?" + Math.random().toString();
            }
            const reset = () => {
                account.value = "";
                password.value = "";
                verify.value = "";
            }
            return {account, password, verify, url, verify_reset, reset}
        }
    }).mount("#app")
</script>
</body>
</html>
<style>
    h1{
        width: 800px; color: white;
    }
    .box{
        width: 800px; height: 450px;
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