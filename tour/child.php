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
<!-------------------------------------------------------------->
    <header>

        <div class="logo">
            <a class="logo__link" href="../index.php">
                <img src="../images/logo.jpg" class="logo__img">
                <div class="logo__text">Self.Vietnam</div>
            </a>
        </div>
        <div class="cover"><img src="../images/BigImg.jpg"></div>
    </header>
<!-------------------------------------------------------------->
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
<!-------------------------------------------------------------->

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

    $areapage = $_GET['areapage'];
    // echo $areapage;

    ?>
<!-------------------------------------------------------------->
<!---regon/city選單迴圈------------------------------------------>
<div class="selection"> 
<?php 

$sql="SELECT areaid,regionid,region,city FROM area WHERE regionid='$areapage'";
$result=$conn->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
        $areaid=$row['areaid'];
        $city=$row['city'];
        $regionid=$areapage;
        $region=$row['region'];

            echo <<<html
           
            <ul>
                <li class="selection__item selection__All">所有城市</li>
                <li class="selection__item"> $city </li>
            </ul>
        
html;
        
    
        
        

    }

}

?>  

<!-------------------------------------------------------------->
        <div class="tour">
        

        <?php

        //spot
        $sql="SELECT spotid,spotname,spotaddress,spotdetail,spotpicture,ship,foot,bus,plane,taxi,motorcycle,train,spotmap FROM spot where regionid='$regionid'";
        $result=$conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                
                
                $spotid=$row['spotid'];
                $spotname=$row['spotname'];
                $spotaddress=$row['spotaddress'];
                $spotdetail=$row['spotdetail'];
                $spotpicture=$row['spotpicture'];
                $spotmap=$row['spotmap'];
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

                if($row['ship'] == 1){
                    $ship="搭船";
                }
                else{
                    $ship="";
                }

                if($row['foot'] == 1){
                    $foot="步行";
                }
                else{
                    $foot="";
                }



                echo <<<html
                
                <div class="tour__spot spot_1">
                <a href="./children.php?spotpage=$spotid">
                <p class="tour__spot__text">查看更多</p>
                <img src="../images/ss1.jpg">
                <h2>$spotname</h2>
                </a>
                </div>
html;

            }


        }



        ?>
        </div>

<!-------------------------------------------------------------->
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