<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Self.Vietnam</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css' />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/tour.css">



</head>

<body>
    <!-- <---------_-------------------->
    <header>

        <div class="logo">
            <a class="logo__link" href="../index.php">
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



    <!-------------------------------------------------------------->

    <main>
        <div class="Carousel__control"></div>
        <div class="owl-carousel owl-theme">


    <!-- ------------------------------------------------------------>
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


    ?>
<!-------------------------------------------------------------->
<?php
$sql = "SELECT areaid,regionid,region,city FROM area";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $areaid=$row['areaid'];
        $city=$row['city'];

        if($row['regionid']==1){
            $areapage=1;
            $region="北部";
            echo <<<html
            <!-- owl插件指定滑動區域 -->
            <div class="Carousel item">
                <div class="Carousel__item">
                    <img src="../images/s1.jpg" alt="越南景點">
                    <div class="Carousel__text">

                        <p class="Carousel__text__where">北部</p>
                        <a href="../tour/child.php?areapage="$areapage" class="Carousel_link">點此進入</a>
                    </div>
                </div>
                </div>
html;

        }else{
            $areapage=2;
            $region="中部";
            echo <<<html
            <!-- owl插件指定滑動區域 -->
            <div class="Carousel item">
            <div class="Carousel__item">
                <img src="../images/s1.jpg" alt="越南景點">
                <div class="Carousel__text">

                    <p class="Carousel__text__where">中部</p>
                    <a href="../tour/child.php?areapage=$areapage" class="Carousel_link">點此進入</a>
                </div>
            </div>
            </div>

html;
        }else{
            $areapage=3;
            $region="南部";

            echo <<<html
            <!-- owl插件指定滑動區域 -->
            <div class="Carousel item">
            <div class="Carousel__item">
                <img src="../images/s1.jpg" alt="越南景點">
                <div class="Carousel__text">

                    <p class="Carousel__text__where">南部</p>
                    <a href="../tour/child.php?areapage=$areapage" class="Carousel_link">點此進入</a>
                </div>
            </div>
            </div>
html;
        }
            }
        } else {
            echo "0 results";
        }
html;
        ?>
<!-------------------------------------------------------------->




        </div>

</div>
    </main>

    <!-- ------------------------------>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js'></script>
    <script src="../js/scripts.js"></script>
    <script src="../js/tour.js"></script>

</body>

</html>