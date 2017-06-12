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
          <section class="content__left col-md-10">
            <div class="block"> 
              <h3></h3>
              <div class="block__content">
                <div class="full-text">
                  <?php
                      switch ($_GET['tableName']) 
                      {
                            case 'faculty':
                              $result = mysqli_query($connection,"SELECT * FROM `faculty` WHERE `id` = '".$_GET['id']."';");
                              $row = mysqli_fetch_assoc($result)
                              ?>
                              <form action="edit_table.php" method="POST">
                                Название: <input type=text name="facultyName" value="<?=$row['name'];?>"></br>
                                Аббривиатура: <input type=text name="facultyAbbr" value="<?=$row['abbr'];?>"></br>
                                Номер Телефона: <input type=text name="facultyPhone" value="<?=$row['phone'];?>"></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="Изменить">
                              </form>
                  <?php
                              break;
                              default:
                              # code...
                              break;

                            case 'group':
                              $result = mysqli_query($connection,"SELECT `group`.`id`, `speciality`.`name` AS 'speciality_name', `group`.`name`, `group`.`course`, `kafedra`.`name` AS 'kafedra_name', `group`.`study_start`, `group`.`study_end` FROM `group` LEFT JOIN `kafedra` ON (`kafedra`.`id`=`group`.`kafedra_id`) LEFT JOIN `speciality` ON (`speciality`.`id` = `group`.`speciality_id`) WHERE `id` = '".$_GET['id']."';");
                              $row = mysqli_fetch_assoc($result)
                              ?>
                              <form action="edit_table.php" method="POST">
                                Группа: <input type=text name="groupName" value="<?=$row['name'];?>"></br>
                                Специальность: <input type=text name="groupSpecialityName" value="<?=$row['speciality_name'];?>"readonly></br>
                                Курс: <input type=text name="groupCourse" value="<?=$row['course'];?>"></br>
                                Кафедра: <input type=text name="groupKafedraName" value="<?=$row['kafedra_name'];?>"></br>
                                Начало обучения: <input type=text name="groupStudyStart" value="<?=$row['study_start'];?>"></br>
                                Конеч обучения: <input type=text name="groupStudyEnd" value="<?=$row['study_start'];?>"></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="Изменить">
                              </form>
                  <?php
                              break;
                              default:
                              # code...
                              break;
                      
                            case 'kafedra':
                              $result = mysqli_query($connection,"SELECT * FROM `kafedra` WHERE `id` = '".$_GET['id']."';");
                              $row = mysqli_fetch_assoc($result)
                              ?>
                              <form action="edit_table.php" method="POST">
                                Название: <input type=text name="kafedraName" value="<?=$row['name'];?>"></br>
                                Аббривиатура: <input type=text name="kafedraAbbr" value="<?=$row['abbr'];?>"></br>
                                Номер Телефона: <input type=text name="kafedraPhone" value="<?=$row['phone'];?>"></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="Изменить">
                              </form>
                  <?php
                              break;
                              default:
                              # code...
                              break;
                      
                            case 'lecturers':
                              $result = mysqli_query($connection,"SELECT `lecturers`.`id`, `lecturers`.`name`, `lecturers`.`surname`, `lecturers`.`patronomic_name`, `lecturers`.`adress`, `lecturers`.`gender`, `lecturers`.`date_born` , `kafedra`.`name` AS 'kafedra_name' FROM `lecturers` LEFT JOIN `kafedra` ON (`kafedra`.`id`=`lecturers`.`kafedra_id`) WHERE `lecturers`.`id` = '".$_GET['id']."';");
                              $row = mysqli_fetch_assoc($result)
                              ?>
                              <form action="edit_table.php" method="POST">
                                Фамилия: <input type=text name="lecturersSurname" value="<?=$row['surname'];?>"></br>
                                Имя: <input type=text name="leturersName" value="<?=$row['name'];?>"></br>
                                Отчество: <input type=text name="lecturersPatronomicName" value="<?=$row['patronomic_name'];?>"></br>
                                Адрес: <input type=text name="lecturersAdress" value="<?=$row['adress'];?>"></br>
                                Пол: <input type=text name="lecturersGender" value="<?=$row['gender'];?>"></br>
                                Дата рождения: <input type=text name="lecturersDateBorn" value="<?=$row['name'];?>"></br>
                                Кафедра: <input type=text name="leturersKafedraName" value="<?=$row['abbr'];?>"readonly></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="Изменить">
                              </form>
                  <?php
                              break;
                              default:
                              # code...
                              break;
                      
                            case 'social_activity':
                              $result = mysqli_query($connection,"SELECT `social_activity`.`id`, `student`.`name`, `student`.`surname`, `student`.`patronomic_name`,`social_activity`.`type`, `social_activity`.`bal` FROM `social_activity` LEFT JOIN `student` ON (`student`.`id`=`social_activity`.`student_id`) WHERE `social_activity`.`id` = '".$_GET['id']."';");
                              $row = mysqli_fetch_assoc($result)
                              ?>
                              <form action="edit_table.php" method="POST">
                                Имя: <input type=text name="socialActivityName" value="<?=$row['name'];?>"readonly></br>
                                Фамилия: <input type=text name="socialActivitySurname" value="<?=$row['surname'];?>"readonly></br>
                                Отчество: <input type=text name="socialActivityPatronomicName" value="<?=$row['patronomic_name'];?>"readonly></br>
                                Вид: <input type=text name="socialActivityType" value="<?=$row['type'];?>"></br>
                                Бал: <input type=text name="socialActivityBal" value="<?=$row['bal'];?>"></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="Изменить">
                              </form>
                  <?php
                              break;
                              default:
                              # code...
                              break;
                      
                            case 'speciality':
                              $result = mysqli_query($connection,"SELECT `speciality`.`id`, `speciality`.`name`, `kafedra`.`name` AS 'kafedra_name' FROM `speciality` LEFT JOIN `kafedra` ON (`kafedra`.`id`=`speciality`.`kafedra_id`) WHERE `speciality`.`id` = '".$_GET['id']."';");
                              $row = mysqli_fetch_assoc($result)
                              ?>
                              <form action="edit_table.php" method="POST">
                                Специальность: <input type=text name="specialityName" value="<?=$row['name'];?>"></br>
                                Выпускающая кафедра: <input type=text name="specialityKafedraName" value="<?=$row['kafedra_name'];?>"></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="Изменить">
                              </form>
                  <?php
                              break;
                              default:
                              # code...
                              break;
                      
                            case 'stipendiya_naznachenie':
                              $result = mysqli_query($connection,"SELECT `stipendiya_naznachenie`.`id`, `student`.`surname`, `student`.`name`, `student`.`patronomic_name`, `stipendiya_types`.`type`, `stipendiya_naznachenie`.`date_start`, `stipendiya_naznachenie`.`date_end` FROM `stipendiya_naznachenie` LEFT JOIN `student` ON (`student`.`id`=`stipendiya_naznachenie`.`student_id`) LEFT JOIN `stipendiya_types` ON (`stipendiya_types`.`id`=`stipendiya_naznachenie`.`stipendiya_types_id`) WHERE `stipendiya_naznachenie`.`id` = '".$_GET['id']."';");
                              $row = mysqli_fetch_assoc($result)
                              ?>
                              <form action="edit_table.php" method="POST">
                                Фамилия: <input type=text name="stipendiyaNaznachenieSurname" value="<?=$row['surname'];?>"readonly></br>
                                Имя: <input type=text name="stipendiyaNaznachenieName" value="<?=$row['name'];?>"readonly></br>
                                Отчество: <input type=text name="stipendiyaNaznacheniePatronomicName" value="<?=$row['patronomic_name'];?>"readonly></br>
                                Состоит на: <input type=text name="stipendiyaNaznachenieType" value="<?=$row['type'];?>"></br>
                                Начало стипендии: <input type=text name="stipendiyaNaznachenieDateStart" value="<?=$row['date_start'];?>"></br>
                                Конец стипендии: <input type=text name="stipendiyaNaznachenieDateEnd" value="<?=$row['date_end'];?>"></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="Изменить">
                              </form>
                  <?php
                              break;
                              default:
                              # code...
                              break;
                      
                            case 'stipendiya_types':
                              $result = mysqli_query($connection,"SELECT * FROM `stipendiya_types` WHERE `stipendiya_types`.`id` = '".$_GET['id']."';");
                              $row = mysqli_fetch_assoc($result)
                              ?>
                              <form action="edit_table.php" method="POST">
                                Вид: <input type=text name="stipendiyaTypesType" value="<?=$row['type'];?>"></br>
                                Количество: <input type=text name="stipendiyaTypesAmount" value="<?=$row['amount'];?>"></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="Изменить">
                              </form>
                  <?php
                              break;
                              default:
                              # code...
                              break;
                      
                            case 'student':
                              $result = mysqli_query($connection,"SELECT `student`.`id`, `student`.`surname`, `student`.`name`, `student`.`patronomic_name`,`student`.`adress`,`student`.`gender`,`student`.`date_born`, `group`.`name` AS 'group_name' FROM `student` LEFT JOIN `group` ON (`group`.`id`=`student`.`group_id`) WHERE `student`.`id` = '".$_GET['id']."';");
                              $row = mysqli_fetch_assoc($result)
                              ?>
                              <form action="edit_table.php" method="POST">
                                Фамилия: <input type=text name="studentSurname" value="<?=$row['surname'];?>"></br>
                                Имя: <input type=text name="studentName" value="<?=$row['name'];?>"></br>
                                Отчество: <input type=text name="studentPatronomicName" value="<?=$row['patronomic_name'];?>"></br>
                                Адресс: <input type=text name="studentAdress" value="<?=$row['adress'];?>"></br>
                                Пол: <input type=text name="studentGender" value="<?=$row['gender'];?>"></br>
                                Дата рождения: <input type=text name="studentDateBorn" value="<?=$row['date_born'];?>"></br>
                                Группа: <input type=text name="studentGroupName" value="<?=$row['group_name'];?>"readonly></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="Изменить">
                              </form>
                  <?php
                              break;
                              default:
                              # code...
                              break;
                      
                      case 'study':
                              $result = mysqli_query($connection,"SELECT `study`.`id`, `subject`.`name`,`group`.`name` AS 'group_name', `study`.`semesrt` FROM `study` LEFT JOIN `subject` ON (`subject`.`id` = `study`.`subject_id`) LEFT JOIN `group` ON (`group`.`id`=`study`.`group_id`) WHERE `study`.`id` = '".$_GET['id']."';");
                              $row = mysqli_fetch_assoc($result)
                              ?>
                              <form action="edit_table.php" method="POST">
                                Предмет: <input type=text name="studyName" value="<?=$row['name'];?>"readonly></br>
                                Группа: <input type=text name="studyGroupName" value="<?=$row['group_name'];?>"readonly></br>
                                Семестр: <input type=text name="studySemesrt" value="<?=$row['semesrt'];?>"></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="Изменить">
                              </form>
                  <?php
                              break;
                      
                            case 'subject':
                              $result = mysqli_query($connection,"SELECT `subject`.`id`, `subject`.`name`, `lecturers`.`surname` AS 'lecturers_surname', `lecturers`.`name` AS 'lecturers_name', `lecturers`.`patronomic_name` AS 'lecturers_patronomic_name', `subject`.`lection_time`, `subject`.`laba_time`, `subject`.`course_work`, `subject`.`type` FROM `subject` LEFT JOIN `lecturers` ON (`lecturers`.`id`=`subject`.`lecture_id`) WHERE `subject`.`id` = '".$_GET['id']."';");
                              $row = mysqli_fetch_assoc($result)
                              ?>
                              <form action="edit_table.php" method="POST">
                                Предмет: <input type=text name="subjectName" value="<?=$row['name'];?>"></br>
                                Фамилия: <input type=text name="subjectLecturersSurname" value="<?=$row['lecturers_surname'];?>"readonly></br>
                                Имя: <input type=text name="subjectLecturersName" value="<?=$row['lecturers_name'];?>"readonly></br>
                                Отчество: <input type=text name="subjectPatronomicName" value="<?=$row['lecturers_patronomic_name'];?>"readonly></br>
                                Лекционные часы: <input type=text name="subjectLectionTime" value="<?=$row['lection_time'];?>"></br>
                                Практические часы: <input type=text name="subjectLabaTime" value="<?=$row['laba_time'];?>"></br>
                                Курсовая работа: <input type=text name="subjectCourseWork" value="<?=$row['course_work'];?>"></br>
                                Тип зачёта: <input type=text name="subjectType" value="<?=$row['type'];?>"></br>  
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="Изменить">
                              </form>
                  <?php
                              break;
                              default:
                              # code...
                              break;
                              default:
                              # code...
                              break;
                      }
                  ?>

                </div>
              </div>
            </div>
          
          </section>
          <section class="content__right col-md-4">
           <!---<?php include "../includes/sidebar.php"; ?>-->
          </section>
        </div>
      </div>
    </div>

<?php include "../includes/footer.php"  ?>

  </div>

</body>
</html>