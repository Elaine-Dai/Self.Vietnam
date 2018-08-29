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

    $spotpage = $_GET['spotpage'];
    // echo $spotpage;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Self.Vietnam</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css' />
    <link href="../css/main.css" rel="stylesheet" type="text/css" />
    <link href="../css/tourChildren.css" rel="stylesheet" type="text/css" />

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
<!-- connect db------------------------------>
<!-------------------------------------------------------------->

    <main>

<!-------------------------------------------------------------->
        <?php
        //spot
        $sql="SELECT spotid,spotname,spotaddress,spotdetail,spotpicture,bus,plane,taxi,motorcycle,train,spotIongitude,spotLatitude FROM spot where spotid='$spotpage'";
        $result=$conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                
                $spotid=$spotpage;
                $spotname=$row['spotname'];
                $spotaddress=$row['spotaddress'];
                $spotdetail=$row['spotdetail'];
                $spotpicture=$row['spotpicture'];
                $spotIongitude=$row['spotIongitude'];
                $spotLatitude=$row['spotLatitude'];
                if ($row['bus'] == 1){
                    $bus="公車";
                }
                else{
                    $bus="";
                }

                if ($row['plane'] == 1){
                    $plane="飛機";
                }
                else{
                    $plane="";
                }

                if ($row['taxi'] == 1){
                    $taxi="計程車";
                }
                else{
                    $taxi="";
                }

                if ($row['motorcycle'] == 1){
                    $motorcycle="摩托車";
                }
                else{
                    $motorcycle="";
                }

                if ($row['train'] == 1){
                    $train="火車";
                }
                else{
                    $train="";
                }

            }


        }
    



echo <<<html
        

<!-------------------------------------------------------------->

        <!--===============套用owl-carousel插件====================-->
        <div class="sceneShow">
            <div class="owl-carousel owl-theme">
                <div class="sceneShow__area item">
                    <!-- owl插件指定滑動區域 -->
                    <img src="../images/1.jpg" alt="越南景點">
                </div>


                <div class="sceneShow__area item">
                    <!-- owl插件指定滑動區域 -->
                    <img src="../images/3.jpg" alt="越南景點">
                </div>


                <div class="sceneShow__area item">
                    <!-- owl插件指定滑動區域 -->
                    <img src="../images/4.jpg" alt="越南景點">
                </div>
            </div>
            <span class="text__title"> $spotname </span>
                <p> $spotaddress </p>

        </div>
        <!--===================================-->



        <div class="sceneMap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.485533802853!2d103.83964606523705!3d22.33528854726742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc5cc7ac1cceb1050!2sNotre+Dame+Cathedral!5e0!3m2!1szh-TW!2stw!4v1531725723296"></iframe>
        </div>




        <div class="sceneInfo sceneText">

            <p class="text__title"> $spotname"小介紹" </p>
            <p class="sceneText__content"> $spotdetail </p>

        </div>


        <div class="sceneTraffic sceneText">

            <p class="text__title">交通</p>
            <p class="sceneText__content"> $bus $plane $taxi $motorcycle $train</p>
            

        </div>

html;
        ?>

        <!--===================================-->

    </main>
    <!-- ------------------------------>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js'></script>
    <script src="../js/scripts.js"></script>
    <script src="../js/tourChildren.js"></script>

</body>

</html>