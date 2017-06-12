<?php
  require "../includes/config.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title']; ?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>

  <div id="wrapper">

    <?php include "../includes/header.php"; ?>

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <h1>Кафедра <?php 
                    $kafedra = mysqli_query($connection, "SELECT `name`,`abbr` FROM `kafedra` WHERE `id` = '".$_GET['category']."'");
                    $kaf = mysqli_fetch_assoc($kafedra);
                    echo $kaf['name'] . ' (' . $kaf['abbr'] . ')';
                  ?>
              </h1>
              <div class="block__content">
                <div class="full-text">
                  <h3>Список групп на кафедре:</h3>
                  <ul type="disc">
                    <?php
                      $group = mysqli_query($connection, "SELECT `group`.`name`, `group`.`id` FROM `group` WHERE `kafedra_id` = '".$_GET['category']."'");
                      while ($grp = mysqli_fetch_assoc($group) )
                        {
                    ?>
                    <li><a href="group.php?name=<?php echo $grp['name']; ?>&id=<?=$grp['id']?>"><?php echo $grp['name']; ?></a></li> 
                    <?php   
                      }
                     ?> 
                  </ul>
                  <h3>Список преподавателей на кафедре:</h3>
                  <ul type="disc">
                    <font color="black">
                    <?php
                      $lecturers = mysqli_query($connection, "SELECT `id`, `name`, `surname`, `patronomic_name` FROM `lecturers` WHERE `kafedra_id` = '".$_GET['category']."'");
                      while ($lect = mysqli_fetch_assoc($lecturers) )
                        {
                    ?>
                    <li><?=$lect['surname'].' '.mb_substr($lect['name'],0,1,'UTF-8').'.'.mb_substr($lect['patronomic_name'],0,1,'UTF-8').'.'; ?></a></li> 
                    <?php   
                      }
                     ?> 
                    </font>
                  </ul>
                </div>
              </div>
            </div>
          
          </section>
          <section class="content__right col-md-4">
           <?php include "../includes/sidebar.php"; ?>
          </section>
        </div>
      </div>
    </div>

<?php include "../includes/footer.php"  ?>

  </div>

</body>
</html>