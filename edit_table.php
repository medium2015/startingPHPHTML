<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $config['title']; ?></title>

x`

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
          <section class="content__left col-md-12">
            <div class="block"> 
              <h3></h3>
              <div class="block__content">
                <div class="full-text">
                  <a href="./admin_login.php">Все таблицы</a>
                  <?php
                    if (isset($_REQUEST['action'])){
                      switch ($_REQUEST['action']) 
                        {
                          case 'Сохранить':
                            switch ($_REQUEST['tableName']) 
                            {
                              case 'faculty':
                              $query =sprintf("
                                INSERT INTO 
                                `faculty`(
                                  `id`,
                                  `name`,
                                  `abbr`,
                                  `phone`)
                                  VALUES (NULL,'%s','%s','%s')",
                                    $_REQUEST['facultyName'],
                                    $_REQUEST['facultyAbbr'],
                                    $_REQUEST['facultyPhone']);
                                $result = mysqli_query($connection, $query);
                                break;

                                case 'group':
                                $query =sprintf("
                                INSERT INTO 
                                `group`(
                                  `id`,
                                  `speciality_id`,
                                  `name`,
                                  `course`,
                                  `kafedra_id`,
                                  `study_start`,
                                  `study_end`)
                                  VALUES (NULL,'%s','%s','%s','%s','%s','%s')",
                                    $_REQUEST['specialityId'],
                                    $_REQUEST['groupName'],
                                    $_REQUEST['groupCourse'],
                                    $_REQUEST['kafedraId'],
                                    $_REQUEST['groupStudyStart'],
                                    $_REQUEST['groupStudyEnd']);
                                $result = mysqli_query($connection, $query);
                                break;

                                case 'kafedra':
                                $query =sprintf("
                                INSERT INTO 
                                `kafedra`(
                                  `id`,
                                  `name`,
                                  `abbr`,
                                  `phone`)
                                  VALUES (NULL,'%s','%s','%s')",
                                    $_REQUEST['kafedraName'],
                                    $_REQUEST['kafedraAbbr'],
                                    $_REQUEST['kafedraPhone']);
                                $result = mysqli_query($connection, $query);
                                break;

                                case 'lecturers':
                                $query =sprintf("
                                INSERT INTO 
                                `lecturers`(
                                  `id`,
                                  `name`,
                                  `surname`,
                                  `patronomic_name`,
                                  `adress`,
                                  `gender`,
                                  `date_born`,
                                  `kafedra_id`)
                                  VALUES (NULL,'%s','%s','%s','%s','%s','%s','%s')",
                                    $_REQUEST['leturersName'],
                                    $_REQUEST['lecturersSurname'],
                                    $_REQUEST['lecturersPatronomicName'],
                                    $_REQUEST['lecturersAdress'],
                                    $_REQUEST['lecturersGender'],
                                    $_REQUEST['lecturersDateBorn'],
                                    $_REQUEST['kafedraId']);
                                $result = mysqli_query($connection, $query);
                                break;

                                case 'social_activity':
                                $query =sprintf("
                                INSERT INTO 
                                `social_activity`(
                                  `id`,
                                  `student_id`,
                                  `type`,
                                  `bal`)
                                  VALUES (NULL,'%s','%s','%s')",
                                    $_REQUEST['studentId'],
                                    $_REQUEST['socialActivityType'],
                                    $_REQUEST['socialActivityBal']);
                                $result = mysqli_query($connection, $query);
                                break;

                                case 'speciality':
                                $query =sprintf("
                                INSERT INTO 
                                `speciality`(
                                  `id`,
                                  `name`,
                                  `kafedra_id`)
                                  VALUES (NULL,'%s','%s')",
                                    $_REQUEST['specialityName'],
                                    $_REQUEST['kafedraId']);
                                $result = mysqli_query($connection, $query);
                                break;

                                case 'stipendiya_naznachenie':
                                $query =sprintf("
                                INSERT INTO 
                                `stipendiya_naznachenie`(
                                  `id`,
                                  `student_id`,
                                  `stipendiya_types_id`,
                                  `date_start`,
                                  `date_end`)
                                  VALUES (NULL,'%s','%s','%s','%s')",
                                    $_REQUEST['studentId'],
                                    $_REQUEST['stipendiyaTypesId'],
                                    $_REQUEST['stipendiyaNaznachenieDateStart'],
                                    $_REQUEST['stipendiyaNaznachenieDateEnd']);
                                $result = mysqli_query($connection, $query);
                                break;

                                case 'stipendiya_types':
                                $query =sprintf("
                                INSERT INTO 
                                `stipendiya_types`(
                                  `id`,
                                  `type`,
                                  `amount`)
                                  VALUES (NULL,'%s','%s')",
                                    $_REQUEST['stipendiyaTypesType'],
                                    $_REQUEST['stipendiyaTypesAmount']);
                                $result = mysqli_query($connection, $query);
                                break;

                                case 'student':
                                $query =sprintf("
                                INSERT INTO 
                                `student`(
                                  `id`,
                                  `surname`,
                                  `name`,
                                  `patronomic_name`,
                                  `adress`,
                                  `gender`,
                                  `date_born`,
                                  `group_id`)
                                  VALUES (NULL,'%s','%s','%s','%s','%s','%s','%s')",
                                    $_REQUEST['studentSurname'],
                                    $_REQUEST['studentName'],
                                    $_REQUEST['studentPatronomicName'],
                                    $_REQUEST['studentAdress'],
                                    $_REQUEST['studentGender'],
                                    $_REQUEST['studentDateBorn'],
                                    $_REQUEST['groupId']);
                                $result = mysqli_query($connection, $query);
                                break;

                                case 'study':
                                $query =sprintf("
                                INSERT INTO 
                                `study`(
                                  `id`,
                                  `subject_id`,
                                  `group_id`,
                                  `semesrt`)
                                  VALUES (NULL,'%s','%s','%s')",
                                    $_REQUEST['subjectId'],
                                    $_REQUEST['groupId'],
                                    $_REQUEST['studySemesrt']); 
                                $result = mysqli_query($connection, $query);
                                break;

                                case 'subject':
                                $query =sprintf("
                                INSERT INTO 
                                `subject`(
                                  `id`,
                                  `name`,
                                  `lecture_id`,
                                  `lection_time`,
                                  `laba_time`,
                                  `course_work`,
                                  `type`)
                                  VALUES (NULL,'%s','%s','%s','%s','%s','%s')",
                                    $_REQUEST['subjectName'],
                                    $_REQUEST['lectureId'],
                                    $_REQUEST['subjectLectionTime'],
                                    $_REQUEST['subjectLabaTime'],
                                    $_REQUEST['subjectCourseWork'],
                                    $_REQUEST['subjectType']); 
                                $result = mysqli_query($connection, $query);
                                break;
                                default:
                                # code...
                                break;
                          }
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
                                  `speciality_id`='".$_REQUEST['specialityId']."',
                                  `name`='".$_REQUEST['groupName']."',
                                  `course`='".$_REQUEST['groupCourse']."',
                                  `kafedra_id`='".$_REQUEST['kafedraId']."',
                                  `study_start`='".$_REQUEST['groupStudyStart']."',
                                  `study_end`='".$_REQUEST['groupStudyEnd']."'
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
                                  `name`='".$_REQUEST['leсturersName']."',
                                  `surname`='".$_REQUEST['lecturersSurname']."',
                                  `patronomic_name`='".$_REQUEST['lecturersPatronomicName']."',
                                  `adress`='".$_REQUEST['lecturersAdress']."',
                                  `gender`='".$_REQUEST['lecturersGender']."',
                                  `date_born`='".$_REQUEST['lecturersDateBorn']."',
                                  `kafedra_id`='".$_REQUEST['kafedraId']."'
                                WHERE `lecturers`.`id` = '".$_REQUEST['id']."'";

                                $result = mysqli_query($connection, $query);
                                break;

                                case 'social_activity':
                                $query ="
                                UPDATE 
                                `social_activity` 
                                SET
                                  `student_id`='".$_REQUEST['studentId']."',
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
                                  `kafedra_id`='".$_REQUEST['kafedraId']."'
                                WHERE `speciality`.`id` = '".$_REQUEST['id']."'";

                                $result = mysqli_query($connection, $query);
                                break;

                                case 'stipendiya_naznachenie':
                                $query ="
                                UPDATE 
                                `stipendiya_naznachenie` 
                                SET
                                  `student_id`='".$_REQUEST['studentId']."',
                                  `stipendiya_types_id`='".$_REQUEST['stipendiyaTypesId']."',
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
                                  `group_id`='".$_REQUEST['groupId']."'
                                WHERE `student`.`id` = '".$_REQUEST['id']."'";

                                $result = mysqli_query($connection, $query);
                                break;

                                case 'study':
                                $query ="
                                UPDATE 
                                `study` 
                                SET
                                  `subject_id` = '".$_REQUEST['subjectId']."',
                                  `group_id` = '".$_REQUEST['groupId']."',
                                  `semesrt`='".$_REQUEST['studySemesrt']."'
                                WHERE `study`.`id` = '".$_REQUEST['id']."'";

                                $result = mysqli_query($connection, $query);
                                break;

                                case 'subject':
                                $query ="
                                UPDATE 
                                `subject` 
                                SET
                                  `name`='".$_REQUEST['subjectName']."',
                                  `lecture_id`='".$_REQUEST['lectureId']."',
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
                            $result = mysqli_query($connection, sprintf("DELETE FROM `%s` WHERE `%s`.`id` = %s", $_REQUEST['tableName'], $_REQUEST['tableName'], $_REQUEST['id'])); 
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
                            <td align="center"><button><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=edit">Изменить</a></button>&nbsp<button><a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></button></td>
                          </tr>
                  <?php  
                        }?>
                        </table>
                        <button>
                          <a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=add">Добавить запись</a>
                        </button>
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
                            <td align="center"><button><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=edit">Изменить</a></button>&nbsp<button><a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></button></td>                          </tr>
                  <?php  
                        }?>
                        </table>
                        <button>
                          <a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=add">Добавить запись</a>
                        </button>
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
                            <td align="center"><button><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=edit">Изменить</a></button>&nbsp<button><a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></button></td>                          </tr>
                  <?php  
                        }?>
                        </table>
                        <button>
                          <a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=add">Добавить запись</a>
                        </button>
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
                            <td align="center"><button><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=edit">Изменить</a></button>&nbsp<button><a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></button></td>                          </tr>
                  <?php  
                        }?>
                        </table>
                        <button>
                          <a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=add">Добавить запись</a>
                        </button>
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
                            <td align="center"><button><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=edit">Изменить</a></button>&nbsp<button><a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></button></td>                          </tr>
                  <?php  
                        }?>
                        </table>
                        <button>
                          <a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=add">Добавить запись</a>
                        </button>
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
                            <td align="center"><button><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=edit">Изменить</a></button>&nbsp<button><a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></button></td>                          </tr>
                  <?php  
                        }?>
                        </table>
                        <button>
                          <a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=add">Добавить запись</a>
                        </button>
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
                            <td align="center"><button><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=edit">Изменить</a></button>&nbsp<button><a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></button></td>                          </tr>
                  <?php  
                        }?>
                        </table>
                        <button>
                          <a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=add">Добавить запись</a>
                        </button>
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
                            <td align="center"><button><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=edit">Изменить</a></button>&nbsp<button><a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></button></td>                          </tr>
                  <?php  
                        }?>
                        </table>
                        <button>
                          <a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=add">Добавить запись</a>
                        </button>
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
                            <td align="center"><?=$res['group_name'];?></td>
                            <td align="center"><button><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=edit">Изменить</a></button>&nbsp<button><a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></button></td>                          </tr>
                  <?php  
                        }?>
                        </table>
                        <button>
                          <a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=add">Добавить запись</a>
                        </button>
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
                            <td align="center"><button><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=edit">Изменить</a></button>&nbsp<button><a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></button></td>                          </tr>
                  <?php  
                        }?>
                        </table>
                        <button>
                          <a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=add">Добавить запись</a>
                        </button>
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
                            <td align="center"><button><a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=edit">Изменить</a></button>&nbsp<button><a href="./edit_table.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=del">Удалить</a></button></td>                          </tr>
                  <?php  
                        }?>
                        </table>
                        <button>
                          <a href="./edit_row.php?tableName=<?=$_REQUEST['tableName'];?>&id=<?=$res['id'];?>&action=ad">Добавить запись</a>
                        </button>
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
