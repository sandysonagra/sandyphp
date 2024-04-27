<!-- $(".btn").click(function () {
// include('simple_form .php');
    
//     console.log("kuldip");
//     var sno = $(this).val();
//     // console.log(sno);
//     $.ajax({
//       url: "Ajex_edit.php?editid=" + sno,

//       type: "GET",
//       // data: { sno: $row['username']  }, 
//       success: function (result) {
//         console.log(result);
//       }
// value = " . $row['ID'] . "
//     });
//   });



/////////////////////////////////////////////////////
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP WITH AJAX</title>
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id="header">
                <h1>PHP WITH AJAX</h1>
            </td>
        </tr>
        <tr>
            <td id="table-load">
                <div class="box">
                    <form class="form" method="post" id="ajax-form">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>UserName:</label>
                                    <input type="text" name="name" id="FRIST">
                                </div>
                            </div>
                            <br>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Gmail:</label>
                                    <input type="text" name="gmail" id="second"> <br>
                                </div>
                            </div>
                            <label>Gender:</label>
                            <input type="radio" value="male" name="gender">male
                            <input type="radio" value="female" name="gender">female<br>
                            <label>Hobby:</label>
                            <input type="checkbox" value="playing" name="hobby[]">playing
                            <input type="checkbox" value="singing" name="hobby[]">Singing
                            <input type="checkbox" value="Reading" name="hobby[]">Reading
                            <input type="checkbox" value="Coding" name="hobby[]">Coding<br>
                            <input type="button" id="submit" value="Submit">
                            <input type="text" name="ID" id="EDITID">
                            <div id="FRIST1" class="error"></div>
                        </div>
                    </form>
                </div>
            </td>
        </tr>
    </table>

    <script>
        $("#submit").dblclick(function () {
            $.ajax({
                url: "output_form.php",
                type: "POST",
                data: $("#ajax-form").serialize(),
                success: function (result) {
                    $("#ajax-form").html(result);
                }
            });
        });

        $("#submit").click(function () {
            $.ajax({
                url: "form_error.php",
                type: "POST",
                data: $("#ajax-form").serialize(),
                success: function (result) {
                    $("#FRIST1").html(result);
                }
            });
        });

        $(document).on("click", ".btn", function () {
            var kuldip = $(this).data("editid");
            window.location.href = "simple_form.php";
            $.ajax({
                url: "Ajex_edit.php"
                type: "POST",
                data: {
                    editid: kuldip,
                },
                success: function (result) {
                    var data = jQuery.parseJSON(result);
                    $('#EDITID').val(data.ID);
                    $('#ajax-form').show();
                    // $('#FRIST').val(data.name);
                    // $('#second').val(data.gmail);
                    // Handle other form fields accordingly
                }
            });
        });
    </script>
    
</body>

</html>
/////////////////////////////////////////////
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $gmail = $_POST['gmail'];
    $gender = $_POST['gender'];
    $hobby = implode(', ', $_POST['hobby']); // Convert hobbies array to a comma-separated string

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "kuldipdb";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO `ajex_form` (`username`, `gmail`, `gender`, `hobby`) VALUES ('$name', '$gmail',  '$gender', '$hobby')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>
 
<table class="table table-dark" id="myTable" cellspacing="0" cellpadding="10px" width="100%" border="1">
   <thead>
    <tr>
      <th class="btnn">s_no</th>
      <th class="btnn">Name</th>
      <th class="btnn">Gmail</th> 
      <th class="btnn">Gender</th>
      <th class="btnn">Hobby</th>
      <th class="btnn">Action</th>
    </tr>
  </thead>
  <tbody> 
    <?php
    $sno = 0;
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM `ajex_form`";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $sno++;
        echo "<tr id='kuldip'>
                <th scope='row'>" . $sno . "</th>
                <td>" . $row['username'] . "</td>
                <td>" . $row['gmail'] . "</td>
                <td>" . $row['gender'] . "</td>
                <td>" . $row['hobby'] . "</td>
                <td>
     <button type='button' id='edit' class='btn' data-editid={$sno}>
     edit
      </button>
      <button type='button' class='btn btn-warning btn-sm'><a href='product_delet.php?id=$row[ID]'>delet</a></button>
  </td>
                </tr>";

      }
    } else {
      echo "<tr><td colspan='6'>No records found</td></tr>";
    }

    mysqli_close($conn);
    ?> 
  <center><label><a href='simple_form.php' class="btn btn-outline-primary " for="btncheck1">Back To Home</a></label>

  </tbody>
