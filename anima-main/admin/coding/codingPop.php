<!DOCTYPE html>
<html>

<head>
    <title>Popup contact form</title>
    <script>
        function check_empty() {
            if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") {
                alert("Fill All Fields !");
            } else {
                document.getElementById('form').submit();
                alert("Form Submitted Successfully...");
            }
        }
        //Function To Display Popup
        function div_show() {
            document.getElementById('abc').style.display = "block";
        }
        //Function to Hide Popup
        function div_hide() {
            document.getElementById('abc').style.display = "none";
        }
    </script>
    <style>
        @import "http://fonts.googleapis.com/css?family=Raleway";

        /*----------------------------------------------
CSS settings for HTML div Exact Center
------------------------------------------------*/
        #abc {
            width: 100%;
            height: 100%;
            opacity: .95;
            top: 0;
            left: 0;
            display: none;
            position: fixed;
            background-color: #313131;
            overflow: auto
        }

        img#close {
            position: absolute;
            right: -14px;
            top: -14px;
            cursor: pointer
        }

        div#popupContact {
            position: absolute;
            left: 50%;
            top: 17%;
            margin-left: -202px;
            font-family: 'Raleway', sans-serif
        }

        form {
            max-width: 300px;
            min-width: 250px;
            padding: 10px 50px;
            border: 2px solid gray;
            border-radius: 10px;
            font-family: raleway;
            background-color: #fff
        }

        p {
            margin-top: 30px
        }

        h2 {
            background-color: #FEFFED;
            padding: 20px 35px;
            margin: -10px -50px;
            text-align: center;
            border-radius: 10px 10px 0 0
        }

        hr {
            margin: 10px -50px;
            border: 0;
            border-top: 1px solid #ccc
        }

        input[type=text] {
            width: 82%;
            padding: 10px;
            margin-top: 30px;
            border: 1px solid #ccc;
            padding-left: 40px;
            font-size: 16px;
            font-family: raleway
        }

        #name {
            background-image: url(../images/name.jpg);
            background-repeat: no-repeat;
            background-position: 5px 7px
        }

        #email {
            background-image: url(../images/email.png);
            background-repeat: no-repeat;
            background-position: 5px 7px
        }

        textarea {
            background-image: url(../images/msg.png);
            background-repeat: no-repeat;
            background-position: 5px 7px;
            width: 82%;
            height: 95px;
            padding: 10px;
            resize: none;
            margin-top: 30px;
            border: 1px solid #ccc;
            padding-left: 40px;
            font-size: 16px;
            font-family: raleway;
            margin-bottom: 30px
        }

        #submit {
            text-decoration: none;
            width: 100%;
            text-align: center;
            display: block;
            background-color: #FFBC00;
            color: #fff;
            border: 1px solid #FFCB00;
            padding: 10px 0;
            font-size: 20px;
            cursor: pointer;
            border-radius: 5px
        }

        span {
            color: red;
            font-weight: 700
        }

        button {
            width: 10%;
            height: 45px;
            border-radius: 3px;
            background-color: #cd853f;
            color: #fff;
            font-family: 'Raleway', sans-serif;
            font-size: 18px;
            cursor: pointer
        }
    </style>
</head>
<!-- Body Starts Here -->

<body id="body" style="overflow:hidden;">
    <div id="abc">
        <!-- Popup Div Starts Here -->
        <div id="popupContact">
            <!-- Contact Us Form -->
            <form action="#" id="form" method="post" name="form">
                <img id="close" src="images/3.png" onclick="div_hide()">
                <h2>Contact Us</h2>
                <hr>
                <input id="name" name="name" placeholder="Name" type="text">
                <input id="email" name="email" placeholder="Email" type="text">
                <textarea id="msg" name="message" placeholder="Message"></textarea>
                <a href="javascript:%20check_empty()" id="submit">Send</a>
            </form>
        </div>
        <!-- Popup Div Ends Here -->
    </div>
    <!-- Display Popup Button -->
    <h1>Click Button To Popup Form Using Javascript</h1>
    <button id="popup" onclick="div_show()">Popup</button>
</body>

</html>