<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
    <body>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database="vatsal";
        try{
            $conn=mysqli_connect($servername,$username,$password,$database);
            echo "Connection established";
        }
        catch(Exception $e) {
            echo "Error connecting to database: " . $e->getMessage;
            echo "<br>";
        }
        $name=$_POST["name"];
        $password=$_POST["password"];
        $email=$_POST["email"];
        echo "<br> name: " . $name;
        echo "<br> password: " . $password;
        echo "<br> Email: " .$email;
        try
            {
                $conn->query("INSERT INTO `logindetails`(`Name`, `Email`, `password`) VALUES ('$name','$email','$password')");
                echo "Query performed successfully!<br>";
            }
            catch (Exception $e)
            {
                echo "Error Occured!<br>";
                echo 'Message: ' .$e->getMessage();
                echo "<br>";
            }
        ?>
</body>
</html>