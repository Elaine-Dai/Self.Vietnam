<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Self.Vietnam</title>
    <link href="../css/main.css" rel="stylesheet" type="text/css" />
    <link href="../css/plan.css" rel="stylesheet" type="text/css" />


</head>

<body>
    <!-- <---------------------->
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


    <!-- ------------------------------>
    <main>
        <div class="map__control">


            <p>起始</p>
            <select type="text" id="map__control__form" style="width:300px;">
            　<option value="沙壩教堂">沙壩教堂</option>
            　<option value="下龍灣">下龍灣</option>
            　<option value="還劍湖">還劍湖</option>
            　<option value="河內市">河內市</option>
            　...
            </select>
            </br>
            <p>目的</p>
            <select type="text" id="map__control__to" style="width:300px;">
            　<option value="沙壩教堂">沙壩教堂</option>
            　<option value="下龍灣">下龍灣</option>
            　<option value="還劍湖">還劍湖</option>
            　<option value="河內市">河內市</option>
            　...
            </select>

            <button id="btnSubmit" onclick="initialize2(map__control__form.value,map__control__to.value)">送出</button>
        </div>
        <!-- ------------------------------>
        <div id="map_canvas" style="float:left;width:70%;height:80%"></div>
        <div style="float:right;width:30%;height:80%;overflow:auto">

            <div id="directions_panel" style="width:100%"></div>
        </div>
    </main>
    <!-- --------------------------------------------------------------------------- -->

    <!--*********-->
    <!-- 載入js  -->
    <!--*********-->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService();
        var map;
        var oldDirections = [];
        var currentDirections = null;

        function initialize2(pFrom, pEnd) {
            var myOptions = {
                zoom: 8,
                center: new google.maps.LatLng(21.0277644, 105.83415979999995),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

            directionsDisplay = new google.maps.DirectionsRenderer({
                'map': map,
                'preserveViewport': true,
                'draggable': true
            });

            directionsDisplay.setPanel(document.getElementById("directions_panel"));

            google.maps.event.addListener(directionsDisplay, 'directions_changed',
                function() {
                    if (currentDirections) {
                        oldDirections.push(currentDirections);
                    }
                    currentDirections = directionsDisplay.getDirections();
                });


            calcRoute2(pFrom, pEnd);

        }

        function calcRoute2(pFrom, pEnd) {

            var start = pFrom;
            var end = pEnd;
            var request = {
                origin: start, //起始地
                destination: end, //目的地
                travelMode: google.maps.DirectionsTravelMode.DRIVING //旅行工具 WALKING | DRIVING
            };
            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                    //alert(directionsDisplay.getDirections().routes[0].legs[0].start_address);//起點地點：330台灣桃園縣桃園市興華路23號
                    //alert(directionsDisplay.getDirections().routes[0].legs[0].end_address);		//alert(directionsDisplay.getDirections().routes[0].legs[0].distance.text);//24.8公里
                    //alert(directionsDisplay.getDirections().routes[0].legs[0].duration.text);//31分鐘
                    //alert(directionsDisplay.getDirections().routes[0].copyrights);//地圖資料 2011 Kingway
                    //alert(directionsDisplay.getDirections().routes[0].legs[0].steps[0].instructions);//朝<b>西北</b>，走<b>興華路</b>，往<b>大智路</b>前進
                    //alert(directionsDisplay.getDirections().routes[0].legs[0].steps[0].distance.text);//0.3公里

                }
            });

        }
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
    <script src="../js/scripts.js"></script>
</body>

</html>