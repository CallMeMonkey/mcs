<?php
/**
 * Created by PhpStorm.
 * User: Monkey
 * Date: 9/19/18
 * Time: 3:09 PM
 */
require 'header/connect.php';
require 'data/columnData.php';
?>
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("levelTwo").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("levelTwo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/select.php?q="+str,true);
        xmlhttp.send();
    }
}
function levelTwoChange() {
    var getLevelOne = document.getElementById('selectLevelOne').value;
    var getLevelTwo = document.getElementById('selectLevelTwo').value;
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("getSelectResult").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","ajax/selectResult.php?one="+getLevelOne+"&two="+getLevelTwo,true);
    xmlhttp.send();
}

</script>
<div class="content floatRight">
    <div class="search">
        <select onchange="showUser(this.value)" id="selectLevelOne">
            <option value="">请选择：</option>
            <?php
            for ($i = 0; $i <= 43; $i++) {
                echo "<option value='" . $itemName[$i] . "'>" . $itemTitle[$i] . "</option>";
            }
            ?>
        </select>
        <div id="levelTwo"></div>
        <div id="getSelectResult"></div>
    </div>
</div>
<?php
$conn->close();
?>