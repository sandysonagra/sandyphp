$('#firstnamecheck').hide();
            $('#lastnamecheck').hide();
            $('#emailcheck').hide();
            $('#gendercheck').hide();
            $('#hobbycheck').hide();

            var fname_err = true;
            var lname_err = true;
            var email_err = true;
            var gender_err = true;
            var hobby_err = true;

            $('#firstname').keyup(function() {
                fname_check();
            });

            function fname_check() {
                var fname_val = $('#firstname').val();
                // alert(fname_val);
                if (fname_val.length == "") {
                    $('#firstnamecheck').show();
                    $('#firstnamecheck').html("*** please enter your firstname ***");
                    $('#firstnamecheck').focus();
                    $('#firstnamecheck').css("color", "red");
                    fname_err = false;
                    return false;

                } else {
                    $('#firstnamecheck').hide();

                }
            }

            $('#lastname').keyup(function() {
                lname_check();
            });

            function lname_check() {
                var lname_val = $('#lastname').val();
                // alert(fname_val);
                if (lname_val.length == "") {
                    $('#lastnamecheck').show();
                    $('#lastnamecheck').html("*** please enter your lastname ***");
                    $('#lastnamecheck').focus();
                    $('#lastnamecheck').css("color", "red");
                    lname_err = false;
                    return false;

                } else {
                    $('#lastnamecheck').hide();

                }
            }



            $('#email').keyup(function() {
                email_check();
            });

            function email_check() {
                var email_val = $('#email').val();
                // alert(fname_val);
                if (email_val.length == "") {
                    $('#emailcheck').show();
                    $('#emailcheck').html("*** please enter your email ***");
                    $('#emailcheck').focus();
                    $('#emailcheck').css("color", "red");
                    email_err = false;
                    return false;

                } else {
                    $('#emailcheck').hide();

                }
            }



            $('input[name="gender"]').keyup(function() {
                genderCheck();
            });

            function genderCheck() {
                var selectedGender = $("input[name='gender']:checked").val();

                if (!selectedGender) {
                    $('#gendercheck').html("*** Please select your gender ***");
                    $('#gendercheck').css("color", "red");
                    $('#gendercheck').show();
                    gender_err = false;
                    return false;
                } else {
                    $('#gendercheck').hide();
                }
            }




            $('input[name="hobby[]"]').keyup(function() {
                hobbyCheck();
            });

            function hobbyCheck() {
                var selectedHobbies = $('input[name="hobby"]:checked');

                if (selectedHobbies.length == "") {
                    $('#hobbycheck').html("*** Please select at least one hobby ***");
                    $('#hobbycheck').css("color", "red");
                    $('#hobbycheck').show();
                    hobby_err = false;
                    return false;
                } else {
                    $('#hobbycheck').hide();
                }
            }


            $('#btnAddStudent').click(function() {
                var fname_err = true;
                var lname_err = true;
                var email_err = true;
                var gender_err = true;
                var hobby_err = true;


                fname_check();
                lname_check();
                email_check();
                genderCheck();
                hobbyCheck();



                if ((fname_err==true)&&(lname_err==true)&&(email_err==true)&&(gender_err==true)&&(hobby_err==true)) {
                    return true;
                }
                else
                {
                    return false;
                }

            })