</table>
 <script>
//    $("#edit").click(function () {
//     // var sno = $(this).data('ID');

//     // Make an AJAX request to the server to get the record details or open an edit form
//     $.ajax({
//         url: "simple_form.php", // Replace with the correct PHP file for editing -->
//         type: "POST",
//         // data: { sno: $row['username']  }, // Send the unique identifier
//         // success: function (result) {
//         //     // Handle the server's response, e.g., open an edit form with the retrieved data
//         // }
//     });
// });

</script> 
///////////////////////////////////////////
<?php
$ID =$_POST['editid'];
// $ID1 =$_POST['editid1'];
$servername = "localhost";
$username = "root";
$password = "";
$database = "kuldipdb";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error( ));
}
$sql ="SELECT * FROM `ajex_form` WHERE ID = $ID";
// echo $sql;
$result = mysqli_query($conn, $sql);
// print_r($result);
      if(mysqli_num_rows($result)==1){
      while ($row = mysqli_fetch_assoc($result)) {
        // print_r($row);
        echo json_encode($row);
        // return;
      }
    }
?>

  

<
//////////////////////#ajax-form
<body>
    <div class="container">
        <h1 class="text-primary text-uppercase text-center">AJAX CRUD OPERATION</h1>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                ENTER DATA
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">AJAX CRUD OPERATION</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="ajax-form" method="post">
                                <div class="form-group">
                                    <label for="FIRSTNAME">FIRSTNAME</label>
                                    <input type="text" name="FIRSTNAME" id="FIRSTNAME1" class="form-control" placeholder="First_Name">
                                </div>
                                <div class="form-group">
                                    <label for="GMAIL">EMAIL_ID</label>
                                    <input type="text" name="GMAIL" id="GMAIL1" class="form-control" placeholder="Gmail_Name">
                                </div>
                                <div class="form-group">
                                    <label>Gender:</label>
                                    <input type="radio" value="male" name="gender" id="gender1">male
                                    <input type="radio" value="female" name="gender" id="gender1">female
                                </div>
                                <div class="form-group">
                                    <label>Hobby:</label>
                                    <input type="checkbox" value="playing" name="hobby[]" id="checkbox1">playing
                                    <input type="checkbox" value="singing" name="hobby[]" id="checkbox2">Singing
                                    <input type="checkbox" value="Reading" name="hobby[]" id="checkbox3">Reading
                                    <input type="checkbox" value="Coding" name="hobby[]" id="checkbox4">Coding
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" id="btn" data-dismiss="modal">SAVE</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-dark" id="myTable">
        <thead>
            <tr>
                <th class="btnn">s_no</th>
                <th class="btnn">Name</th>
                <th class="btnn">Gmail</th>
                <th class="btnn">Gender</th>
                <th class="btnn">Hobby</th>
                <th class="btnn">Action</th>
            </tr>
        </thead>
        <tbody id="recoard_concent">
            <!-- Data will be loaded here via AJAX -->
        </tbody>
    </table>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        getallrecoard();
        $('#btn').click(function () {
            $.ajax({
                url: "addemployee.php",
                type: "POST",
                data: $("#ajax-form").serialize(),
                success: function (result) {
                    console.log(result);
                    getallrecoard(); // Reload the data after adding a record
                    $('#FIRSTNAME1').val("");
                    $('#GMAIL1').val("");
                    $('#gender1').prop("checked", false);
                    $('#checkbox1, #checkbox2, #checkbox3, #checkbox4').prop("checked", false);
                }
            });
        });
        function getallrecoard() {
            $.ajax({
                url: "table.php",
                type: "POST",
                success: function (result) {
                    $("#recoard_concent").html(result);
                }
            });
        }
    });
