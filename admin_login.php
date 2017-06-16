<?php
  require "includes/config.php"; 
  session_start();
  session_unset();
  session_destroy(); // разрушаем сессию
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title'];?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>

  <div id="wrapper">

  <?php include "includes/header.php"; 
  

    $faculty = mysqli_query($connection, "SELECT `name`,`phone` FROM `faculty`");
    $fac = mysqli_fetch_assoc($faculty);
    $names = mysqli_query($connection, "SELECT `kafedra`.`name` AS 'kaf_name',`speciality`.`name` AS 'spec_name' FROM `speciality` LEFT JOIN `kafedra` ON (`kafedra`.`id` = `speciality`.`kafedra_id`)");
  ?>
    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <h3>Вас приветствует
              <?php echo $fac['name'];?>
              </h3></br>
              <h5 align="center"><?php   echo $fac['name']    ?></h5>
              <h6 align="center">Телефон <?php   echo $fac['phone']    ?></h6></br>
              Декан - <strong>Сироватський Олександр Анатолійович</strong></br></br>
              Заступник декана - <strong>Садовниченко Олександр Вадимович</strong></br></br>
              Заступник декана по роботі в гуртожитку - <strong>Гунько Микита Владиславович</strong></br></br>
              <h5 align="center">Напрями підготовки та спеціальності</h5></br>
              <?php    
                    while ($name = mysqli_fetch_assoc($names) )
                    {
                      ?> <h5> <?php echo $name['spec_name']; ?> </h5> <?php echo 'Выпускная кафедра «'. $name['kaf_name'] . '»' . '</br></br>';
                    } 
                  ?>
            </div>
          </section>
          <section class="content__right col-md-4">
            <?php include "/includes/sidebar.php"; ?>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <?php include "/includes/footer.php"  ?>

  </div>

</body>
</html>
