<?php
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="vue3.js"></script>
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
    <div class="title">
        <h1>訪客留言 編輯</h1>
        <button class="button" onclick="location.href='Comment.html'">回留言列表</button>
    </div>
    <div class="box">
        <div class="input">
            <input type="text" v-model="name">
            <label for="">姓名</label>
        </div>
        <div class="input">
            <div class="state">
                <input type="checkbox" v-model="email_state" name="" id="">
                <p>顯示</p>
            </div>
            <input type="text" v-model="email">
            <label for="">E-mail</label>
        </div>
        <div class="input">
            <div class="state">
                <input type="checkbox" v-model="phone_state" name="" id="">
                <p>顯示</p>
            </div>
            <input type="text" v-model="phone">
            <label for="">電話</label>
        </div>
        <div class="input">
            <textarea name="" id="" cols="30" rows="10" v-model="content" style="height: 150px;"></textarea>
            <label for="">內容</label>
        </div>
        <!-- <div class="input" style="width:300px">
            <input type="text" v-model="number">
            <label for="">留言序號</label>
        </div> -->
        <div class="send">
            <button class="reset" @click="reset">重設</button>
            <button class="login" @click="send">送出</button>
        </div>
    </div>
</div>
<script>
    const { ref, onMounted } = Vue
    Vue.createApp({
        setup(){
            let id = ref("<?=$id?>")
            let name = ref("")
            let email = ref("")
            let email_state = ref()
            let phone = ref("")
            let phone_state = ref()
            let content = ref("")
            let number = ref("")
            const reset = () => {
                name.value = ""
                email.value = ""
                phone.value = ""
                content.value = ""
                number.value = ""
            }
            const send = async() => {
                if(name.value==""){
                    alert("名稱不可為空")
                    return
                }
                if(email.value==""){
                    alert("E-mail不可為空")
                    return
                }
                if(phone.value==""){
                    alert("電話不可為空")
                    return
                }
                if(content.value==""){
                    alert("內容不可為空")
                    return
                }
                if(number.value==""){
                    alert("留言序號不可為空")
                    return
                }
                if(number.value.length!=4){
                    console.log((number.value.length));
                    alert("留言序號長度錯誤")
                    return
                }
                let email_check = /[@.]+/g
                if(!email_check.test(email.value)){
                    alert("電子郵件錯誤")
                    return
                }
                let phone_check = /[^0-9-]/
                if(phone_check.test(phone.value)){
                    alert("電話錯誤")
                    return
                }
                let formdata = new FormData()
                formdata.append("name", name.value)
                formdata.append("email", email.value)
                formdata.append("email_state", (email_state.value)?1:0)
                formdata.append("phone", phone.value)
                formdata.append("phone_state", (phone_state.value)?1:0)
                formdata.append("content", content.value)
                formdata.append("number", number.value)
                let resquest = await fetch(`api.php?set_comment&id=${parseInt(id.value) + 1}`,{
                    method: "POST",
                    body: formdata
                })
                let json = await resquest.json()
                if(json=="success")
                    location.href = "Comment.html"
                else
                    alert(json);
            }
            onMounted(async() => {
                let request = await fetch("api.php?get_comment")
                let json = await request.json()
                name.value = json[id.value].name;
                email.value = json[id.value].email;
                email_state.value = json[id.value].email_state == 1;
                phone.value = json[id.value].phone;
                phone_state.value = json[id.value].phone_state == 1;
                content.value = json[id.value].content;
                number.value = json[id.value].number;
            })
            return{ name, email, phone, content, number, reset, send, email_state, phone_state }
        }
    }).mount("#app")
</script>
</body>
</html>
<style>
    .title{
        margin-top: 10px;
        width: 1000px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    h1{
        color: white;
    }
    .button{
        margin: 10px;
        font-size: 20px;
        background-color: cornflowerblue;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
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
    .input>input,.input>textarea{
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
    .send{
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
    .state{
        display: flex;
        height: 100px;
        top: calc(50% - 50px);
        align-items: center;
        justify-content: center;
        position: absolute;
        right: -100px;
    }
    .state>p{
        color: cornflowerblue;
        font-size: 20px;
    }
</style>