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
                  <a href="./admin_login.php">Все таблицы</a>
                  ->
                  <a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>">Записи</a>
                  <?php
                      switch ($_GET['tableName']) 
                      {
                            case 'faculty':
                              $result = mysqli_query($connection,"SELECT * FROM `faculty` WHERE `id` = '".$_GET['id']."';");
                              $row = mysqli_fetch_assoc($result)
                              ?>
                              <form action="edit_table.php" method="GET">
                                Название: <input type=text name="facultyName" value="<?=$row['name'];?>"></br>
                                Аббривиатура: <input type=text name="facultyAbbr" value="<?=$row['abbr'];?>"></br>
                                Номер Телефона: <input type=text name="facultyPhone" value="<?=$row['phone'];?>"></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="<?=(empty($_REQUEST['id']))?"Сохранить":"Изменить";?>">
                              </form>
                  <?php
                              break;
                              default:
                              # code...
                              break;

                            case 'group':
                              $result = mysqli_query($connection, "SELECT * FROM `group` WHERE `id` = '".$_REQUEST['id']."'");
                              $row = mysqli_fetch_assoc($result);
                              $result1 = mysqli_query($connection, "SELECT * FROM `speciality`");
                              $result2 = mysqli_query($connection, "SELECT * FROM `kafedra`");
                              ?>
                              <form action="edit_table.php" method="GET">
                                Группа: <input type=text name="groupName" value="<?=$row['name'];?>"></br>
                                Специальность:
                                <select name='specialityId'>
                                  <?php while ($row1 = mysqli_fetch_assoc($result1))
                                  {
                                    ?><option value='<?=$row1['id'];?>'  <?=($row1['id']==$row['speciality_id'])?"selected":"";?>><?=$row1['name'];?></option>
                                  <?php
                                  }
                                  ?>
                                </select></br>
                                Курс: <input type=text name="groupCourse" value="<?=$row['course'];?>"></br>
                                Кафедра: 
                                <select name='kafedraId'>
                                  <?php while ($row2 = mysqli_fetch_assoc($result2))
                                  {
                                    ?><option value='<?=$row2['id'];?>'  <?=($row2['id']==$row['kafedra_id'])?"selected":"";?>><?=$row2['name'];?></option>
                                  <?php
                                  }
                                  ?>
                                </select></br>
                                Начало обучения: <input type=text name="groupStudyStart" value="<?=$row['study_start'];?>"></br>
                                Конеч обучения: <input type=text name="groupStudyEnd" value="<?=$row['study_start'];?>"></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="<?=(empty($_REQUEST['id']))?"Сохранить":"Изменить";?>">
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
                              <form action="edit_table.php" method="GET">
                                Название: <input type=text name="kafedraName" value="<?=$row['name'];?>"></br>
                                Аббривиатура: <input type=text name="kafedraAbbr" value="<?=$row['abbr'];?>"></br>
                                Номер Телефона: <input type=text name="kafedraPhone" value="<?=$row['phone'];?>"></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="<?=(empty($_REQUEST['id']))?"Сохранить":"Изменить";?>">
                              </form>
                  <?php
                              break;
                              default:
                              # code...
                              break;
                      
                            case 'lecturers':
                              $result = mysqli_query($connection, "SELECT * FROM `lecturers` WHERE `id` = '".$_REQUEST['id']."'");
                              $row = mysqli_fetch_assoc($result);
                              $result1 = mysqli_query($connection, "SELECT * FROM `kafedra`");
                              ?>
                              <form action="edit_table.php" method="GET">
                                Фамилия: <input type=text name="lecturersSurname" value="<?=$row['surname'];?>"></br>
                                Имя: <input type=text name="leсturersName" value="<?=$row['name'];?>"></br>
                                Отчество: <input type=text name="lecturersPatronomicName" value="<?=$row['patronomic_name'];?>"></br>
                                Адрес: <input type=text name="lecturersAdress" value="<?=$row['adress'];?>"></br>
                                Пол: <input type=text name="lecturersGender" value="<?=$row['gender'];?>"></br>
                                Дата рождения: <input type=text name="lecturersDateBorn" value="<?=$row['date_born'];?>"></br>
                                Кафедра: 
                                <select name='kafedraId'>
                                  <?php while ($row1 = mysqli_fetch_assoc($result1))
                                  {
                                    ?><option value='<?=$row1['id'];?>'  <?=($row1['id']==$row['kafedra_id'])?"selected":"";?>><?=$row1['name'];?></option>
                                  <?php
                                  }
                                  ?>
                                </select></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="<?=(empty($_REQUEST['id']))?"Сохранить":"Изменить";?>">
                              </form>
                  <?php
                              break;
                              default:
                              # code...
                              break;
                      
                            case 'social_activity':
                              $result = mysqli_query($connection, "SELECT * FROM `social_activity` WHERE `id` = '".$_REQUEST['id']."'");
                              $row = mysqli_fetch_assoc($result);
                              $result1 = mysqli_query($connection, "SELECT * FROM `student`");
                              ?>
                              <form action="edit_table.php" method="GET">
                                Студент: 
                                <select name='studentId'>
                                  <?php while ($row1 = mysqli_fetch_assoc($result1))
                                  {
                                    ?><option value='<?=$row1['id'];?>'  <?=($row1['id']==$row['student_id'])?"selected":"";?>><?=$row1['surname'].' '.$row1['name'].' '.$row1['patronomic_name'];?></option>
                                  <?php
                                  }
                                  ?>
                                </select></br>
                                Вид: <input type=text name="socialActivityType" value="<?=$row['type'];?>"></br>
                                Бал: <input type=text name="socialActivityBal" value="<?=$row['bal'];?>"></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="<?=(empty($_REQUEST['id']))?"Сохранить":"Изменить";?>">
                              </form>
                  <?php
                              break;
                              default:
                              # code...
                              break;
                      
                            case 'speciality':
                              $result = mysqli_query($connection, "SELECT * FROM `speciality` WHERE `id` ='".$_REQUEST['id']."'");
                              $row = mysqli_fetch_assoc($result);
                              $result1 = mysqli_query($connection, "SELECT * FROM `kafedra`");
                              ?>
                              <form action="edit_table.php" method="GET">
                                Специальность: <input type=text name="specialityName" value="<?=$row['name'];?>"></br>
                                Выпускающая кафедра:
                                <select name='kafedraId'>
                                  <?php while ($row1 = mysqli_fetch_assoc($result1))
                                  {
                                    ?><option value='<?=$row1['id'];?>'  <?=($row1['id']==$row['kafedra_id'])?"selected":"";?>><?=$row1['name'];?></option>
                                  <?php
                                  }
                                  ?>
                                </select></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="<?=(empty($_REQUEST['id']))?"Сохранить":"Изменить";?>">
                              </form>
                  <?php
                              break;
                              default:
                              # code...
                              break;
                      
                            case 'stipendiya_naznachenie':
                              $result = mysqli_query($connection, "SELECT * FROM `stipendiya_naznachenie` WHERE `id` = '".$_REQUEST['id']."'");
                              $row = mysqli_fetch_assoc($result);
                              $result1 = mysqli_query($connection, "SELECT * FROM `student`");
                              $result2 = mysqli_query($connection, "SELECT * FROM `stipendiya_types`");
                              ?>
                              <form action="edit_table.php" method="GET">
                                Студент: 
                                <select name='studentId'>
                                  <?php while ($row1 = mysqli_fetch_assoc($result1))
                                  {
                                    ?><option value='<?=$row1['id'];?>'  <?=($row1['id']==$row['student_id'])?"selected":"";?>><?=$row1['surname'].' '.$row1['name'].' '.$row1['patronomic_name'];?></option>
                                  <?php
                                  }
                                  ?>
                                </select></br>
                                Состоит на: 
                                <select name='stipendiyaTypesId'>
                                  <?php while ($row2 = mysqli_fetch_assoc($result2))
                                  {
                                    ?><option value='<?=$row2['id'];?>'  <?=($row2['id']==$row['stipendiya_types_id'])?"selected":"";?>><?=$row2['type'];?></option>
                                  <?php
                                  }
                                  ?>
                                </select></br>
                                Начало стипендии: <input type=text name="stipendiyaNaznachenieDateStart" value="<?=$row['date_start'];?>"></br>
                                Конец стипендии: <input type=text name="stipendiyaNaznachenieDateEnd" value="<?=$row['date_end'];?>"></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="<?=(empty($_REQUEST['id']))?"Сохранить":"Изменить";?>">
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
                              <form action="edit_table.php" method="GET">
                                Вид: <input type=text name="stipendiyaTypesType" value="<?=$row['type'];?>"></br>
                                Количество: <input type=text name="stipendiyaTypesAmount" value="<?=$row['amount'];?>"></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="<?=(empty($_REQUEST['id']))?"Сохранить":"Изменить";?>">
                              </form>
                  <?php
                              break;
                              default:
                              # code...
                              break;
                      
                            case 'student':
                              $result = mysqli_query($connection, "SELECT * FROM `student` WHERE `id` = '".$_REQUEST['id']."'");
                              $row = mysqli_fetch_assoc($result);
                              $result1 = mysqli_query($connection, "SELECT * FROM `group`");
                              ?>
                              <form action="edit_table.php" method="GET">
                                Фамилия: <input type=text name="studentSurname" value="<?=$row['surname'];?>"></br>
                                Имя: <input type=text name="studentName" value="<?=$row['name'];?>"></br>
                                Отчество: <input type=text name="studentPatronomicName" value="<?=$row['patronomic_name'];?>"></br>
                                Адресс: <input type=text name="studentAdress" value="<?=$row['adress'];?>"></br>
                                Пол: <input type=text name="studentGender" value="<?=$row['gender'];?>"></br>
                                Дата рождения: <input type=text name="studentDateBorn" value="<?=$row['date_born'];?>"></br>
                                Группа: 
                                <select name='groupId'>
                                  <?php while ($row1 = mysqli_fetch_assoc($result1))
                                  {
                                    ?><option value='<?=$row1['id'];?>'  <?=($row1['id']==$row['group_id'])?"selected":"";?>><?=$row1['name'];?></option>
                                  <?php
                                  }
                                  ?>
                                </select></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="<?=(empty($_REQUEST['id']))?"Сохранить":"Изменить";?>">
                              </form>
                  <?php
                              break;
                              default:
                              # code...
                              break;
                      
                      case 'study':
                              $result = mysqli_query($connection, "SELECT * FROM `study` WHERE `id` = '".$_REQUEST['id']."'");
                              $row = mysqli_fetch_assoc($result);
                              $result1 = mysqli_query($connection, "SELECT * FROM `subject`");
                              $result2 = mysqli_query($connection, "SELECT * FROM `group`");
                              ?>
                              <form action="edit_table.php" method="GET">
                                Предмет:
                                <select name='subjectId'>
                                  <?php while ($row1 = mysqli_fetch_assoc($result1))
                                  {
                                    ?><option value='<?=$row1['id'];?>'  <?=($row1['id']==$row['subject_id'])?"selected":"";?>><?=$row1['name'];?></option>
                                  <?php
                                  }
                                  ?>
                                </select></br>
                                Группа: 
                                <select name='groupId'>
                                  <?php while ($row2 = mysqli_fetch_assoc($result2))
                                  {
                                    ?><option value='<?=$row2['id'];?>'  <?=($row2['id']==$row['group_id'])?"selected":"";?>><?=$row2['name'];?></option>
                                  <?php
                                  }
                                  ?>
                                </select></br>
                                Семестр: <input type=text name="studySemesrt" value="<?=$row['semesrt'];?>"></br>
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="<?=(empty($_REQUEST['id']))?"Сохранить":"Изменить";?>">
                              </form>
                  <?php
                              break;
                      
                            case 'subject':
                              $result = mysqli_query($connection, "SELECT * FROM `subject` WHERE `id`= '".$_REQUEST['id']."'");
                              $row = mysqli_fetch_assoc($result);
                              $result1 = mysqli_query($connection, "SELECT * FROM `lecturers`");
                              ?>
                              <form action="edit_table.php" method="GET">
                                Предмет: <input type=text name="subjectName" value="<?=$row['name'];?>"></br>
                                Преподаватель:
                                <select name='lectureId'>
                                  <?php while ($row1 = mysqli_fetch_assoc($result1))
                                  {
                                    ?><option value='<?=$row1['id'];?>'  <?=($row1['id']==$row['lecture_id'])?"selected":"";?>><?=$row1['surname']. ' '. $row1['name']. ' ' . $row1['patronomic_name'];?></option>
                                  <?php
                                  }
                                  ?>
                                </select></br>
                                Лекционные часы: <input type=text name="subjectLectionTime" value="<?=$row['lection_time'];?>"></br>
                                Практические часы: <input type=text name="subjectLabaTime" value="<?=$row['laba_time'];?>"></br>
                                Курсовая работа: <input type=text name="subjectCourseWork" value="<?=$row['course_work'];?>"></br>
                                Тип зачёта: <input type=text name="subjectType" value="<?=$row['type'];?>"></br>  
                                <input type=hidden name="id" value="<?=$row['id'];?>">
                                <input type=hidden name="tableName" value="<?=$_GET['tableName'];?>">
                                <input type=submit name="action" value="<?=(empty($_REQUEST['id']))?"Сохранить":"Изменить";?>">
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