</script>
</body>
</html>
//////////////////////////////////////////////////////////////////////////////////////////#ajax-form
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP WITH AJAX</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- Include jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "kuldipdb";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $editId = $_POST['editid'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "kuldipdb";
    
        $conn = mysqli_connect($servername, $username, $password, $database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        $sql = "SELECT * FROM `ajex_form` WHERE ID = $editId";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode($row);
          
        }
    }
    ?>
    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id="header">
                <h1>PHP WITH AJAX</h1>
            </td>
        </tr>
        <tr>
            <td id="table-load">
                <div class="box">
                    <form class="form" method="post" id="ajax-form">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>UserName:</label>
                                    <input type="text" name="name" id="FRIST">
                                    <div id="FRIST1" class="error"></div>
                                    <div id="FRIST12" class="error"></div>

                                </div>
                            </div>
                            <br>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Gmail:</label>
                                    <input type="text" name="gmail" id="second"> <br>
                                    <div id="SECOND" class="error"></div>

                                </div>
                            </div>
                            <label>Gender:</label>
                            <input type="radio" value="male" name="gender">male
                            <input type="radio" value="female" name="gender">female<br>
                            <div id="GENDER" class="error"></div>

                            <label>Hobby:</label>
                            <input type="checkbox" value="playing" name="hobby[]">playing
                            <input type="checkbox" value="singing" name="hobby[]">Singing
                            <input type="checkbox" value="Reading" name="hobby[]">Reading
                            <input type="checkbox" value="Coding" name="hobby[]">Coding<br>
                            <div id="HOBBY" class="error"></div>
                            <input type="button" id="submit" value="Submit">
                            <!-- <input type="text" name="ID" id="EDITID"> -->
                        </div>
                    </form>
                </div>
            </td>
        </tr>
    </table>

    <script>
        $("#submit").dblclick(function () {
            $.ajax({
                url: "output_form.php",
                type: "POST",
                data: $("#ajax-form").serialize(),
                success: function (result) {
                    $("#ajax-form").html(result);
                }
            });
        });

        $("#submit").click(function () {
            $.ajax({
                url: "form_error.php",
                type: "POST",
                data: $("#ajax-form").serialize(),
                success: function (result, lodu) {
                    console.log(result);
                    var data = jQuery.parseJSON(result);
                    if (data.hasOwnProperty('name')) {
                        $("#FRIST1").html(data.name);
                    }
                    else {
                        $("#FRIST1").html("");

                    }
                    if (data.hasOwnProperty('gmail')) {
                        $("#SECOND").html(data.gmail);
                    }
                    else {
                        $("#SECOND").html("");

                    }
                    if (data.hasOwnProperty('gender')) {
                        $("#GENDER").html(data.gender);
                    }
                    else {
                        $("#GENDER").html("");

                    }
                    if (data.hasOwnProperty('hobby')) {
                        $("#HOBBY").html(data.hobby);
                    }
                    else {
                        $("#HOBBY").html("");

                    }


                }
            });
        });

        // $(document).on("click", ".btn", function () {
        //     var kuldip = $(this).data("editid");
        //     $.ajax({
        //         url: "simple_form.php"
        //         type: "POST",
        //         data: {
        //             'checking_view '= true
        //             'editid': kuldip,
        //         },
        //         success: function (result) {
        //             // var data = jQuery.parseJSON(result);
        //             // $('#EDITID').val(data.ID);
        //             // $('#ajax-form').show();
        //             // $('#FRIST').val(data.name);
        //             // $('#second').val(data.gmail);
        //             // Handle other form fields accordingly
        //         }
        //     });
        // });

    </script>
</body>

</html> 
//////////////////////////////////////////////////////////////////////////////////////////
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $gmail = $_POST['gmail'];
  $gender = $_POST['gender'];
  $hobby = implode(', ', $_POST['hobby']); // Convert hobbies array to a comma-separated string

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "kuldipdb";

  $conn = mysqli_connect($servername, $username, $password, $database);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "INSERT INTO `ajex_form` (`username`, `gmail`, `gender`, `hobby`) VALUES ('$name', '$gmail',  '$gender', '$hobby')";

  if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}
