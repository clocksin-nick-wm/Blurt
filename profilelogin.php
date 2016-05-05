<!DOCTYPE html>
<html>
    <head>
    <title>Blurt <?php echo $page_title ?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
    <style>
        body {
            background-image: url("https://www.nordicvisitor.com/images/greenland/ilulissatnorthgreenland-northernlights-greenland-ilovegreenland-%C2%A9andreschoenherr.jpg");
            background-size:     cover;                      /* <------ */
            background-repeat:   no-repeat;
        }
    </style>
<body>
<nav class="navbar navbar-default">
    <img src="Blurt.png" width="85px" height="50px">
    <form class="navbar-form navbar-right" method="post" action="<?php $_SERVER[''] ?>">
        <div class="form-group">
            <input name="username" id="username" type="text" class="form-control" placeholder="Username">
            <input name="password" id="password" type="password" class="form-control" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-default" id="submit" name="submit">Submit</button>
    </form>
    </nav>
<div id="form" style="height: 700px; width: 400px; float: right; top: 150px; right:50px; z-index: 1; position:absolute;">
    <form id="msform" method="post" action="signUp.php" style="height: 700px; width: 400px; float: left;">
        <fieldset style="height: 700px; width: 400px; margin-top: -12.5%; margin-left: -.1%;">
            <h3 class="fs-subtitle" style="font-size: 50px; color: teal">Sign Up</h3>
            <br>
            <input type="text" name="first_name" placeholder="First Name" />
            <br><br>
            <input type="text" name="last_name" placeholder="Last Name" />
            <br><br>
            <input type="tel" name="email" placeholder="Email" />
            <br><br>
            <input type="text" name="username" placeholder="Username"/>
            <br><br>
            <input type="password" name="password1" placeholder="Password"/>
            <br><br>
            <input type="password" name="password2" placeholder="Retype password"/>
            <br><br>
            <input type="submit" name="submit" value="Submit"/>
        </fieldset>

    </form>
</div>
<footer>

</footer>
</body>
</html>