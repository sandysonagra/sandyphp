$(document).ready(function() {

    //get all student
    getAllStudent();

    function getAllStudent() {
        $.ajax({
            url: "get_all_student.php",
            method: "POST",
            dataType: "json",
            success: function(res) {
                // console.log(res);
                getUser(res.userdata)
            }
        });

        function getUser(response) {
            var data = "";
            $.each(response, function(index, value) {
                data += "<tr>";
                data += "<td>" + value.ID + "</td>"; //(index+1)
                data += "<td>" + value.FIRSTNAME + "</td>";
                data += "<td>" + value.LASTNAME + "</td>";
                data += "<td>" + value.EMAIL + "</td>";
                data += "<td>" + value.GENDER + "</td>";
                data += "<td>" + value.HOBBY + "</td>";
                data += "<td data-action=" + value.ID + "><button class='btn btn-info btnEdt' id='edit'>EDIT</button>";
                data += "<button class='btn btn-danger btnDel ml-2' id='delete'>DELETE</button></td>";
                data += "</tr>";
            });
            $("tbody").html(data);
        }
    }

    // Add Student
    $("#btnAddStudent").click(function() {
        $.ajax({
            url: "addstudent.php",
            method: "POST",
            data: $("#form").serialize(),
            success: function(res) {
                // console.log(res);
                toastr.success(res, "Successfully Added", {
                    timeOut: 1000
                });
                getAllStudent();
                $("#myModal").modal("hide");
                $("#firstname").val("");
                $("#lastname").val("");
                $("#email").val("");
                $('input[name="gender"]').prop('checked', false);
                $('#cricket, #hockey, #kho-kho, #volleyball, #kabaddi, #football').prop('checked', false);
                // $("#btnAddStudent").hide();
                // $("#btnUpdateStudent").show();
            },
        });
    });

    // delete student

    $("body").on("click", ".btnDel", function() {
        var id = $(this).parent("td").data("action");
        // alert(id);
        $.ajax({
            url: "delete_student.php",
            method: "post",
            data: {
                uid: id
            },
            success: function(res) {
                // alert(res);
                $(this).parent("td").parent("tr").remove();
                toastr.success(res, "Student Delete", {
                    timeOut: 1000
                });
                getAllStudent();
            }
        })
    });

    // edit student

    $("body").on('click', ".btnEdt", function() {
        var id = $(this).parent("td").data("action");
        $("#vid").val(id);
        // console.log(id);
        // console.log(id);
        var fname = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
        // console.log(fname);
        var lname = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
        // console.log(lname);
        var eml = $(this).parent("td").prev("td").prev("td").prev("td").text();
        // console.log(eml);
        var gen = $(this).parent("td").prev("td").prev("td").text();
        // console.log(gen);
        var hob = $(this).parent("td").prev("td").text();
        // console.log(hob);

        $("#idfirstname").val(id);
        $("#firstname").val(fname);
        $("#lastname").val(lname);
        $("#email").val(eml);
        if (gen === "male") {
            $("#male").prop("checked", true);
        } else if (gen === "female") {
            $("#female").prop("checked", true);
        } else if (gen === "other") {
            $("#other").prop("checked", true);
        }
        var hobbies = hob.split(', '); // Assuming hobbies are stored as a comma-separated string
        hobbies.forEach(function(hobby) {
            $("#" + hobby).prop("checked", true);
        });

        $("#myModal").modal('show');
        $("#btnAddStudent").hide();
        $("#btnUpdateStudent").show();
    });


    $("#btnUpdateStudent").click(function() {
        // var sid = $("#vid").val();
        // console.log(sid);
        // var id = $(this).parent("td").data("action");
        // console.log(id);
        // var sid = $("#vid").val();
        // console.log(sid);

        $.ajax({
            url: "update_student.php",
            method: "POST",
            data: $("#form").serialize(),
            success: function(res) {
                alert(res);
                $("#firstname").val("");
                $("#lastname").val("");
                $("#email").val("");
                $('input[name="gender"]').prop('checked', false);
                $('#cricket, #hockey, #kho-kho, #volleyball, #kabaddi, #football').prop('checked', false);
                toastr.success(res, "Student Updated", {
                    timeOut: 3000
                });
                // getAllStudent();
                $("#myModal").modal('hide');
            }
        });
    });

    $("#btncreate").click(function(){

        $("#btnAddStudent").show();
        $("#btnUpdateStudent").hide();

    });

});