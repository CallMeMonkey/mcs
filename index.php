<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/10/18
 * Time: 9:19 PM
 */
?>
<!DOCTYPE html>
<?php
require 'header/htmlHead.php';
require 'data/version.php';
?>
<body>
<div class="hp_title">
    <h1>生殖中心电子病历系统</h1>
</div>
<!--登录板块-->
<div class="hp_form" id="logTag">
    <div class="hp_form_header"><h2>登录</h2></div>
    <div class="hp_block">
        <form method="post" action="process/loginProcess.php">
            <div class="row">
                <span class="un"><i class="fa fa-user"></i></span>
                <input type="text" required class="inputText" name="username" placeholder="用户名" autofocus/>
            </div>
            <div class="row">
                <span class="un"><i class="fa fa-lock"></i></span>
                <input type="password" required class="inputText" name="password" placeholder="密码"/></li>
            </div>
            <div class="row">
                <span class="un"><i class="fa fa-check-circle"></i></span>
                <div class="radio radioCenter">
                    <input type="radio" name="type" value="1" id="r1" required><label for="r1">管理员</label>
                    <input type="radio" name="type" value="2" id="r2"><label for="r2">学生</label>
                    <input type="radio" name="type" value="3" id="r3"><label for="r3">访客</label>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="登录" class="btn">
            </div>
        </form>
        <div class="row radioCenter">
            <span class="ch"><i class="fa fa-user-plus"></i></span>
            <h4 onclick="buttonRegister()" style="cursor:pointer">现在注册</h4>
        </div>
    </div>
</div>
<!--注册板块-->
<div class="hp_form" id="regisTag" style="display: none;">
    <div class="hp_form_header"><h2>注册</h2></div>
    <div class="hp_block">
        <form method="post" action="process/registerProcess.php">
            <div class="row" id="usernameCheck">
                <span class="un"><i class="fa fa-user"></i></span>
                <input type="text" required class="inputText"
                       name="register_id" placeholder="用户名"
                       pattern="[a-zA-Z]+"
                       title="请使用全英文形式"
                       onkeyup="usernameDuplication(this.value);"
                       id="registerUsername"
                />
            </div>
            <div class="row">
                <span class="un"><i class="fa fa-lock"></i></span>
                <input type="password" required class="inputText"
                       name="register_password"
                       id="register_password"
                       placeholder="密码"
                       onkeyup="registerCheck();"
                />
            </div>
            <div class="row" id="matchCheck">
                <span class="un"><i class="fa fa-unlock-alt"></i></span>
                <input type="password" required
                       class="inputText"
                       name="register_confirm"
                       id="register_confirm"
                       placeholder="确认密码"
                       onkeyup="registerCheck();"
                />
            </div>
            <div class="row">
                <span class="un"><i class="fa fa-key"></i></span>
                <input type="text" required class="inputText"
                       name="register_inv_code"
                       placeholder="邀请码"/>
            </div>
            <div class="row">
                <input type="submit" value="注册" class="btn" id="registerBtn">
            </div>
        </form>
        <div class="row radioCenter">
            <span class="ch"><i class="fa fa-user-plus"></i></span>
            <h4 onclick="buttonSignin()" style="cursor:pointer">登录</h4>
        </div>
    </div>
</div>
<!--Footer-->
<div class="footer">
    <div class="footer_inline"><i class="fas fa-bug"></i></div>
    <div class="footer_inline"><h5><?php echo $version ?></h5></div>
</div>
</body>
</html>