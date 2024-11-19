<html>
<head>
    <title>
This is just for test
</title>
<style>
.form {
    width:50%;
    height:auto;
    border:none;
    border-radius:20px;
    padding:20px;
    text-align:center;
    box-shadow: 5px 3px 7px grey;
}

.text {
    font-size:20px;
}
.box {
    width:90%;
    height:30px;
    border:1px solid grey;
    border-radius:30px;
}

.btn {
    border:1px solid grey;
    border-radius:30px;
    padding:20px;
    color:white;
    background-color:darkblue;
    padding-top:7px;
    padding-bottom:7px;
    cursor:pointer;
}
.btn:hover {
    background-color:orange;
}
    </style>
</head>
<body>

<form class="form"> 
    <label style="color:darkblue; font-size:30px">Registration <span style="color:orange">Form</span></label>
    <br>
    <br>
<label class="text">username:</label>
<br>
<input type="text" class="box" placeholder="Enter your username"></input>
<br>
<br>
<label class="text">password:</label>
<br>
<input type="password" class="box" placeholder="Enter your password"></input>
<br>
<br>
<label class="text" class="box">Enter your choice:</label>
<select>
<option>India</option>
<option>Nepal</option>
<option>China</option>
<option>America</option>
<option>Australia</option>
<option>Indonesia</option>
</select>
<br>
<br>
<label class="text" class="box">Enter your gender</label>
<br><label>male
<input type="radio"/>
<label>female
<input type="radio"/>
<br>
<br>
<label class="text" class="box">Enter the address:</label>
<br>
<input type="textarea" style="height:10%"></input>
<br>
<br>
<input class="btn" type="submit"></input>
</form>
</body>
</html>