var valid;
            
            function check_fname() {
                var fname = $("#firstname").val();
                if (fname.trim() == "") {
                    $("#fname_error").html("<b class='text-danger'>please enter your firstname</b>");
                    valid = false;
                } else {
                    $("#fname_error").html("");
                }
            }
            $("#firstname").on("keyup", function() {
                check_fname();
            })
            



            
            function check_lname() {
                var lname = $("#lastname").val();
                if (lname.trim() == "") {
                    $("#lname_error").html("<b class='text-danger'>please enter your lastname</b>");
                    valid = false;
                } else {
                    $("#lname_error").html("");
                }
            }
            $("#lastname").on("keyup", function() {
                check_lname();
            })
            
            
            
            
            function check_email() {
                var email = $("#email").val();
                if (email.trim() == "") {
                    $("email_error").html("<b class='text-danger'>please enter your email</b>");
                    valid = false;
                } else {
                    $("email_error").html("");
                }
            }
            $("#email").on("keyup", function() {
                check_email();
            })


            
            
            
            function check_gender() {
                
                var gender = $("input[name='gender']");
                if (gender.is(":checked") == false) {
                    $("#gender_error").html("<b class='text-danger'>please select your gender</b>");
                    valid = false;
                } else {
                    $("#gender_error").html("");
                }
            }
            $("input[name='gender']").on("click", function() {
                check_gender();
})




function check_hobby() {
    var hobby = $("input[name='hobby[]']");
    if (hobby.is(":checked") == false) {
        $("#hobby_error").html("<b class='text-danger'>please select your hobby</b>");
        valid = false;
    } else {
        $("#hobby_error").html("");
    }
}
$("input[name='hobby']").on("change", function() {
    check_hobby();
})



$("btnAddStudent").on("click", function() {
    e.preventDefault();
    valid =true;
    check_fname();
    check_lname();
    check_email();
    check_gender();
    check_hobby();

});
