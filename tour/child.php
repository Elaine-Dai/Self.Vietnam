<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Self.Vietnam</title>
    <link href="../css/main.css" rel="stylesheet" type="text/css" />
    <link href="../css/tourChild.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <!-- <---------------------->
    <header>

        <div class="logo">
            <a class="logo__link" href="../index.html">
                <img src="../images/logo.jpg" class="logo__img">
                <div class="logo__text">Self.Vietnam</div>
            </a>
        </div>
        <div class="cover"><img src="../images/BigImg.jpg"></div>
    </header>
    <!-- <---------------------->
    <aside>
        <div class="aside">

            <button class="nav__button nav__button_expand" type="button"></button>

            <div class="nav">

                <button class="nav__button nav__button_close"></button>
                <a class="nav__login" href="../Login.php">登入</a>

                <a class="nav__item" href="../tour/index.php">行程介紹</a>
                <a class="nav__item" href="../traffic/index.php">交通</a>
                <a class="nav__item" href="../warning/index.php">風俗習慣</a>
                <a class="nav__item" href="../plan/index.php">行程規劃</a>
            </div>
        </div>
    </aside>
    <!-- ------------------------------>

    <main>
    <?php
    //connect
    $servername="ms.ntub.edu.tw";//localhost
    $username="Vietnam";
    $password="imd10446";
    $dbname="Vietnam";





    $conn = mysqli_connect($servername, $username, $password,$dbname);
    if(!$conn){
        die("Connection failed");
    }
    // echo "connect successfuly";
    mysqli_query($conn,"SET NAMES UTF8");


    //select


    
    // //spot
    // $sql="SELECT spotid,spotname,spotaddress,spotdetail,spotpicture,spottraffic,spotIongitude,spotLatitude FROM spot";
    // $result=$conn->query($sql);
    // if ($result->num_rows > 0) {
    //     // output data of each row
    //     while($row = $result->fetch_assoc()) {
            
    //         $spotid=$row['spotid'];
    //         $spotname=$row['spotname'];
    //         $spotaddress=$row['spotadresss'];
    //         $spotdetail=$row['spotdetail'];
    //         $spotpicture=$row['spotpicture'];
    //         $spottraffic=$row['spottraffic'];
    //         $spotIongitude=$row['spotIongitude'];
    //         $spotLatitude=$row['spotLatitude'];

    //     }


    // }

    ?>

        <div class="selection">
        <form>
        <select>
        <?php 

        $sql="SELECT areaid,region,city FROM area";
        $result=$conn->query($sql);
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $areaid=$row['areaid'];
                $region=$row['region'];
                $city=$row['city'];
                
                echo<<<html
                
                <optgroup label="$region">
                <option value="city"> $city </option>
                </optgroup>
                
html;
            }
        }

?>  
        </select>
        </form>
        </div>



    </main>



    <!--=================
            地區選項(原)

            <li class="selection__item selection__All">所有城市</li>
            <li class="selection__item"> $region </li>
    ==================-->

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'>
    </script>
    <script src="../js/scripts.js"></script>
    <script src="../js/tourChild.js"></script>

</body>

</html>