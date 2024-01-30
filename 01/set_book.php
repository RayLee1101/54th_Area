<!-- <!DOCTYPE html>
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
        <a href="Transport.html">交通資訊</a>
        <a href="admin.php">網站管理</a>
    </nav>
    <div class="title">
        <h1>訂房管理</h1>
    </div>
    <div class="box">
        <div class="input">
            <input type="text" v-model="name">
            <label for="">姓名</label>
        </div>
        <div class="input">
            <input type="text" v-model="email">
            <label for="">Email</label>
        </div>
        <div class="input">
            <input type="text" v-model="phone">
            <label for="">電話</label>
        </div>
        <div class="input">
            <textarea style="height: 150px;" v-model="remark"></textarea>
            <label for="">備註</label>
        </div>
        <div class="input">
            <select v-model="room">
                <option v-for="idx in 8" :value="idx">Room0{{idx}}</option>
            </select>
            <label for="">房間</label>
        </div>
        <div style="width: 70%;display: flex;align-items: center; justify-content: space-between;">
            <div class="input" style="width: 40%;">
                <input type="date" v-model="firstday">
                <label for="">日期_第一天</label>
            </div>
            <span>到</span>
            <div class="input" style="width: 40%;">
                <input type="date" v-model="lastday">
                <label for="">日期_最後一天</label>
            </div>
        </div>
        <div class="send">
            <button class="reset" @click="cancel">取消</button>
            <button class="login" @click="send">儲存</button>
        </div>
    </div>
</div>
<script>
    const {ref, onMounted} = Vue
    Vue.createApp({
        setup(){
            let name = ref("")
            let email = ref("")
            let phone = ref("")
            let remark = ref("")
            let room = ref("")
            let firstday = ref()
            let lastday = ref()

            const cancel = () => {
                location.href="admin.html"
            }

            const send = () => {

            }

            onMounted(async() => {
                let id = "<?=$_GET['id']?>"
                let resquest = await fetch(`api.php?get_book&id=${id}`)
                let json = await resquest.json()
                console.log(json);
                name.value = json.name
                email.value = json.email
                phone.value = json.phone
                remark.value = json.remark
                room.value = json.room
                let f = new Date(json.firstday)
                firstday.value = f.toISOString().split('T')[0];
                let l = new Date(json.lastday)
                lastday.value = l.toISOString().split('T')[0];
            })
            return{name, email,phone,remark,room,firstday,lastday,cancel,send}
        }
    }).mount("#app")
