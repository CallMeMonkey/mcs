<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/17/18
 * Time: 10:37 AM
 */
?>
<div class="content floatRight">
    <div class="invite">
        <h2>邀请新用户</h2>
        <h3>请分配时间和用户类型，系统会自动生成邀请码</h3>
        <form action="process/inviteProcess.php" id="invite_form" method="post">
            <ul>
                <li>
                    <label for="startTime">访问开始时间</label>
                    <input type="date" name="startTime" id="startTime" required onchange="setPeriodCheck();"/>
                </li>
                <li id="endTimeLi">
                    <label for="endTime">访问结束时间</label>
                    <input type="date" name="endTime" id="endTime" required onchange="setPeriodCheck();"/>
                </li>
                <li>
                    <label for="permission">用户身份选择</label>
                    <div class="inviteVideo">
                        <input type="radio" name="permission" value="1" id="r1" required><label for="r1">管理员</label>
                        <input type="radio" name="permission" value="2" id="r2"><label for="r2">学生</label>
                        <input type="radio" name="permission" value="3" id="r3"><label for="r3">访客</label>
                    </div>
                </li>
            </ul>
            <input type="submit" value="确定" class="btn" id="inviteBtn"/>
            <input type="button" value="重新填写" class="btn" onclick="resetInviteForm()"/>
        </form>
    </div>
</div>
