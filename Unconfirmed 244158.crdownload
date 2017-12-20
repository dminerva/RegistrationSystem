function getDept(val) {
	$.ajax({
        type: "POST",
        url: "get_Sub.php",
        data:'dept_id='+val,
        success: function(data){
            $("#sub").html(data);
        }
	});    
}

function getPre(val) {
    $.ajax({
        type: "POST",
        url: "get_Pre.php",
        data:'pre_id='+val,
        success: function(data){
            $("#delPre").html(data);
        }
	}); 
}

function getProf(val) {
    $.ajax({
        type: "POST",
        url: "get_Prof.php",
        data:'course_id='+val,
        success: function(data){
            $("#prof").html(data);
        }
	});     
}

function getProfFromCRN(val) {
    $.ajax({
        type: "POST",
        url: "get_ProfFromCRN.php",
        data:'crn='+val,
        success: function(data){
            $("#prof").html(data);
        }
	});     
}

function getCourseData(val) {
    $.ajax({
        type: "POST",
        url: "get_CourseData.php",
        data:'course_id='+val,
        success: function(data){
            $("#course_data").html(data);
        }
	});
}

function getMajorData(val) {
    $.ajax({
        type: "POST",
        url: "get_MajorData.php",
        data:'major_id='+val,
        success: function(data){
            $("#major_data").html(data);
        }
	});    
}

function getUserData(val) {
    $.ajax({
        type: "POST",
        url: "get_UserData.php",
        data:'user_data='+val,
        success: function(data){
            $("#user_data").html(data);
        }
	}); 
}

function getDeptData(val) {
    $.ajax({
        type: "POST",
        url: "get_DeptData.php",
        data:'dept_id='+val,
        success: function(data){
            $("#dept_data").html(data);
        }
	}); 
}
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
currentPassword.focus();
document.getElementById("currentPassword").innerHTML = "required";
output = false;
}
else if(!newPassword.value) {
newPassword.focus();
document.getElementById("newPassword").innerHTML = "required";
output = false;
}
else if(!confirmPassword.value) {
confirmPassword.focus();
document.getElementById("confirmPassword").innerHTML = "required";
output = false;
}
if(newPassword.value != confirmPassword.value) {
newPassword.value="";
confirmPassword.value="";
newPassword.focus();
document.getElementById("confirmPassword").innerHTML = "not same";
output = false;
} 	
return output;
}