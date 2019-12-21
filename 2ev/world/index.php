<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />

    <title>World</title>
</head>

<body>


    <div class="main">
        <div class="container">
            <h1 class="display-1 title">World Database</h1>
            <br /><br />
            <div class="row error">
                <?php
        if (isset($_GET["fallo"]) && $_GET["fallo"] == 'true') {
          echo "<h3 style='color:red'>Usuario o contraseña no válida! </h3>";
        }
        if (isset($_GET["fallo"]) && $_GET["fallo"] == 'reg') {
          echo "<h3 style='color:red'>El usuario ya existe </h3>";
        }
        ?>
            </div>
            <div class="middle">
                <div id="login">
                    <form action="validar.php" method="POST">
                        <fieldset class="clearfix">
                            <p>
                                <span class="fa fa-user"></span>
                                <input type="text" placeholder="Username" name="user" required />
                            </p>
                            <!-- JS because of IE support; better: placeholder="Username" -->
                            <p>
                                <span class="fa fa-lock"></span>
                                <input type="password" placeholder="Password" name="password" required />
                            </p>
                            <!-- JS because of IE support; better: placeholder="Password" -->

                            <div>
                                <span style="width:48%; text-align:left;  display: inline-block;">
                                    <h5 class="text-light">Not account?</h5>
                                    <input type="submit" value="Register" name="bRegister" />
                                </span>
                                <span style="width:50%; text-align:right;  display: inline-block;">
                                    <input type="submit" value="Sign In" name="bLogin" />
                                </span>
                            </div>

                        </fieldset>


                    </form>

                </div>
                <!-- end login -->
                <div class="logo">
                    <img src="images/earth.gif" alt="earth" class="earth" />

                    <div class="clearfix">

                    </div>

                </div>

            </div>
        </div>


    </div>
</body>

</html>
