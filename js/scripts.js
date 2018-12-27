//登录与注册切换
function buttonSignin() {
    document.getElementById('logTag').style.display = 'block';
    document.getElementById('regisTag').style.display = 'none';
}
function buttonRegister() {
    document.getElementById('logTag').style.display = 'none';
    document.getElementById('regisTag').style.display = 'block';
}


//Reset forms
function resetInviteForm() {
    document.getElementById("invite_form").reset();
}
function resetCreateForm() {
    document.getElementById("create_form").reset();
}

//Confirm password check
function registerCheck() {
    if (document.getElementById('register_password').value != document.getElementById('register_confirm').value) {
        document.getElementById('matchCheck').style.border = '1px solid red';
        document.getElementById('registerBtn').disabled = true;
        document.getElementById('registerBtn').style.cursor = 'not-allowed';
    } else {
        document.getElementById('matchCheck').style.border = 'none';
        document.getElementById('registerBtn').disabled = false;
        document.getElementById('registerBtn').style.cursor = 'pointer';
    }
}

//Invite user period check
function setPeriodCheck() {
    var start = new Date(document.getElementById('startTime').value).getTime() / 1000;
    var end = new Date(document.getElementById('endTime').value).getTime() / 1000
    if (end < start) {
        document.getElementById('endTimeLi').style.border = '1px solid red';
        document.getElementById('inviteBtn').disabled = true;
        document.getElementById('inviteBtn').style.cursor = 'not-allowed';
    } else {
        document.getElementById('endTimeLi').style.border = '1px solid #DDDDDD';
        document.getElementById('inviteBtn').disabled = false;
        document.getElementById('inviteBtn').style.cursor = 'pointer';
    }
}

//添加附属信息功能
//添加文字信息
var countText = 1;
function addition_info_text() {
    var addLi = document.createElement("li");
    var additionTitle = "additionTitle_" + countText;
    var additionContent = "additionContent_" + countText;
    //input
    var addTitle = document.createElement("input");
    addTitle.setAttribute("class", "add_text_title");
    addTitle.setAttribute("placeholder", ">请添加标题");
    addTitle.setAttribute("name", additionTitle);
    //textarea
    var addText = document.createElement("textarea");
    addText.setAttribute("type", "text");
    addText.setAttribute("placeholder", ">请添加内容");
    addText.setAttribute("onkeyup", "addition_adjust(this)");
    addText.setAttribute("name", additionContent);

    addLi.appendChild(addTitle);
    addLi.appendChild(addText);
    document.getElementById("addition_info").appendChild(addLi);
    document.getElementById("additionTextCount").setAttribute("value", countText.toString());
    countText++;
}
function addition_adjust(h) {
    h.style.height = "17px";
    h.style.height = (h.scrollHeight) + "px";
}
//添加图片信息
var countPic = 1;
function addition_info_pic() {
    var additionPic = "additionPic_" + countPic;
    var addDiv = document.createElement("div");
    addDiv.setAttribute("class", "picLabel");

    var addLabel = document.createElement("label");
    var addLabelId = additionPic + "_label";
    addLabel.setAttribute("for", additionPic);
    addLabel.setAttribute("id", addLabelId);
    addLabel.innerHTML = "点击选择图片";

    var addPic = document.createElement("input");
    addPic.setAttribute("type", "file");
    addPic.setAttribute("id", additionPic);
    addPic.setAttribute("name", additionPic);
    addPic.setAttribute("style", "display:none");
    addPic.setAttribute("accept", ".jpg, .png");
    addPic.setAttribute("onchange", "showNamePic(" + countPic + ")");

    addDiv.appendChild(addLabel);
    addDiv.appendChild(addPic);
    document.getElementById("addition_pic").appendChild(addDiv);
    document.getElementById("additionPicCount").setAttribute("value", countPic.toString());
    countPic++;
}
function showNamePic(count) {
    var inputId = "additionPic_" + count;
    var labelId = inputId + "_label";
    var fileName = document.getElementById(inputId).files.item(0).name;

    document.getElementById(labelId).textContent = fileName;
}
//添加文档信息
var countDoc = 1;
function addition_info_doc() {
    var additionDoc = "additionDoc_" + countDoc;
    var addCon = document.createElement("div");
    addCon.setAttribute("class", "picLabel");

    var addLabel = document.createElement("label");
    var addLabelId = additionDoc + "_label";
    addLabel.setAttribute("for", additionDoc);
    addLabel.setAttribute("id", addLabelId);
    addLabel.innerHTML = "点击选择文档";

    var addDoc = document.createElement("input");
    addDoc.setAttribute("type", "file");
    addDoc.setAttribute("id", additionDoc);
    addDoc.setAttribute("name", additionDoc);
    addDoc.setAttribute("style", "display:none");
    addDoc.setAttribute("accept", ".pdf");
    addDoc.setAttribute("onchange", "showNameDoc(" + countDoc + ")");

    addCon.appendChild(addLabel);
    addCon.appendChild(addDoc);
    document.getElementById("addition_doc").appendChild(addCon);
    document.getElementById("additionDocCount").setAttribute("value", countDoc.toString());
    countDoc++;
}
function showNameDoc(count) {
    var inputId = "additionDoc_" + count;
    var labelId = inputId + "_label";
    var fileName = document.getElementById(inputId).files.item(0).name;

    document.getElementById(labelId).textContent = fileName;
}

//浏览所有病例搜索
function browseSearch() {
    // Declare variables 
    var input, filter, table, tr;
    input = document.getElementById("browseInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("browseTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (var i = 0; i < tr.length; i++) {
        for (var j=1; j<=11; j++) {
            var td = tr[i].getElementsByTagName("td")[j];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                }
                tr[i].style.display = "none";
            }
        }
    }
}

//删除病历
function deleteCase() {
    console.log('1');
}

//Check register username duplication
function usernameDuplication (username) {
    if (username == "") {
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
                if (this.responseText == 1) {
                    document.getElementById('usernameCheck').style.border = '1px solid red';
                    document.getElementById('registerBtn').disabled = true;
                    document.getElementById('registerBtn').style.cursor = 'not-allowed';
                } else {
                    document.getElementById('usernameCheck').style.border = 'none';
                    document.getElementById('registerBtn').disabled = false;
                    document.getElementById('registerBtn').style.cursor = 'pointer';
                }
            }
        };
        xmlhttp.open("GET","ajax/usernameCheck.php?q="+username,true);
        xmlhttp.send();
    }
}