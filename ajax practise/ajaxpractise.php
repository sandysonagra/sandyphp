<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajax practise</title>
</head>
<body>
    <form action="">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        function getallvalue() {
            $.ajax({
                url: "form-submit.php",
                type: 'post',
                data: {
                    firstname : $("#firstname").val(),
                    email : $("#email").val(),
                },

                dataType:'json',
                success:function (res) {
                    console.log(res);
                    alert(res);
                },

                error:function (error) {
                    console.log({
                        error
                    });
                }
            });
            
        }
    </script>
    </form>
</body>
</html>