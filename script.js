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