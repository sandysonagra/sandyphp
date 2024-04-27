<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud ajax</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        .error {
            color: red;
        }
    </style>


</head>

<body>
    <div class="container">
        <div class="alert alert-info text-center">
            <h2>STUDENT INFORMATION</h2>
        </div>
        <!-- Button to Open the Modal -->
        <button type="button" id="btncreate" class="btn btn-success float-left" data-toggle="modal"
            data-target="#myModal">
            Add New Student Information
        </button><br><br>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Student Information</h4>
                        <button type="button" class="close"></button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" method="post" id="form">
                            <div>
                                <input type="hidden" name="sid" id="vid">
                                <label for="firstname" class="form-label">Firstname:</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" />
                                <span id="fnameerror" class="error"></span>
                                <!-- <span class="error" id="fname_error"></span> -->
                            </div>
                            <div>
                                <label for="lastname" class="form-label">Lastname:</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" />
                                <span id="lnameerror" class="error"></span>

                                <!-- <span class="error" id="lname_error"></span> -->
                            </div>
                            <div>
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" />
                                <span id="emailerror" class="error"></span>

                                <!-- <span class="error" id="email_error"></span> -->
                            </div><br>

                            <div>
                                Gender:
                                <div>
                                    <input type="radio" id="male" name="gender" class="gender" value="male"> Male
                                    <input type="radio" id="female" name="gender" class="gender" value="female"> Female
                                    <input type="radio" id="other" name="gender" class="gender" value="other"> Other
                                    <br>
                                    <span id="gendererror" class="error"></span>
                                    <!-- <span class="error" id="gender_error"></span> -->
                                </div>
                            </div>

                            <div>
                                Hobby:
                                <div>
                                    <input type="checkbox" id="cricket" name="hobby[]" class="hobby" value="cricket">
                                    cricket
                                    <input type="checkbox" id="hockey" name="hobby[]" class="hobby" value="hockey">
                                    hockey
                                    <input type="checkbox" id="kho-kho" name="hobby[]" class="hobby" value="kho-kho">
                                    kho-kho <br>
                                    <input type="checkbox" id="volleyball" name="hobby[]" class="hobby"
                                        value="volleyball"> volleball
                                    <input type="checkbox" id="kabaddi" name="hobby[]" class="hobby" value="kabaddi">
                                    kabaddi
                                    <input type="checkbox" id="football" name="hobby[]" class="hobby" value="football">
                                    football <br>
                                    <span id="hobbyerror" class="error"></span>

                                    <!-- <span class="error" id="hobby_error"></span> -->
                                </div>

                            </div><br>


                        </form>

                    </div>

                    <!-- Modal footer -->
                    <button type="submit" id="btnAddStudent" class="btn btn-success">ADD</button>
                    <button type="button" id="btnUpdateStudent" class="btn btn-dark">UPDATE</button>
                    <button type="button" id="btnClosestudent" class="btn btn-danger"
                        data-dismiss="modal">Close</button>

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
        $(document).ready(function () {


            //get all student
            getAllStudent();

            function getAllStudent() {
                $.ajax({
                    url: "get_all_student.php",
                    method: "POST",
                    dataType: "json",
                    success: function (res) {
                        // console.log(res);
                        getUser(res.userdata)
                    }
                });

                function getUser(response) {
                    var data = "";
                    $.each(response, function (index, value) {
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



            $(document).ready(function () {
                //get all student

                getAllStudent();

                function getAllStudent() {
                    $.ajax({
                        url: "get_all_student.php",
                        method: "POST",
                        dataType: "json",
                        success: function (res) {
                            // console.log(res);
                            getUser(res.userdata)
                        }
                    });

                    function getUser(response) {
                        var data = "";
                        $.each(response, function (index, value) {
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
                $("#btnAddStudent").click(function () {

                    $('#fnameerror').text("");
                    $('#lnameerror').text("");
                    $('#emailerror').text("");
                    $('#gendererror').text("");
                    $('#hobbyerror').text("");

                    $.ajax({
                        url: "addstudent.php",
                        method: "POST",
                        dataType: "json",
                        data: $("#form").serialize(),
                        success: function (res) {

                            if (res.status == 0) {
                                var errorMessages = Object.values(res.errors).join('<br>');
                                console.log(errorMessages);
                                $("#fnameerror").text(res.errors.firstname);
                                $("#lnameerror").html(res.errors.lastname);
                                $("#emailerror").html(res.errors.email);
                                $("#gendererror").html(res.errors.gender);
                                $("#hobbyerror").html(res.errors.hobby);
                                toastr.error(errorMessages, "Error", {
                                    timeOut: 3000
                                });
                            }
                            if (res.successstatus == 1) {
                                toastr.success("Successfully Added", "Success", {
                                    timeOut: 1000
                                });
                                getAllStudent();
                                $("#myModal").modal("hide");

                                $("#firstname").val("");
                                $("#lastname").val("");
                                $("#email").val("");
                                $('input[name="gender"]').prop('checked', false);
                                $('#cricket, #hockey, #kho-kho, #volleyball, #kabaddi, #football').prop('checked', false);

                            }
                        },
                    });
                });
            });

            // close button

            $("#btnClosestudent").click(function () {
                $('#fnameerror').text("");
                $('#lnameerror').text("");  
                $('#emailerror').text("");
                $('#gendererror').text("");
                $('#hobbyerror').text("");
                $("#myModal").modal("hide");
                $("#firstname").val("");
                $("#lastname").val("");
                $("#email").val("");
                $('input[name="gender"]').prop('checked', false);
                $('#cricket, #hockey, #kho-kho, #volleyball, #kabaddi, #football').prop('checked', false);
            })
            // delete student

            $("body").on("click", ".btnDel", function () {
                var id = $(this).parent("td").data("action");
                // alert(id);
                $.ajax({
                    url: "delete_student.php",
                    method: "post",
                    data: {
                        uid: id
                    },
                    success: function (res) {
                        // alert(res);
                        $(this).parent("td").parent("tr").remove();
                        toastr.error(res, "Student Deleted", {
                            timeOut: 1000
                        });
                        getAllStudent();
                    }
                })
            });

            // edit student

            $("body").on('click', ".btnEdt", function () {
                $('#fnameerror').text("");
                $('#lnameerror').text("");
                $('#emailerror').text("");
                $('#gendererror').text("");
                $('#hobbyerror').text("");
                var id = $(this).parent("td").data("action");
                $("#vid").val(id);
                var fname = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
                var lname = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
                var eml = $(this).parent("td").prev("td").prev("td").prev("td").text();
                var gen = $(this).parent("td").prev("td").prev("td").text();
                var hob = $(this).parent("td").prev("td").text();

                // $("#idfirstname").val(id);
                $("#firstname").val(fname);
                $("#lastname").val(lname);
                $("#email").val(eml);
                if (gen == "male") {
                    $("#male").prop("checked", true);
                } else if (gen == "female") {
                    $("#female").prop("checked", true);
                } else if (gen == "other") {
                    $("#other").prop("checked", true);
                }
                var hobbies = hob.split(', ');
                hobbies.forEach(function (hobby) {
                    $("#" + hobby).prop("checked", true);
                });

                $("#myModal").modal('show');
                $("#btnAddStudent").hide();
                $("#btnUpdateStudent").show();


            });


            $("#btnUpdateStudent").click(function () {

                $('#fnameerror').text("");
                $('#lnameerror').text("");
                $('#emailerror').text("");
                $('#gendererror').text("");
                $('#hobbyerror').text("");

                $.ajax({
                    url: "update_student.php",
                    method: "POST",
                    dataType: "json",
                    data: $("#form").serialize(),
                    success: function (res) {

                        if (res.status == 0) {
                            var errorMessages = Object.values(res.errors).join('<br>');
                            $("#fnameerror").text(res.errors.firstname);
                            $("#lnameerror").html(res.errors.lastname);
                            $("#emailerror").html(res.errors.email);
                            $("#gendererror").html(res.errors.gender);
                            $("#hobbyerror").html(res.errors.hobby);
                            toastr.error(errorMessages, "Error", {
                                timeOut: 3000
                            });
                        }
                        if (res.successstatus == 1) {
                            toastr.success("Successfully updated", "successfully updated", {
                                timeOut: 1000
                            });
                            getAllStudent();
                            $("#myModal").modal("hide");
                            $("#firstname").val("");
                            $("#lastname").val("");
                            $("#email").val("");
                            $('input[name="gender"]').prop('checked', false);
                            $('#cricket, #hockey, #kho-kho, #volleyball, #kabaddi, #football').prop('checked', false);
                        }

                        if (res.status == 0 || res.successstatus == 1) {



                        }


                    }
                });
            });

            $("#btncreate").click(function () {
                // $("#firstname").val("");
                // $("#lastname").val("");
                // $("#email").val("");
                // $('input[name="gender"]').prop('checked', false);
                // $('#cricket, #hockey, #kho-kho, #volleyball, #kabaddi, #football').prop('checked', false);
                $('#fnameerror').text("");
                $('#lnameerror').text("");
                $('#emailerror').text("");
                $('#gendererror').text("");
                $('#hobbyerror').text("");
                $("#form")[0].reset();
                $("#btnAddStudent").show();
                $("#btnUpdateStudent").hide();


            });
        });
    </script>

</body>

</html>