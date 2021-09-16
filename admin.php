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
</head>

<body>
<div id="container">
    <div class="alert alert-warning text-center">
        أرقام الموبايل
    </div>
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
<!--            <form action="upload.php" method="post" class="text-center" enctype="multipart/form-data">-->
<!--                <input type="file" name="image" class="btn btn-primary  btn-block">-->
<!--                <button type="submit" class="btn btn-block btn-success">تأكيد</button>-->
<!--            </form>-->
            <table class="table table-hover ">
                <tr>
                    <th class="text-center">تسلسل</th>
                    <th class="text-center">الإيميل</th>
                    <th class="text-center">الجوال</th>
                    <th class="text-center">عدد الخطوات</th>
                    <th class="text-center">المدة المستغرقة</th>
                </tr>
                <?php
                include_once './dbconnect.php';
                $result = mysqli_query($con, "SELECT * from users;");
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td class="text-center">  <?php echo $row['id']; ?></td>
                        <td class="text-center">  <?php echo $row['email']; ?></td>
                        <td class="text-center">  <?php echo $row['phone']; ?></td>
                        <td class="text-center">  <?php echo $row['step']; ?></td>
                        <td class="text-center">  <?php echo $row['time']; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
    <hr/>
</div>
<script src="libs/jquery/jquery.min.js"></script>
<script src="libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
