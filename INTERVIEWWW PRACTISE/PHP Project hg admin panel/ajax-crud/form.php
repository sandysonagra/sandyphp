<!doctype html>
<html lang="en">

<head>
    <title>AJAX Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container border border-secondary border-5">
        <div class="text-center bg-info mt-3 ">
            <h1><b>User Data</b></h1>
        </div>
        <div class="text-end mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="clearform()">
                New Form
            </button>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">User Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="p-3" id="myform">

                            <div class="mb-3 p-2">
                                <label for="name" class="form-label">Name :</label>
                                <input type="text" name="name" class="form-control" id="name">
                                <span class="text-danger" id="nameERR"></span>

                            </div>
                            <div class="mb-3 p-2">
                                <label for="email" class="form-label">Email :</label>
                                <input type="text" name="email" class="form-control" id="email">
                                <span class="text-danger" id="emailERR"></span>

                            </div>
                            <div class="mb-3 p-2">
                                <label for="password" class="form-label">Password :</label>
                                <input type="text" name="password" class="form-control" id="password">
                                <span class="text-danger" id="passwordERR"></span>

                            </div>
                            <div class="mb-3 p-2">
                                <label for="rollnumber" class="form-label">Roll Number :</label>
                                <input type="text" name="rollnumber" class="form-control" id="rollnumber">
                                <span class="text-danger" id="rollnumberERR"></span>

                            </div>
                            <div class="mb-3 p-2">
                                <label for="gender" class="form-label">Gender :</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="gender" value="male">
                                    <label class="form-check-label">Male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="gender" value="female">
                                    <label class="form-check-label">Female</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="gender" value="other">
                                    <label class="form-check-label">Other</label>
                                </div>
                                <span class="text-danger" id="genderERR"></span>

                            </div>
                            <div class="modal-footer">
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                    <button type='button' class='btn btn-primary' onclick='savedata()'>Save</button>
                                    <button type='button' class='btn btn-warning' id="UpdateID" onclick='updatedata()'>Update</button>
                                <input type="hidden" name="updateID" id="updateID">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text-warning">FORM DATA</h2>
        <div id="record_contant"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        //for dashboard showing
        $(document).ready(function() {
            ReadRecord();

        });

        //clear all form data and error messages
        function clearform() {
            //clearform
            $('#myform')[0].reset();

            //clearform error message
            $('#nameERR').text('');
            $('#emailERR').text('');
            $('#passwordERR').text('');
            $('#rollnumberERR').text('');
            $('#genderERR').text('');
        }

        //dashboard
        function ReadRecord() {
            $.ajax({
                url: 'dashboard.php',
                type: "POST",
                success: function(Response, status) {
                    $('#record_contant').html(Response);
                }
            })
        }


        //submited data
        function savedata() {
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var rollnumber = $('#rollnumber').val();
            var gender = $("input[name='gender']:checked").val();

            $.ajax({
                type: "POST",
                url: "validation.php",
                data: {
                    name: name,
                    email: email,
                    password: password,
                    rollnumber: rollnumber,
                    gender: gender,
                },
                dataType: "JSON",
                success: function(response) {

                    $('#nameERR').text('');
                    $('#emailERR').text('');
                    $('#passwordERR').text('');
                    $('#rollnumberERR').text('');
                    $('#genderERR').text('');

                    console.log(response.status);
                    if (response.status == 200) {
                        ReadRecord();
                        $('#exampleModal').modal('hide');

                    } else {
                        console.log(response);
                        $('#nameERR').text(response.ERROR.name);
                        $('#emailERR').text(response.ERROR.email);
                        $('#passwordERR').text(response.ERROR.password);
                        $('#rollnumberERR').text(response.ERROR.rollnumber);
                        $('#genderERR').text(response.ERROR.gender);

                    }
                },

            });
        }

        //delete data
        function DeleteUser(id) {
            $.ajax({
                type: "POST",
                url: "delete.php",
                data: {
                    id: id,
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.status === 200) {
                        ReadRecord();
                    }
                },
            });
        }

        // get user data from database


        function GetUserDetails(id) {
            $('#UpdateID').val(id);
            console.log(id);
            $.ajax({
                type: "POST",
                url: "edit.php",
                data: {
                    id: id,
                },
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    $('#name').val(response.NAME);
                    $('#email').val(response.EMAIL);
                    $('#password').val(response.PASSWORD);
                    $('#rollnumber').val(response.ROLLNUMBER);
                    $("input[name='gender'][value='" + response.GENDER + "']").prop('checked', true);
                    $('#exampleModal').modal('show');
                },
            });
            $('#exampleModal').modal('show');
        }

        //update data
        function updatedata() {
            var newID = $('#UpdateID').val();
            console.log(newID);

            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var rollnumber = $('#rollnumber').val();
            var gender = $("input[name='gender']:checked").val();
            var updateID = $('#updateID').val();
            $.ajax({
                type: "POST",
                url: "validation.php",
                data: {
                    id: newID,
                    name: name,
                    email: email,
                    password: password,
                    rollnumber: rollnumber,
                    gender: gender,
                },
                dataType: "JSON",
                success: function(response) {
                    // clear error message
                    $('#nameERR').text('');
                    $('#emailERR').text('');
                    $('#passwordERR').text('');
                    $('#rollnumberERR').text('');
                    $('#genderERR').text('');
                    
                    if (response.status === 200) {
                        ReadRecord();
                        $('#exampleModal').modal('hide');
                    } else {
                        $('#nameERR').text(response.ERROR.name);
                        $('#emailERR').text(response.ERROR.email);
                        $('#passwordERR').text(response.ERROR.password);
                        $('#rollnumberERR').text(response.ERROR.rollnumber);
                        $('#genderERR').text(response.ERROR.gender);
                    }

                }
            })
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>