?>

<table class="table table-dark" id="myTable" cellspacing="0" cellpadding="10px" width="100%" border="1">
  <thead>
    <tr>
      <th class="btnn">s_no</th>
      <th class="btnn">Name</th>
      <th class="btnn">Gmail</th>
      <th class="btnn">Gender</th>
      <th class="btnn">Hobby</th>
      <th class="btnn">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sno = 0;
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM `ajex_form`";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $sno++;
        echo "<tr id='kuldip'>
                <th scope='row'>" . $sno . "</th>
                <td>" . $row['username'] . "</td>
                <td>" . $row['gmail'] . "</td>
                <td>" . $row['gender'] . "</td>
                <td>" . $row['hobby'] . "</td>
                <td>
                <button type='button' class='btn btn-primary edit-button'  data-editid=" . $row['ID'] . ">Edit</button>
                <button type='button' class='btn btn-danger delete-button' data-deleteid=" . $row['ID'] . ">Delete</button
     
  </td>
  </tr>";

      }
    } else {
      echo "<tr><td colspan='6'>No records found</td></tr>";
    }

    mysqli_close($conn);
    ?>
    <center><label><a href='simple_form.php' class="btn btn-outline-primary " for="btncheck1">Back To Home</a></label>

  </tbody>
</table>
<script>
  $(document).on("click", ".edit-button", function () {
    var editId = $(this).data("editid");
console.log("kuldip sonagra ")
    // Make an AJAX request to fetch the record data for editing
    $.ajax({
      url: "simple_form.php",
      type: "POST",
      data: {
        editid: editId,
      },
      success: function (result) {
        var data = jQuery.parseJSON(result);

        $('#EDITID').val(data.ID);
        $('#FRIST').val(data.username);
        $('#second').val(data.gmail);

      }
    });
  });
  // $(document).on("click", ".delete-button", function () {
  //     var deleteId = $(this).data("deleteid");

  //     // Show a confirmation dialog before deleting

  //         // Make an AJAX request to delete the record
  //         $.ajax({
  //             url: "delete_record.php",
  //             type: "POST",
  //             data: {
  //                 deleteid: deleteId,
  //             },
  //             success: function (result) {
  //                 // Handle the success or error response
  //                 if (result === 'success') {
  //                     // Reload the table or remove the deleted row from the table
  //                     location.reload();
  //                 } else {
  //                     alert("Failed to delete the record.");
  //                 }
  //             }
  //         });
  //     }
  // });


  //    $("#edit").click(function () {
  //     // var sno = $(this).data('ID');


  //     $.ajax({
  //         url: "simple_form.php", 
  //         type: "POST",
  //         data: { sno: $row['username']  }, 
  //         success: function (result) {

  //         }
  //     });
  // });
  // $(document).on("click", ".btn", function () {
  //   var kuldip = $(this).data("editid");
  //   $.ajax({
  //     url: "Ajex_edit.php"
  //               type: "POST",
  //     data: {
  //       'checking_edit '= true
  //                   'editid': kuldip,
  //     },
  //     success: function (result) {
  //       var data = jQuery.parseJSON(result);
  //       $('#EDITID').val(data);
  //       $('#ajax-form').show();
  //       // $('#FRIST').val(data.name);
  //       // $('#second').val(data.gmail);
        
  //     }
  //   });
  // });

</script>
$("#btnAddStudent").click(function() {
    $.ajax({
        url: "addstudent.php",
        method: "POST",
        dataType: 'json',
        data: $("#form").serialize(),

        success: function(res) {
            console.log(res);

            if (res.status === 0) {
                // Check if there are errors
                if (res.errors) {
                    var errorMessages = Object.values(res.errors).join('<br>');
                    toastr.error(errorMessages, "Error", {
                        timeOut: 3000
                    });
                } else {
                    toastr.success("Successfully Added", "Success", {
                        timeOut: 1000
                    });
                    getAllStudent();
                    $("#myModal").modal("hide");
                    $("#form")[0].reset();  // Reset the form
                }
            }
        },
    });
});
<!-- /////////////////////////ERROR"""""""""""""""""""CODE -->