</script>
</body>
</html>
<style>
    .title{
        margin-top: 10px;
        width: 1200px;
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
        width: 1300px; height: 650px;
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
    .input>input,.input>textarea,.input>select{
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
    span{
        background: cornflowerblue;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
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
</style> -->
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
        <a href="Transport.html">交通資訊</a>
        <a href="admin.php">網站管理</a>
    </nav>
    <div class="title">
        <h1>訪客訂房 選擇訂房資訊</h1>
    </div>
    <div class="box">
        <div class="set">
            <p @click="month_set(-1)">前一個月<<</p>
            <p>{{year}}年 {{month}}月</p>
            <p @click="month_set(1)">>>下一個月</p>
        </div>
        <table class="month" border="1">
            <tr class="week">
                <td>日</td>
                <td>一</td>
                <td>二</td>
                <td>三</td>
                <td>四</td>
                <td>五</td>
                <td>六</td>
            </tr>
            <tr v-for="(item,idx) in DayInWeek">
                <td v-for="i in 7" @click="select(idx, i -1)" :style="{background:(item[i-1][2])?'yellow':'white'}">
                    <p class="day">{{item[i-1][0]}}</p>
                    <p v-if="item[i-1][0] != undefined" >$5000/{{item[i-1][1]}}間</p>
                </td>
            </tr>
        </table>
        <div class="data">
            <div>入住天數</div>
            <input type="text" :value="daynum+'天'">
        </div>
        <div class="data">
            <div>入住日期</div>
            <input type="text" name="" id="" v-model="firstday">
            <div>到</div>
            <input type="text" name="" id="" v-model="lastday">
        </div>
        <div class="data">
            <div>房號</div>
            <input v-if="room!=null" type="text" :value="'Room' + room">
            <input v-else type="text">
            <button @click="autoselect">自動產生房號</button>
            <button @click="select_room">選擇房號</button>
        </div>
        <div class="send">
            <button class="reset" @click="cancel">取消</button>
            <button class="login" @click="check = true">確定訂房</button>
        </div>
    </div>
    <div class="select_room">
        
    </div>
    <div class="check" v-if="check">
        <div class="box">
            <h1>旅客訂房-以選擇的訂房資訊在確認</h1>
            <div class="data">
                <div>房號</div>
                <input v-if="room!=null" type="text" :value="'Room' + room">
                <input v-else type="text">
            </div>
            <div class="data">
                <div>入住天數</div>
                <input type="text" :value="daynum+'天'">
            </div>
            <div class="data">
                <div>入住日期</div>
                <input type="text" name="" id="" v-model="firstday">
                <div>到</div>
                <input type="text" name="" id="" v-model="lastday">
            </div>
            <div class="data">
                <div>總金額</div>
                <input type="text" :value="daynum * 5000">
            </div>
            <div class="data">
                <div>需付討金</div>
                <input type="text" :value="daynum * 5000 * 0.3 +'(總金額之30%)'">
            </div>
            <div class="send">
                <button class="reset" @click="check = false">取消</button>
                <button class="login" @click="send">確定訂房</button>
            </div>
        </div>
    </div>
</div>
<script>
    const {ref, reactive, onMounted} = Vue
    Vue.createApp({
        setup(){
            let year = ref(2024)
            let month = ref(3)
            let DayInWeek = ref([])

            let daynum = ref(0)
            let firstday = ref("")
            let first = ref(null)
            let lastday = ref("")
            let last = ref(null)
            let room = ref(null)
            let select_room_state = ref(false)

            let check = ref(false)

            const month_set = (idx) =>{
                month.value += idx;
                if(month.value == 0){
                    month.value = 12;
                    year.value--;
                }
                if(month.value == 13){
                    month.value = 1
                    year.value++;
                }
                get_day()
            }
            const select = (i, j) => {
                if(DayInWeek.value[i][j][0]==undefined) return
                let week = ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"]
                if(firstday.value == ""){
                    firstday.value = year.value + "-" + String(month.value).padStart(2,"0") + "-" + String(DayInWeek.value[i][j][0]).padStart(2, "0") + week[j]
                    lastday.value = year.value + "-" + String(month.value).padStart(2,"0") + "-" + String(DayInWeek.value[i][j][0]).padStart(2, "0") + week[j]
                    first.value =  new Date(year.value, month.value -1, DayInWeek.value[i][j][0]).getTime()
                    last.value =   new Date(year.value, month.value -1, DayInWeek.value[i][j][0]).getTime()
                }else if(first.value == last.value){
                    let d = new Date(year.value, month.value -1, DayInWeek.value[i][j][0]).getTime()
                    if(d < first.value) return
                    lastday.value = year.value + "-" + String(month.value).padStart(2,"0") + "-" + String(DayInWeek.value[i][j][0]).padStart(2, "0") + week[j]
                    last.value =  new Date(year.value, month.value -1, DayInWeek.value[i][j][0]).getTime()
                }
                for(let i = 0; i < DayInWeek.value.length; i++){
                    for(let j = 0; j < 7; j++){
                        let d = new Date(year.value, month.value -1, DayInWeek.value[i][j][0]).getTime()
                        if(d >= first.value && d <= last.value)
                        DayInWeek.value[i][j][2] = true
                    } 
                }
                daynum.value = ((last.value - first.value) / 86400000 + 1)
            }
            const get_day = async() => {
                DayInWeek.value = []
                DayInWeek.value.push(["","","","","","",""])
                let idx = 0;
                const allday = new Date(year.value, month.value, 0).getDate()
                for(let i = 1; i <= allday; i++){
                    let room_num = 0
                    let d = new Date(year.value, month.value -1, i).getTime()
                    let resquest = await fetch(`api.php?get_day_num&day=${d}`)
                    let json = await resquest.json()
                    room_num = 8 - json.length
                    
                    const day = new Date(year.value, month.value -1, i).getDay()
                    DayInWeek.value[idx][day] = [i, room_num, false];
                    if(first.value != null){
                        if(d >= first.value && d <= last.value){
                            DayInWeek.value[idx][day][2] = true
                        }
                    }
                    if(day == 6) {
                        idx++;
                        DayInWeek.value.push(["","","","","","",""])
                    }
                }
            }
            const autoselect = async() => {
                if(first.value == null){
                    alert("請先選擇入住日期")
                    return
                }
                let allroom = [true,true,true,true,true,true,true,true]
                for(let i = first.value; i <= last.value; i+=86400000){
                    let resquest = await fetch(`api.php?get_day_num&day=${i}`)
                    let json = await resquest.json()
                    json.forEach(e => {
                        allroom[e.room - 1] = false
                    });
                }
                let r = Math.floor((Math.random()*8)) + 1
                while (!allroom[r - 1]) {
                    r = Math.floor((Math.random()*8)) + 1
                }
                room.value = r
            }
            const select_room = () => {

            }
            const cancel = () => {
                sum.value = 1
                daynum.value = 0
                firstday.value ="" 
                first.value = null
                lastday.value ="" 
                last.value = null
                room.value = null
                get_day();
            }
            const send = () => {
                if(first.value == null||room.value == null)
                    alert("請輸入完整資料")
                else{
                    localStorage.setItem("first", first.value)
                    localStorage.setItem("last", last.value)
                    localStorage.setItem("room", room.value)
                    location.href="connection.html"
                }
            }
            onMounted(() => {
                let week = ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"]
                let data = JSON.parse(localStorage.getItem("data"))
                daynum.value = (data.firstday - data.lastday) / 86400000 + 1
                first.value = data.firstday
                last.value = data.lastday
                get_day()
            })
            return{year, month, month_set, DayInWeek, select, daynum, firstday, lastday, room, cancel, send, select_room_state, autoselect, select_room, check}
        }
    }).mount("#app")
</script>
</body>
</html>
<style>
    .title{
        position: absolute;
        top: 50px; left: 20px;
    }
    .title>h1{
        font-size: 30px;
    }
    .box{
        position: relative;
        margin-top: 80px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: white;
        width: 1250px;
        height: 800px;
        border-radius: 8px;
    }
    .month{
        width: 60%;
        text-align: center;
        border: 1px solid cornflowerblue;
    }
    td{
        width: 50px;
        height: 75px;
    }
    p{
        margin: 0;
        font-size: 12px;
    }
    .day{
        font-size: 25px;
    }
    .week>td{
        height: 25px;
    }
    .data{
        display: flex;
        width: 60%;
    }
    .data>div, .data> button{
        padding: 10px 20px;
        border: none;
        background-color: cornflowerblue;
        color: white;
        font-size: 20px;
        border-radius: 8px;
        margin: 2px;
    }
    .data>input,.data>select{
        font-size: 20px;
        border: 1px solid cornflowerblue;
        color: cornflowerblue;
        border-radius: 8px;
        margin: 2px;
    }
    .set{
        width: 60%;
        display: flex;
        justify-content: space-around;
        background: cornflowerblue;
        border-radius: 8px;
    }
    .set>p{
        color: white;
        font-size: 20px;
    }
    .check{
        width: 100vw; height: 100vh;
        background: rgb(0,0,0,0.8);
        position: absolute;
        top: 0; left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .check > .box{
        margin: 0;
        width: 1200px; height: 600px;
    }
</style>