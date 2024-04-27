<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud ajax</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


</head>

<body>
    <div class="container">
        <div class="alert alert-info text-center">
            <h2>STUDENT INFORMATION</h2>
        </div>
        <!-- Button to Open the Modal -->
        <button type="button" id="btncreate" class="btn btn-success float-right" data-toggle="modal" data-target="#myModal">
            Add New Student Information
        </button><br><br>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Student Information</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" method="post" id="form">
                            <div>
                                <input type="hidden" name="sid" id="vid">
                                <label for="firstname" class="form-label">Firstname:</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" />
                                <span class="error" id="fname_error"></span>
                            </div>
                            <div>
                                <label for="lastname" class="form-label">Lastname:</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" />
                                <span class="error" id="lname_error"></span>
                            </div>
                            <div>
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" />
                                <span class="error" id="email_error"></span>
                            </div><br>

                            <div>
                                Gender:
                                <div>
                                    <input type="radio" id="male" name="gender" class="gender" value="male">Male
                                    <input type="radio" id="female" name="gender" class="gender" value="female">Female
                                    <input type="radio" id="other" name="gender" class="gender" value="other">other<br><br>
                                    <span class="error" id="gender_error"></span>
                                </div>
                            </div>

                            <div>
                                Hobby:
                                <div>
                                    <input type="checkbox" id="cricket" name="hobby[]" class="hobby" value="cricket"> cricket
                                    <input type="checkbox" id="hockey" name="hobby[]" class="hobby" value="hockey"> hockey
                                    <input type="checkbox" id="kho-kho" name="hobby[]" class="hobby" value="kho-kho"> kho-kho <br>
                                    <input type="checkbox" id="volleyball" name="hobby[]" class="hobby" value="volleyball">volleball
                                    <input type="checkbox" id="kabaddi" name="hobby[]" class="hobby" value="kabaddi"> kabaddi
                                    <input type="checkbox" id="football" name="hobby[]" class="hobby" value="football"> football
                                    <span class="error" id="hobby_error"></span>
                                </div>

                            </div><br>


                        </form>
                    </div>

                    <!-- Modal footer -->
                    <button type="submit" id="btnAddStudent" class="btn btn-success">ADD</button>
                    <button type="button" id="btnUpdateStudent" class="btn btn-dark">UPDATE</button>
                    <button type="button" id="btnClosestudent" class="btn btn-danger" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>

        <!-- manage Student -->

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FIRSTNAME</th>
                    <th>LASTNAME</th>
                    <th>EMAIL</th>
                    <th>GENDER</th>
                    <th>HOBBY</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>



    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#form").validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                    email: "required",
                    gender: "required",
                    'hobby[]': "required",
                },
                messages: {
                    firstname: "Please enter your name",
                    lastname: "Please enter your last name",
                    email: "Please enter your email",
                    gender: "Please select your gender",
                    'hobby[]': "Please select hobby",
                }
            });

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
                        if (res=="please enter your value") {
                            toastr.error(res, "please enter all the value first", {
                                timeOut: 1000
                            });
                        } else {
                            $("#firstname").val("");
                            $("#lastname").val("");
                            $("#email").val("");
                            $('input[name="gender"]').prop('checked', false);
                            $('#cricket, #hockey, #kho-kho, #volleyball, #kabaddi, #football').prop('checked', false);
                            $("#myModal").modal("hide");
                            toastr.success(res, "Successfully Added", {
                                timeOut: 1000
                            });

                        }
                        getAllStudent();

                    },
                });
            });


            // close button

            $("#btnClosestudent").click(function() {
                $("#myModal").modal("hide");
                $("#firstname").val("");
                $("#lastname").val("");
                $("#email").val("");
                $('input[name="gender"]').prop('checked', false);
                $('#cricket, #hockey, #kho-kho, #volleyball, #kabaddi, #football').prop('checked', false);
            })
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
                        toastr.error(res, "Student Deleted", {
                            timeOut: 3000
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
                $.ajax({
                    url: "update_student.php",
                    method: "POST",
                    data: $("#form").serialize(),
                    success: function(res) {

                        $("#firstname").val("");
                        $("#lastname").val("");
                        $("#email").val("");
                        $('input[name="gender"]').prop('checked', false);
                        $('#cricket, #hockey, #kho-kho, #volleyball, #kabaddi, #football').prop('checked', false);
                        toastr.success(res, "Student Updated", {
                            timeOut: 3000

                        });
                        getAllStudent();
                        $("#myModal").modal('hide');
                    }
                });
            });

            $("#btncreate").click(function() {

                $("#btnAddStudent").show();
                $("#btnUpdateStudent").hide();

            });

        });
    </script>


</body>

</html>

<?php

include("config.php");
// include_once "config.php";
// print_r ($_POST);
// exit;

$fname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
$lname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
$hobbies = isset($_POST['hobby']) ? $_POST['hobby'] : array();
$hobby = implode(', ', $hobbies);

// $hobby = isset($_POST['hobby']) ? $_POST['hobby'] : "";
// $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
// $hobby = isset($_POST['hobby']) ? implode(', ', $_POST['hobby']) : null;

if ($fname == ""  || $lname== "" || $email== ""  || $gender == "" || $hobby == "" ) {
    echo"please enter your value";
}
else {
$sql = mysqli_query($conn, "INSERT INTO `student`(`FIRSTNAME`, `LASTNAME`, `EMAIL`, `GENDER`, `HOBBY`) VALUES ('$fname','$lname','$email','$gender','$hobby')");

if ($sql) {

    echo "add student";
}

}









include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = $_POST['sid'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$hobbies = implode(", ", $_POST['hobby']);

$sql = mysqli_query($conn,"UPDATE `student` SET `FIRSTNAME`='$fname', `LASTNAME`='$lname', `EMAIL`='$email', `GENDER`='$gender', `HOBBY`='$hobbies' WHERE ID='$id'");

$row = mysqli_affected_rows($conn);

if ($row) {
    echo"student updated";
}
else{
    echo "student not updated";
}


}

?>  


 -->
