



<!doctyype html>

<html>
    <head>
        <title> registration</title>
        <link rel="stylesheet" href="css/styles.css"/>
    </head>

    <body>

    <div id="error"> <?php echo $error; ?> </div>
        <div id = "wrapper">
            <div id = "wrapper">
                <div id="menue">
                    <a href="index.php">sign up</a>
                    <a href="login.php">log in</a>
                </div>
                <div id="formDiv">
            <div id="formDiv">

                <form method="post" action="index.php" enctype="multipart/form-data"> <!-- enctype for file upload-->


                    <label>First Name</label> <br/>
                    <input type="text" name="fname"/> <br/><br/>

                    <label>Last Name</label> <br/>
                    <input type="text" name="lname"/> <br/><br/>

                    <label>Email</label> <br/>
                    <input type="text" name="email"/> <br/><br/>

                    <label>Password</label> <br/>
                    <input type="password" name="password"/> <br/><br/>

                    <label>re-enter Password</label> <br/>
                    <input type="password" name="passwordConfirm"/> <br/><br/>

                    <label>Image</label> <br/>
                    <input type="file" name="image"/> <br/><br/>


                    <input type="submit" name="submit"/> <br/>



                </form>

            </div>

        </div>

    </body>

</html>