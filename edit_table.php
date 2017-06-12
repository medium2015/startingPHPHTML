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
                    if (isset($_REQUEST['action'])){
                      switch ($_REQUEST['action']) 
                        {
                          case 'Изменить':
                            switch ($_REQUEST['tableName']) 
                            {
                              case 'faculty':
                                $query ="
                                UPDATE 
                                `faculty` 
                                SET
                                  `name`='".$_REQUEST['facultyName']."',
                                  `abbr`='".$_REQUEST['facultyAbbr']."',
                                  `phone`='".$_REQUEST['facultyPhone']."'
                                WHERE `faculty`.`id` = '".$_REQUEST['id']."'";

                                $result = mysqli_query($connection, $query);
                                break;

                                case 'group':
                                $query ="
                                UPDATE 
                                `group` 
                                SET
                                  `name`='".$_REQUEST['groupName']."',
                                  `course`='".$_REQUEST['groupCourse']."',
                                  `kafedra`='".$_REQUEST['groupKafedra']."',
                                  `date_start`='".$_REQUEST['groupDateStart']."',
                                  `date_end`='".$_REQUEST['groupDateEnd']."'
                                WHERE `group`.`id` = '".$_REQUEST['id']."'";

                                $result = mysqli_query($connection, $query);
                                break;

                                case 'kafedra':
                                $query ="
                                UPDATE 
                                `kafedra` 
                                SET
                                  `name`='".$_REQUEST['kafedraName']."',
                                  `abbr`='".$_REQUEST['kafedraAbbr']."',
                                  `phone`='".$_REQUEST['kafedraPhone']."'
                                WHERE `kafedra`.`id` = '".$_REQUEST['id']."'";

                                $result = mysqli_query($connection, $query);
                                break;

                                case 'lecturers':
                                $query ="
                                UPDATE 
                                `lecturers` 
                                SET
                                  `name`='".$_REQUEST['lecturersName']."',
                                  `surname`='".$_REQUEST['lecturersSurname']."',
                                  `patronomic_name`='".$_REQUEST['lecturersPatronomicName']."',
                                  `adress`='".$_REQUEST['lecturersAdress']."',
                                  `gender`='".$_REQUEST['lecturersGender']."',
                                  `date_born`='".$_REQUEST['lecturersDateBorn']."'
                                WHERE `lecturers`.`id` = '".$_REQUEST['id']."'";

                                $result = mysqli_query($connection, $query);
                                break;

                                case 'social_activity':
                                $query ="
                                UPDATE 
                                `social_activity` 
                                SET
                                  `type`='".$_REQUEST['socialActivityType']."',
                                  `bal`='".$_REQUEST['socialActivityBal']."'
                                WHERE `social_activity`.`id` = '".$_REQUEST['id']."'";

                                $result = mysqli_query($connection, $query);
                                break;

                                case 'speciality':
                                $query ="
                                UPDATE 
                                `speciality` 
                                SET
                                  `name`='".$_REQUEST['specialityName']."',
                                  `kafedra`='".$_REQUEST['specialityKafedraName']."'
                                WHERE `speciality`.`id` = '".$_REQUEST['id']."'";

                                $result = mysqli_query($connection, $query);
                                break;

                                case 'stipendiya_naznachenie':
                                $query ="
                                UPDATE 
                                `stipendiya_naznachenie` 
                                SET
                                  `type`='".$_REQUEST['stipendiyaNaznachenieType']."',
                                  `date_start`='".$_REQUEST['stipendiyaNaznachenieDateStart']."',
                                  `date_end`='".$_REQUEST['stipendiyaNaznachenieDateEnd']."'
                                WHERE `stipendiya_naznachenie`.`id` = '".$_REQUEST['id']."'";

                                $result = mysqli_query($connection, $query);
                                break;

                                case 'stipendiya_types':
                                $query ="
                                UPDATE 
                                `stipendiya_types` 
                                SET
                                  `type`='".$_REQUEST['stipendiyaTypesType']."',
                                  `amount`='".$_REQUEST['stipendiyaTypesAmount']."'
                                WHERE `stipendiya_types`.`id` = '".$_REQUEST['id']."'";

                                $result = mysqli_query($connection, $query);
                                break;

                                case 'student':
                                $query ="
                                UPDATE 
                                `student` 
                                SET
                                  `surname`='".$_REQUEST['studentSurname']."',
                                  `name`='".$_REQUEST['studentName']."',
                                  `patronomic_name`='".$_REQUEST['studentPatronomicName']."',
                                  `adress`='".$_REQUEST['studentAdress']."',
                                  `gender`='".$_REQUEST['studentGender']."',
                                  `date_born`='".$_REQUEST['studentDateBorn']."',
                                WHERE `student`.`id` = '".$_REQUEST['id']."'";

                                $result = mysqli_query($connection, $query);
                                break;

                                case 'study':
                                $query ="
                                UPDATE 
                                `study` 
                                SET
                                  `semestr`='".$_REQUEST['studySemestr']."'
                                WHERE `study`.`id` = '".$_REQUEST['id']."'";

                                $result = mysqli_query($connection, $query);
                                break;

                                case 'subject':
                                $query ="
                                UPDATE 
                                `subject` 
                                SET
                                  `name`='".$_REQUEST['subjectName']."',
                                  `lection_time`='".$_REQUEST['subjectLectionTime']."',
                                  `laba_time`='".$_REQUEST['subjectLabaTime']."',
                                  `course_work`='".$_REQUEST['subjectCourseWork']."',
                                  `type`='".$_REQUEST['subjectType']."'
                                WHERE `subject`.`id` = '".$_REQUEST['id']."'";

                                $result = mysqli_query($connection, $query);
                                break;
                                default:
                                # code...
                                break;
                            }
                            break;
                            default:
                            # code...
                            break;      
                          case 'del':

                            $result = mysqli_query($connection, "DELETE FROM `".$_GET['tableName']."` WHERE `faculty`.`id` = '".$_GET['id']."'");   

                            # code...
                            break;
                          default:
                            # code...
                            break;
                        }
                      }
                    switch ($_REQUEST['tableName']) 
                    {
                          case 'faculty':
                            $result = mysqli_query($connection,"SELECT * FROM `faculty`;");
                            ?>
                            <table>
                              <tr>
                                <td align="center">id</td>
                                <td align="center">Название</td>
                                <td align="center">Аббривиатура</td>
                                <td align="center">Номер телефона</td>
                                <td align="center">Действие</td>
                              </tr>
                        <?php
                        while ($res = mysqli_fetch_assoc($result))
                        {
                          ?>
                          <tr>
                            <td align="center"><?=$res['id'];?></td>
                            <td align="center"><?=$res['name'];?></td>
                            <td align="center"><?=$res['abbr'];?></td>
                            <td align="center"><?=$res['phone'];?></td>
                            <td align="center"><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>">Изменить/</a>&nbsp<a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></td>
                          </tr>
                  <?php  
                        }?>
                        </table>
                        <?php
                            break;
                          case 'group':
                            $result = mysqli_query($connection,"SELECT `group`.`id`, `speciality`.`name` AS 'speciality_name', `group`.`name`, `group`.`course`, `kafedra`.`name` AS 'kafedra_name', `group`.`study_start`, `group`.`study_end` FROM `group` LEFT JOIN `kafedra` ON (`kafedra`.`id`=`group`.`kafedra_id`) LEFT JOIN `speciality` ON (`speciality`.`id` = `group`.`speciality_id`)");
                            ?>
                            <table>
                              <tr>
                                <td align="center">id</td>
                                <td align="center">Специльность</td>
                                <td align="center">Имя</td>
                                <td align="center">Курс</td>
                                <td align="center">Кафедра</td>
                                <td align="center">Начало обучения</td>
                                <td align="center">Конец обучения</td>
                                <td align="center">Действие</td>
                              </tr>
                        <?php
                        while ($res = mysqli_fetch_assoc($result))
                        {
                          ?>
                          <tr>
                            <td align="center"><?=$res['id'];?></td>
                            <td align="center"><?=$res['speciality_name'];?></td>
                            <td align="center"><?=$res['name'];?></td>
                            <td align="center"><?=$res['course'];?></td>
                            <td align="center"><?=$res['kafedra_name'];?></td>
                            <td align="center"><?=$res['study_start'];?></td>
                            <td align="center"><?=$res['study_end'];?></td>
                            <td align="center"><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>">Изменить/</a>&nbsp<a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></td>
                          </tr>
                  <?php  
                        }?>
                        </table>
                        <?php
                            break;
                            case 'kafedra':
                            $result = mysqli_query($connection,"SELECT * FROM `kafedra`");
                            ?>
                            <table>
                              <tr>
                                <td align="center">id</td>
                                <td align="center">Название</td>
                                <td align="center">Аббривиатура</td>
                                <td align="center">Номер телефона</td>
                                <td align="center">Действие</td>
                              </tr>
                        <?php
                        while ($res = mysqli_fetch_assoc($result))
                        {
                          ?>
                          <tr>
                            <td align="center"><?=$res['id'];?></td>
                            <td align="center"><?=$res['name'];?></td>
                            <td align="center"><?=$res['abbr'];?></td>
                            <td align="center"><?=$res['phone'];?></td>
                            <td align="center"><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>">Изменить/</a>&nbsp<a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></td>
                          </tr>
                  <?php  
                        }?>
                        </table>
                        <?php
                            break;
                            case 'lecturers':
                            $result = mysqli_query($connection,"SELECT `lecturers`.`id`, `lecturers`.`name`, `lecturers`.`surname`, `lecturers`.`patronomic_name`, `lecturers`.`adress`, `lecturers`.`gender`, `lecturers`.`date_born` , `kafedra`.`name` AS 'kafedra_name' FROM `lecturers` LEFT JOIN `kafedra` ON (`kafedra`.`id`=`lecturers`.`kafedra_id`)");
                            ?>
                            <table>
                              <tr>
                                <td align="center">id</td>
                                <td align="center">Фамилия</td>
                                <td align="center">Имя</td>
                                <td align="center">Отчество</td>
                                <td align="center">Адресс</td>
                                <td align="center">Пол</td>
                                <td align="center">Дата рождения</td>
                                <td align="center">Кафедра</td>
                                <td align="center">Действие</td>
                              </tr>
                        <?php
                        while ($res = mysqli_fetch_assoc($result))
                        {
                          ?>
                          <tr>
                            <td align="center"><?=$res['id'];?></td>
                            <td align="center"><?=$res['surname'];?></td>
                            <td align="center"><?=$res['name'];?></td>
                            <td align="center"><?=$res['patronomic_name'];?></td>
                            <td align="center"><?=$res['adress'];?></td>
                            <td align="center"><?=$res['gender'];?></td>
                            <td align="center"><?=$res['date_born'];?></td>
                            <td align="center"><?=$res['kafedra_name'];?></td>
                            <td align="center"><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>">Изменить/</a>&nbsp<a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></td>
                          </tr>
                  <?php  
                        }?>
                        </table>
                        <?php
                            break;
                            case 'social_activity':
                            $result = mysqli_query($connection,"SELECT `social_activity`.`id`, `student`.`name`, `student`.`surname`, `student`.`patronomic_name`,`social_activity`.`type`, `social_activity`.`bal` FROM `social_activity` LEFT JOIN `student` ON (`student`.`id`=`social_activity`.`student_id`)");
                            ?>
                            <table>
                              <tr>
                                <td align="center">id</td>
                                <td align="center">Студент</td>
                                <td align="center">Тип</td>
                                <td align="center">Бал</td>
                                <td align="center">Действие</td>
                              </tr>
                        <?php
                        while ($res = mysqli_fetch_assoc($result))
                        {
                          ?>
                          <tr>
                            <td align="center"><?=$res['id'];?></td>
                            <td align="center"><?=$res['surname'].' '.mb_substr($res['name'],0,1,'UTF-8').'.'.mb_substr($res['patronomic_name'],0,1,'UTF-8').'.';?></td>
                            <td align="center"><?=$res['type'];?></td>
                            <td align="center"><?=$res['bal'];?></td>
                            <td align="center"><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>">Изменить/</a>&nbsp<a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></td>
                          </tr>
                  <?php  
                        }?>
                        </table>
                        <?php
                            break;
                            case 'speciality':
                            $result = mysqli_query($connection,"SELECT `speciality`.`id`, `speciality`.`name`, `kafedra`.`name` AS 'kafedra_name' FROM `speciality` LEFT JOIN `kafedra` ON (`kafedra`.`id`=`speciality`.`kafedra_id`)");
                            ?>
                            <table>
                              <tr>
                                <td align="center">id</td>
                                <td align="center">Специльность</td>
                                <td align="center">Кафедра</td>
                                <td align="center">Действие</td>
                              </tr>
                        <?php
                        while ($res = mysqli_fetch_assoc($result))
                        {
                          ?>
                          <tr>
                            <td align="center"><?=$res['id'];?></td>
                            <td align="center"><?=$res['name'];?></td>
                            <td align="center"><?=$res['kafedra_name'];?></td>
                            <td align="center"><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>">Изменить/</a>&nbsp<a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></td>
                          </tr>
                  <?php  
                        }?>
                        </table>
                        <?php
                            break;
                            case 'stipendiya_naznachenie':
                            $result = mysqli_query($connection,"SELECT `stipendiya_naznachenie`.`id`, `student`.`surname`, `student`.`name`, `student`.`patronomic_name`, `stipendiya_types`.`type`, `stipendiya_naznachenie`.`date_start`, `stipendiya_naznachenie`.`date_end` FROM `stipendiya_naznachenie` LEFT JOIN `student` ON (`student`.`id`=`stipendiya_naznachenie`.`student_id`) LEFT JOIN `stipendiya_types` ON (`stipendiya_types`.`id`=`stipendiya_naznachenie`.`stipendiya_types_id`)");
                            ?>
                            <table>
                              <tr>
                                <td align="center">id</td>
                                <td align="center">Студент</td>
                                <td align="center">Состоит на</td>
                                <td align="center">Дата начала стипендии</td>
                                <td align="center">Дата окончания стипендии</td>
                                <td align="center">Действие</td>
                              </tr>
                        <?php
                        while ($res = mysqli_fetch_assoc($result))
                        {
                          ?>
                          <tr>
                            <td align="center"><?=$res['id'];?></td>
                            <td align="center"><?=$res['surname'].' '.mb_substr($res['name'],0,1,'UTF-8').'.'.mb_substr($res['patronomic_name'],0,1,'UTF-8').'.';?></td>
                            <td align="center"><?=$res['type'];?></td>
                            <td align="center"><?=$res['date_start'];?></td>
                            <td align="center"><?=$res['date_end'];?></td>
                            <td align="center"><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>">Изменить/</a>&nbsp<a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></td>
                          </tr>
                  <?php  
                        }?>
                        </table>
                        <?php
                            break;
                            case 'stipendiya_types':
                            $result = mysqli_query($connection,"SELECT * FROM `stipendiya_types`");
                            ?>
                            <table>
                              <tr>
                                <td align="center">id</td>
                                <td align="center">Вид</td>
                                <td align="center">Количество</td>
                                <td align="center">Действие</td>
                              </tr>
                        <?php
                        while ($res = mysqli_fetch_assoc($result))
                        {
                          ?>
                          <tr>
                            <td align="center"><?=$res['id'];?></td>
                            <td align="center"><?=$res['type'];?></td>
                            <td align="center"><?=$res['amount'];?></td>
                            <td align="center"><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>">Изменить/</a>&nbsp<a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></td>
                          </tr>
                  <?php  
                        }?>
                        </table>
                        <?php
                            break;
                            case 'student':
                            $result = mysqli_query($connection,"SELECT `student`.`id`, `student`.`surname`, `student`.`name`, `student`.`patronomic_name`,`student`.`adress`,`student`.`gender`,`student`.`date_born`, `group`.`name` AS 'group_name' FROM `student` LEFT JOIN `group` ON (`group`.`id`=`student`.`group_id`)");
                            ?>
                            <table>
                              <tr>
                                <td align="center">id</td>
                                <td align="center">Фамилия</td>
                                <td align="center">Имя</td>
                                <td align="center">Отчество</td>
                                <td align="center">Адресс</td>
                                <td align="center">Пол</td>
                                <td align="center">Дата рождения</td>
                                <td align="center">Группа</td>
                                <td align="center">Действие</td>
                              </tr>
                        <?php
                        while ($res = mysqli_fetch_assoc($result))
                        {
                          ?>
                          <tr>
                            <td align="center"><?=$res['id'];?></td>
                            <td align="center"><?=$res['surname'];?></td>
                            <td align="center"><?=$res['name'];?></td>
                            <td align="center"><?=$res['patronomic_name'];?></td>
                            <td align="center"><?=$res['adress'];?></td>
                            <td align="center"><?=$res['gender'];?></td>
                            <td align="center"><?=$res['date_born'];?></td>
                            <td align="center"><?=$res['grou_name'];?></td>
                            <td align="center"><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>">Изменить/</a>&nbsp<a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></td>
                          </tr>
                  <?php  
                        }?>
                        </table>
                        <?php
                            break;
                            case 'study':
                            $result = mysqli_query($connection,"SELECT `study`.`id`, `subject`.`name`,`group`.`name` AS 'group_name', `study`.`semesrt` FROM `study` LEFT JOIN `subject` ON (`subject`.`id` = `study`.`subject_id`) LEFT JOIN `group` ON (`group`.`id`=`study`.`group_id`)");
                            ?>
                            <table>
                              <tr>
                                <td align="center">id</td>
                                <td align="center">Предмет</td>
                                <td align="center">Группа</td>
                                <td align="center">Семестр</td>
                                <td align="center">Действие</td>
                              </tr>
                        <?php
                        while ($res = mysqli_fetch_assoc($result))
                        {
                          ?>
                          <tr>
                            <td align="center"><?=$res['id'];?></td>
                            <td align="center"><?=$res['name'];?></td>
                            <td align="center"><?=$res['group_name'];?></td>
                            <td align="center"><?=$res['semesrt'];?></td>
                            <td align="center"><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>">Изменить/</a>&nbsp<a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></td>
                          </tr>
                  <?php  
                        }?>
                        </table>
                        <?php
                            break;
                            case 'subject':
                            $result = mysqli_query($connection,"SELECT `subject`.`id`, `subject`.`name`, `lecturers`.`surname` AS 'lecturers_surname', `lecturers`.`name` AS 'lecturers_name', `lecturers`.`patronomic_name` AS 'lecturers_patronomic_name', `subject`.`lection_time`, `subject`.`laba_time`, `subject`.`course_work`, `subject`.`type` FROM `subject` LEFT JOIN `lecturers` ON (`lecturers`.`id`=`subject`.`lecture_id`)");
                            ?>
                            <table>
                              <tr>
                                <td align="center">id</td>
                                <td align="center">Предмет</td>
                                <td align="center">Преподаватель</td>
                                <td align="center">Часы лекций</td>
                                <td align="center">Часы практик</td>
                                <td align="center">Курсовая работа</td>
                                <td align="center">Вид зачёта</td>
                                <td align="center">Действие</td>
                              </tr>
                        <?php
                        while ($res = mysqli_fetch_assoc($result))
                        {
                          ?>
                          <tr>
                            <td align="center"><?=$res['id'];?></td>
                            <td align="center"><?=$res['name'];?></td>
                            <td align="center"><?=$res['lecturers_surname'].' '.mb_substr($res['lecturers_name'],0,1,'UTF-8').'.'.mb_substr($res['lecturers_patronomic_name'],0,1,'UTF-8').'.';?></td>
                            <td align="center"><?=$res['lection_time'];?></td>
                            <td align="center"><?=$res['laba_time'];?></td>
                            <td align="center"><?=$res['course_work'];?></td>
                            <td align="center"><?=$res['type'];?></td>
                            <td align="center"><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>">Изменить/</a>&nbsp<a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></td>
                          </tr>
                  <?php  
                        }?>
                        </table>
                        <?php
                            break;
                          case 'del':
                            $query = sprintf("
                            DROP TABLE 
                            `%s`",
                            $_GET['name']
                            ); 

                            $result = mysqli_query($connection, $query);      
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