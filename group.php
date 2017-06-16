<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $config['title']; ?></title>

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
              <h1>Группа <?=$_GET['name']?>
              </h1>
              <div class="block__content">
                <div class="full-text">
                  <h3>Студенты:</h3>
                  <table border="1" cellspacing="5" cellpadding="10">
                    <tr>
                      <td align="center">Фамилия</td>
                      <td align="center">Имя</td>
                      <td align="center">Отчество</td>
                      <td align="center">Состоит на</td>
                      <td align="center">Балл за соц. активность</td>
                      <td align="center">Размер стипендии</td>
                    </tr>
                    <?php
                      $table = mysqli_query($connection, "SELECT `student`.`surname` AS 'surname', `student`.`name` AS 'name', `student`.`patronomic_name` AS 'patronomic_name', `stipendiya_types`.`type` AS 'type', `social_activity`.`bal` AS 'bal' , `stipendiya_types`.`amount` AS 'amount' FROM `student` LEFT JOIN `stipendiya_naznachenie` ON (`stipendiya_naznachenie`.`student_id` = `student`.`id`) LEFT JOIN `stipendiya_types` ON (`stipendiya_naznachenie`.`stipendiya_types_id` = `stipendiya_types`.`id`) LEFT JOIN `social_activity` ON (`student`.`id` = `social_activity`.`student_id`) WHERE `student`.`group_id` = '".$_GET['id']."'");
                      while ($tabl = mysqli_fetch_assoc($table))
                      {
                        ?>
                        <tr>
                          <td align="center"><?=$tabl['surname']?></td>
                          <td align="center"><?=$tabl['name']?></td>
                          <td align="center"><?=$tabl['patronomic_name']?></td>
                          <td align="center"><?=$tabl['type']?></td>
                          <td align="center"><?=$tabl['bal']?></td>
                          <td align="center"><?=$tabl['amount']?></td>
                    <?php
                      }
                    ?>
                  </table>
                  <h3>Список предметов группы:</h3>
                  <table>
                    <tr>
                      <td align="center">Предмет</td>
                      <td align="center">Преподаватель</td>
                      <td align="center">Курсовая работа</td>
                      <td align="center">Тип сдачи</td>
                      <td align="center">Семестр</td>
                    </tr>
                  
                    <?php
                      $subjects = mysqli_query($connection, "SELECT DISTINCT `subject`.`name` AS 'subj_name', `subject`.`course_work`, `subject`.`type`, `lecturers`.`surname`, `lecturers`.`name` AS 'lecturer_name', `lecturers`.`patronomic_name`, `study`.`semesrt` FROM `study`,`group`,`subject` LEFT JOIN `lecturers` ON (`lecturers`.`id` = `subject`.`lecture_id`) WHERE `study`.`subject_id`=`subject`.`id` AND `study`.`group_id` = '".$_GET['id']."'");
                      while ($subj = mysqli_fetch_assoc($subjects) )
                        {
                    ?>
                    <tr>
                      <td align="center"><?=$subj['subj_name'];?></td>
                      <td align="center"><?=$subj['surname'].' '.mb_substr($subj['lecturer_name'],0,1,'UTF-8').'.'.mb_substr($subj['patronomic_name'],0,1,'UTF-8').'.';?></td>
                      <td align="center"><?=$subj['course_work'];?></td>
                      <td align="center"><?=$subj['type'];?></td>
                      <td align="center"><?=$subj['semesrt'];?></td>
                    </tr>
                    <?php   
                      }
                     ?> 
                  </table>
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
