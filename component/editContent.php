<?php
/**
 * Created by PhpStorm.
 * User: hcall
 * Date: 12/05/2018
 * Time: 20:49
 */
require 'header/connect.php';
require 'data/columnData.php';

?>
    <div class="content floatRight" id="content">
        <div class="create">
            <h2>修改病历</h2>
            <h3><i class="fas fa-id-card-alt floatLeft"></i>请修改下列通用信息</h3>
            <form method="post" action="process/editPatientProcess.php" name="editForm">
                <ul>
                    <?php
                    //通用信息
                    $editSQL = "SELECT * FROM info_patient WHERE patient_id=" . $_POST['editPatient'];
                    $editResult = $conn->query($editSQL);
                    while ($rowEdit = $editResult->fetch_assoc()) {
                        for ($i = 0; $i <= 43; $i++) {
                            echo "<li><label>" . $itemTitle[$i] . "</label>";
                            if ($i <= 19) {
                                if ($i == 1 || $i == 10 || $i == 19)
                                    echo "<input type='date' name='" . $itemName[$i] . "' value='" . $rowEdit[$itemName[$i]] . "' /></li>";
                                else
                                    echo "<input type='text' name='" . $itemName[$i] . "' value='" . $rowEdit[$itemName[$i]] . "' /></li>";
                            } else {
                                echo "<textarea type='text' name='" . $itemName[$i] . "' onkeyup=\"addition_adjust(this)\">" . $rowEdit[$itemName[$i]] . "</textarea></li>";
                            }
                        }
                    }
                    ?>
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
                    <input type="hidden" name="editPatient" value="<?php echo $_POST['editPatient']; ?>"/>
                </ul>
            </form>
        </div>
    </div>
    <div class="editFooter">
        <input type="button" class="fb fbGreen floatLeft" value="提交" style="margin: 0 20px;" onclick="editConfirm()"/>
        <form method='post' action='patientDetail.php'>
            <?php
            echo "<input value='" . $_POST['editPatient'] . "' type='hidden' name='passPatient' />";
            ?>
            <input type="submit" class="fb fbRed floatLeft" value="返回"/>
        </form>
    </div>
    <script>
        var textarea = document.getElementsByTagName('textarea');
        var i;
        for (i = 0; i < textarea.length; i++) {
            if (textarea[i].scrollHeight >= 20)
                textarea[i].style.height = textarea[i].scrollHeight + "px";
        }

        function editConfirm() {
            if (confirm('确认修改此病历？')) {
                document.editForm.submit();
            }
        }
    </script>
    <script src="js/contentScrollbar.js"></script>
<?php
$conn->close();
?>