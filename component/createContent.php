<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/19/18
 * Time: 3:09 PM
 */
require 'data/columnData.php';
?>
<div class="content floatRight" id="content">
    <div class="create">
        <h2>创建新病历</h2>
        <h3><i class="fas fa-id-card-alt floatLeft"></i>病人通用信息</h3>
        <form action="process/createProcess.php" method="post" id="create_form" enctype="multipart/form-data">
            <ul>
                <?php
                for ($i = 0; $i <= 43; $i++) {
                    echo "<li><label>" . $itemTitle[$i] . "</label>";
                    if ($i <= 19) {
                        if ($i == 1 || $i == 10 || $i == 19)
                            echo "<input type='date' name='" . $itemName[$i] . "' /></li>";
                        else
                            echo "<input type='text' name='" . $itemName[$i] . "' placeholder='>' /></li>";
                    } else {
                        echo "<textarea type='text' name='" . $itemName[$i] . "' onkeyup=\"addition_adjust(this)\" placeholder='>'></textarea></li>";
                    }
                }
                ?>
            </ul>
                <!-- <li>
                    <label>性激素检查</label>
                    <textarea type="text" name="p_hormone" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
                <li>
                    <label>输卵管造影</label>
                    <textarea type="text" name="p_contrast" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
                <li>
                    <label>子宫内膜活检</label>
                    <textarea type="text" name="p_biopsy" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
                <li>
                    <label>宫腔镜检查</label>
                    <textarea type="text" name="p_inspect" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li> -->
            <input type="button" value="重新填写通用信息" class="btn" onclick="resetCreateForm()"/>

            <!--附属信息-->
            <h3><i class="fas fa-file-medical floatLeft"></i>病人附属信息</h3>
            <!--附属文字container-->
            <ul id="addition_info"></ul>
            <input name="additionTextCount" value="0" id="additionTextCount" type="hidden"/>
            <div><input type="button" value="添加附属文字信息" class="btn" onclick="addition_info_text()"/></div>
            <!--附属图片container-->
            <div id="addition_pic"></div>
            <input name="additionPicCount" value="0" id="additionPicCount" type="hidden"/>
            <div><input type="button" value="添加附属图片" class="btn" onclick="addition_info_pic()"/></div>
            <!--附属文档container-->
            <div id="addition_doc"></div>
            <input name="additionDocCount" value="0" id="additionDocCount" type="hidden"/>
            <div><input type="button" value="添加附属文档" class="btn" onclick="addition_info_doc()"/></div>

            <div><input type="submit" value="确认提交" class="btn"></div>
        </form>
    </div>
</div>
<script src="js/contentScrollbar.js"></script>