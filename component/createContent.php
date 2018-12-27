<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/19/18
 * Time: 3:09 PM
 */
?>
<div class="content floatRight" id="content">
    <div class="create">
        <h2>创建新病历</h2>
        <h3><i class="fas fa-id-card-alt floatLeft"></i>病人通用信息</h3>
        <form action="process/createProcess.php" method="post" id="create_form" enctype="multipart/form-data">
        <!-- <div class="createInp">
        <input type="text" id="name" required="required"/>
        <label for="name">Name</label>
        <div class="bar"></div>
      </div>
      <div class="createInp">
        <input type="text" id="name" required="required"/>
        <label for="name">Name</label>
        <div class="bar"></div>
      </div> -->
            <ul>
                <li>
                    <label>登记号</label>
                    <input type="text" name="sign_id" placeholder=">"/>
                </li>
                <li>
                    <label>就诊时间</label>
                    <input type="date" name="comeTime" placeholder=">"/>
                </li>
                
                <li>
                    <label>病例号</label>
                    <input type="text" name="doc_id" placeholder=">"/>
                </li>
                <li>
                    <label>女方姓名</label>
                    <input type="text" name="f_name" placeholder=">"/>
                </li>
                <li>
                    <label>女方年龄</label>
                    <input type="text" name="f_age" placeholder=">"/>
                </li>
                <li>
                    <label>女方职业</label>
                    <input type="text" name="f_profession" placeholder=">"/>
                </li>
                <li>
                    <label>女方民族</label>
                    <input type="text" name="f_ethnic" placeholder=">"/>
                </li>
                <li>
                    <label>女方教育程度</label>
                    <input type="text" name="f_education" placeholder=">"/>
                </li>
                <li>
                    <label>女方电话</label>
                    <input type="text" name="f_tel" placeholder=">"/>
                </li>
                <li>
                    <label>女方身份证号</label>
                    <input type="text" name="f_identity" placeholder=">"/>
                </li>
                <li>
                    <label>女方出生日期</label>
                    <input type="date" name="f_birth" placeholder=">"/>
                </li>
                <li>
                    <label>住址</label>
                    <input type="text" name="address" placeholder=">"/>
                </li>
                <li>
                    <label>男方姓名</label>
                    <input type="text" name="m_name" placeholder=">"/>
                </li>
                <li>
                    <label>男方年龄</label>
                    <input type="text" name="m_age" placeholder=">"/>
                </li>
                <li>
                    <label>男方职业</label>
                    <input type="text" name="m_profession" placeholder=">"/>
                </li>
                <li>
                    <label>男方民族</label>
                    <input type="text" name="m_ethnic" placeholder=">"/>
                </li>
                <li>
                    <label>男方教育程度</label>
                    <input type="text" name="m_education" placeholder=">"/>
                </li>
                <li>
                    <label>男方电话</label>
                    <input type="text" name="m_tel" placeholder=">"/>
                </li>
                <li>
                    <label>男方身份证号</label>
                    <input type="text" name="m_identity" placeholder=">"/>
                </li>
                <li>
                    <label>男方出生日期</label>
                    <input type="date" name="m_birth" placeholder=">"/>
                </li>
                <li>
                    <label>主诉</label>
                    <textarea type="text" name="p_main" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
                <li>
                    <label>现病史</label>
                    <textarea type="text" name="p_history_now" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
                <li>
                    <label>现症</label>
                    <textarea type="text" name="p_symptom" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
                <li>
                    <label>个人史</label>
                    <textarea type="text" name="p_history_person" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
                <li>
                    <label>既往史</label>
                    <textarea type="text" name="p_history_back" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
                <li>
                    <label>家族史</label>
                    <textarea type="text" name="p_history_family" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
                <li>
                    <label>月经史</label>
                    <textarea type="text" name="p_history_period" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
                <li>
                    <label>婚育史</label>
                    <textarea type="text" name="p_history_pregnancy" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
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
                <li>
                    <label>身高</label>
                    <input type="text" name="p_height" placeholder=">" />
                </li>
                <li>
                    <label>体重</label>
                    <input type="text" name="p_weight" placeholder=">" />
                </li>
                <li>
                    <label>BMI</label>
                    <input type="text" name="p_bmi" placeholder=">" />
                </li>
                <li>
                    <label>腰围</label>
                    <input type="text" name="p_waistline" placeholder=">" />
                </li>
                <li>
                    <label>臀围</label>
                    <input type="text" name="p_hip" placeholder=">" />
                </li>
                <li>
                    <label>腰臀比</label>
                    <input type="text" name="p_ratio" placeholder=">" />
                </li>
                <li>
                    <label>SDS</label>
                    <input type="text" name="p_sds" placeholder=">" />
                </li>
                <li>
                    <label>SAS</label>
                    <input type="text" name="p_sas" placeholder=">" />
                </li>
                <li>
                    <label>毛发分布</label>
                    <textarea type="text" name="p_hair" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
                <li>
                    <label>乳房（溢乳）</label>
                    <textarea type="text" name="p_breast" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
                <li>
                    <label>妇科检查</label>
                    <textarea type="text" name="p_gynecology" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
                <li>
                    <label>B超检查</label>
                    <textarea type="text" name="p_b" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
                <li>
                    <label>西医诊断</label>
                    <textarea type="text" name="p_western" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
                <li>
                    <label>中医病名</label>
                    <textarea type="text" name="p_eastern" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
                <li>
                    <label>中医证型</label>
                    <textarea type="text" name="p_license" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
                <li>
                    <label>诊疗计划</label>
                    <textarea type="text" name="p_plan" placeholder=">" onkeyup="addition_adjust(this)"></textarea>
                </li>
            </ul>
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
<script>
    var height = window.innerHeight;
    document.getElementById("content").style.height = (height - 150) + "px";
</script>