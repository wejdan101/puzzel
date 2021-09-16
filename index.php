<?php
include "counter.php";
$counter += 1;
$var = "<?php\n\t\$counter = $counter;\n?>";
file_put_contents('counter.php', $var);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Image Puzzle</title>
    <meta charset='UTF-8'>
    <meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" name="viewport">
    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <link href="css/animate.css" rel="stylesheet"/>
    <link href="css/image-puzzle.css" rel="stylesheet"/>
    <script src="js/image-puzzle.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div id="collage">
    <div class="container" style="position: absolute;right: 0px;">
        <div class="row">
            <div class="col-md-2 pull-right">
               
                <div style="font-size: 40px; text-align: center;">
                  
                    
                </div>
            </div>
        </div>
    </div>
    <div id="playPanel" style="padding:5px;display:none;text-align: center;">
        <img src="images/logo.png" class="animated fadeInDown" style="width: 150px;">
        <h3 id="imgTitle" class="animated fadeInUpBig alert alert-info" style="margin: auto;width: 50%;background-color: #058c14 ;color:#000000"></h3>
        <br/>

        <hr/>
        <div style="display:inline-block; margin:auto; width:100%; vertical-align:top;max-width: 100%;
        overflow: auto;" dir="rtl">
            <div id="actualImageBox" class="animated fadeInLeft">
                <div id="stepBox">
                    <div>الخطوات:</div>
                    <div id="stepCount" class="stepCount">0</div>
                </div>
                /
                <div id="timeBox">
                    الزمن المستغرق: <span id="timerPanel"></span> ثواني
                </div>
                <img id="actualImage"/>
                <div style="display: none;">إعادة ترتيب الصورة وفق صعوبة</div>
                <p id="levelPanel" style="display: none;">
                    <input type="radio" name="level" id="easy" checked="checked" value="5"
                           onchange="imagePuzzle.startGame(images, this.value);"
                    /> <label for="easy">سهل</label>
                    <input type="radio" name="level" id="medium" value="6"
                           onchange="imagePuzzle.startGame(images, this.value);"/> <label for="medium">متوسط</label>
                    <input type="radio" name="level" id="hard" value="7"
                           onchange="imagePuzzle.startGame(images, this.value);"/> <label for="hard">صعب</label>
                </p>
                <div style="text-align: center;">
                    <button id="btnRule" type="button" class="btn btn-primary" onclick="rules();">قواعد اللعب</button>
                    <button id="newPhoto" type="button" class="btn btn-warning" onclick="restart();">إعادة اللعب
                    </button>
                </div>
            </div>
            <ul id="sortable" class="sortable"></ul>
        </div>
    </div>
    <div id="gameOver" style="display: none;">
        <div style="background-color: #fc9e9e; padding: 5px 10px 20px 10px; text-align: center; ">
            <h2 style="text-align:center">انتهت اللعبة</h2>
            تهانينا!! <br/> لقد أكملت تشكيل الصورة
            <br/> عدد الخطوات: <span id="stepCount" class="stepCount">0</span> خطوة.
            <br/> الوقت المستغرق: <span class="timeCount">0</span> ثواني<br/>
            
            <form method="post" action="save_mail.php">
            
            <input type="hidden" id="test" name="step">
            <input type="hidden" id="test1" name="time">
            <h4>رقم الجوال</h4>
                <input type="number" id="email" name="phone" placeholder="الجوال" style="text-align: right;" required
                       minlength="2">
                <h4>الإيميل </h4>
                <input type="text" id="email" name="email" placeholder="الإيميل" style="text-align: right;" required
                       minlength="2"><br><br>
                <button type="submit">حفظ</button><br>
            </form>
            <br/>
            <div>
                <button type="button" onclick="window.location.reload(true);">إعادة اللعب</button>
            </div>
        </div>
    </div>
    <div style="text-align: center">
        <hr style="width: 80%;"/>
        
        <br/>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            

            </div>

        </div>
    </div>
    <br/>
    <br/>
    <br/>

    <script src="libs/jquery/jquery.min.js"></script>
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>
    <script>
        var images = [
            {src: 'images/puzzle2.jpg', title: 'اليوم الوطني السعودي'},
        ];

        window.onload = function () {
            var gridSize = document.querySelector('#levelPanel input[type="radio"]:checked').getAttribute('value');
            imagePuzzle.startGame(images, gridSize);
        };

        function restart() {
            var gridSize = document.querySelector('#levelPanel input[type="radio"]:checked').getAttribute('value');
            imagePuzzle.startGame(images, gridSize);
        }

        function rules() {
            alert('أعد ترتيب أجزاء الصورة بطريقة تشكل الصورة بشكل صحيح. سيتم حساب عدد الخطوات المتخذة.');
        }

        function savePhone() {
            alert("تم حفظ رقم الجوال");
        }

        <?php
        if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
        ?>
        alert('تم حفظ الإيميل');
        <?php
        } else if (isset($_GET['msg']) && $_GET['msg'] == 'faild') {
        ?>
        alert('خطأ في حفظ الإيميل');
        <?php
        }
        ?>
    </script>
</div>
</body>
</html>
