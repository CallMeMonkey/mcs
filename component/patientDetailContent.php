<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/27/18
 * Time: 1:17 PM
 */
require 'header/connect.php';
$patient = $_POST["passPatient"];
//echo $_SESSION['permissionType'];
?>
<div class="content floatRight" id="content">
    <div class="pd">
        <h2>生殖中心电子病历</h2>
        <?php
        $generalSQL = "SELECT * FROM info_patient WHERE patient_id=" . $patient;
        $genResult = $conn->query($generalSQL);
        while ($rowGen = $genResult->fetch_assoc()) {
            echo "<div class='header'>";
            echo "<div><b>登记号：</b>" . $rowGen['sign_id'] . "</div>";
            echo "<div><b>就诊时间：</b>" . $rowGen['comeTime'] . "</div>";
            echo "<div><b>病历号：</b>" . $rowGen['doc_id'] . "</div>";
            echo "<div><b>病历创建时间：</b>" . date("Y-m-d", $rowGen["createTime"]) . "</div>";
            // echo "<div><form method='post' target='_blank' action='generatePDF.php'>";
            // echo "<input type='hidden' value='" . $patient . "' name='patientPDF' />";
            // echo "<input class='generatePDF' type='submit' value='点击生成PDF'/></form></div>";
            echo "</div>";
            echo "<div class='btCenter'>";
            if ($_SESSION['permissionType'] != 3) {
                echo "<div class='btline'><form method='post' action='edit.php'>";
                echo "<input type='hidden' value='" . $patient . "' name='editPatient' />";
                echo "<input type='submit' class='generatePDF greenBorder' value='修改' />";
                echo "</form></div>";
                echo "<div class='btline'><form method='post' action='process/deleteProcess.php'>";
                echo "<input type='hidden' value='" . $patient . "' name='deletePatient' />";
                echo "<input type='submit' class='generatePDF redBorder' value='删除' onclick=\"return confirm('确认删除此病历？')\"/>";
                echo "</form></div>";
            }
            echo "<div class='btline'><form method='post' target='_blank' action='generatePDF.php'>";
            echo "<input type='hidden' value='" . $patient . "' name='patientPDF' />";
            echo "<input class='generatePDF greenBorder' type='submit' value='生成PDF'/></form>";
            echo "</div>";
            echo "<div class='btline'><input type='button' class='generatePDF greenBorder' value='返回' onclick=\"window.location.href='browsePatient.php'\" /></div>";
            echo "</div>";
            echo "<h3><i class='fa fa-user'></i>基本信息</h3>";
            echo "<div class='row'>";
            echo "<div class='item'><b>女方姓名：</b>" . $rowGen['f_name'] . "</div>";
            echo "<div class='item'><b>女方年龄：</b>" . $rowGen['f_age'] . "</div>";
            echo "<div class='item'><b>女方职业：</b>" . $rowGen['f_profession'] . "</div>";
            echo "<div class='item'><b>女方民族：</b>" . $rowGen['f_ethnic'] . "</div>";
            echo "</div><div class='row'>";
            echo "<div class='item'><b>女方教育程度：</b>" . $rowGen['f_education'] . "</div>";
            echo "<div class='item'><b>女方电话：</b>" . $rowGen['f_tel'] . "</div>";
            echo "<div class='item'><b>女方身份证：</b>" . $rowGen['f_identity'] . "</div>";
            echo "<div class='item'><b>女方出生日期：</b>" . $rowGen['f_birth'] . "</div>";
            echo "</div><div class='row'>";
            echo "<div class='item' style='width: 100%'><b>住址：</b>" . $rowGen['address'] . "</div>";
            echo "</div><div class='row'>";
            echo "<div class='item'><b>男方姓名：</b>" . $rowGen['m_name'] . "</div>";
            echo "<div class='item'><b>男方年龄：</b>" . $rowGen['m_age'] . "</div>";
            echo "<div class='item'><b>男方职业：</b>" . $rowGen['m_profession'] . "</div>";
            echo "<div class='item'><b>男方民族：</b>" . $rowGen['m_ethnic'] . "</div>";
            echo "</div><div class='row'>";
            echo "<div class='item'><b>男方教育程度：</b>" . $rowGen['m_education'] . "</div>";
            echo "<div class='item'><b>男方电话：</b>" . $rowGen['m_tel'] . "</div>";
            echo "<div class='item'><b>男方身份证：</b>" . $rowGen['m_identity'] . "</div>";
            echo "<div class='item'><b>男方出生日期：</b>" . $rowGen['m_birth'] . "</div>";
            echo "</div><h3><i class='fas fa-notes-medical'></i>病情</h3>";
            echo "<div class='row'><label>主诉</label><div class='text'>" . $rowGen['p_main'] . "</div></div>";
            echo "<div class='row'><label>现病史</label><div class='text'>" . $rowGen['p_history_now'] . "</div></div>";
            echo "<div class='row'><label>现症</label><div class='text'>" . $rowGen['p_symptom'] . "</div></div>";
            echo "<div class='row'><label>个人史</label><div class='text'>" . $rowGen['p_history_person'] . "</div></div>";
            echo "<div class='row'><label>既往史</label><div class='text'>" . $rowGen['p_history_back'] . "</div></div>";
            echo "<div class='row'><label>家族史</label><div class='text'>" . $rowGen['p_history_family'] . "</div></div>";
            echo "<div class='row'><label>月经史</label><div class='text'>" . $rowGen['p_history_period'] . "</div></div>";
            echo "<div class='row'><label>婚育史</label><div class='text'>" . $rowGen['p_history_pregnancy'] . "</div></div>";
            // echo "<div class='row'><label>性激素检查</label><div class='text'>" . $rowGen['p_hormone'] . "</div></div>";
            // echo "<div class='row'><label>输卵管造影</label><div class='text'>" . $rowGen['p_contrast'] . "</div></div>";
            // echo "<div class='row'><label>子宫内膜活检</label><div class='text'>" . $rowGen['p_biopsy'] . "</div></div>";
            // echo "<div class='row'><label>宫腔镜检查</label><div class='text'>" . $rowGen['p_inspect'] . "</div></div>";
            echo "<div class='row'><label>身高</label><div class='text'>" . $rowGen['p_height'] . "</div></div>";
            echo "<div class='row'><label>体重</label><div class='text'>" . $rowGen['p_weight'] . "</div></div>";
            echo "<div class='row'><label>BMI</label><div class='text'>" . $rowGen['p_bmi'] . "</div></div>";
            echo "<div class='row'><label>腰围</label><div class='text'>" . $rowGen['p_waistline'] . "</div></div>";
            echo "<div class='row'><label>臀围</label><div class='text'>" . $rowGen['p_hip'] . "</div></div>";
            echo "<div class='row'><label>腰臀比</label><div class='text'>" . $rowGen['p_ratio'] . "</div></div>";
            echo "<div class='row'><label>SDS</label><div class='text'>" . $rowGen['p_sds'] . "</div></div>";
            echo "<div class='row'><label>SAS</label><div class='text'>" . $rowGen['p_sas'] . "</div></div>";
            echo "<div class='row'><label>毛发分布</label><div class='text'>" . $rowGen['p_hair'] . "</div></div>";
            echo "<div class='row'><label>乳房（溢乳）</label><div class='text'>" . $rowGen['p_breast'] . "</div></div>";
            echo "<div class='row'><label>妇科检查</label><div class='text'>" . $rowGen['p_gynecology'] . "</div></div>";
            echo "<div class='row'><label>B超检查</label><div class='text'>" . $rowGen['p_b'] . "</div></div>";
            echo "<div class='row'><label>西医诊断</label><div class='text'>" . $rowGen['p_western'] . "</div></div>";
            echo "<div class='row'><label>中医病名</label><div class='text'>" . $rowGen['p_eastern'] . "</div></div>";
            echo "<div class='row'><label>中医证型</label><div class='text'>" . $rowGen['p_license'] . "</div></div>";
            echo "<div class='row'><label>诊疗计划</label><div class='text'>" . $rowGen['p_plan'] . "</div></div>";
        }
        ?>
        <h3><i class="fas fa-file-alt"></i>附属文字</h3>
        <?php
        $textSQL = "SELECT addition_title, addition_content FROM info_addition WHERE patient_id=" . $patient;
        $textResult = $conn->query($textSQL);
        $textCount = 1;
        if ($textResult->num_rows == 0)
            echo "<h4>无</h4>";
        else {
            while ($rowText = $textResult->fetch_assoc()) {
                echo "<h4><i class=\"fas fa-list-ol\"></i>" . $textCount . "</h4>";
                echo "<div class='row'><label>" . $rowText["addition_title"] . "</label><div class='text'>" . $rowText['addition_content'] . "</div></div>";
                $textCount++;
            }
        }
        ?>
        <h3><i class="fas fa-image"></i>附属图片</h3>
        <?php
        $imgSQL = "SELECT image_address FROM info_image WHERE patient_id=" . $patient;
        $imgResult = $conn->query($imgSQL);
        $imgCount = 1;
        if ($imgResult->num_rows == 0)
            echo "<h4>无</h4>";
        else {
            while ($rowImg = $imgResult->fetch_assoc()) {
                echo "<h4><i class=\"fas fa-list-ol\"></i>" . $imgCount . "</h4>";
                echo "<div class=\"imgBlock\">";
                echo "<img alt='附属图片' src='" . $rowImg['image_address'] . "' />";
                echo "</div>";
                $imgCount++;
            }
        }
        ?>
        <h3><i class="fas fa-file-pdf"></i>附属文档</h3>
        <?php
        $docSQL = "SELECT doc_address FROM info_doc WHERE patient_id=" . $patient;
        $docResult = $conn->query($docSQL);
        $docCount = 1;
        if ($docResult->num_rows == 0)
            echo "<h4>无</h4>";
        else {
            while ($rowDoc = $docResult->fetch_assoc()) {
                echo "<h4><i class=\"fas fa-list-ol\"></i>" . $docCount . "</h4>";
                echo "<embed class='pdfBlock' src='" . $rowDoc['doc_address'] . "' />";
                $docCount++;
            }
        }
        ?>
    </div>
</div>
<script src="js/contentScrollbar.js"></script>