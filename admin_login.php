<?php
  require "../includes/config.php"; 
  session_start();
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
              <h3></h3>
              <div class="block__content">
                <div class="full-text">
                  <?php
                  if (($_SESSION['login'] == '') AND ($_SESSION['password']) == '')
                  {
                    $_SESSION['login'] = $_REQUEST['login'];
                    $_SESSION['password'] = $_REQUEST['password'];
                  }
                  if (($_SESSION['login'] == $config['adminlog']) AND ($_SESSION['password'] == $config['adminpassw']))
                  {
                    if (isset($_REQUEST['action'])){
                      switch ($_REQUEST['action']) {
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

                    }
                        $table = mysqli_query($connection, "SHOW TABLES");
                        ?>
                        <table>
                          <tr>
                              <td>Название таблицы</td>
                              <td>Действие</td>
                          </tr>
                        <?php
                        while ($tab = mysqli_fetch_assoc($table))
                        {
                          ?>
                          <tr>
                            <td><?=$tab['Tables_in_dekanat'];?></td>
                            <td><button><a href="./edit_table.php?tableName=<?=$tab['Tables_in_dekanat'];?>&">Изменить</a></button>&nbsp<button><a href="./admin_login.php?name=<?=$tab['Tables_in_dekanat'];?>&action=del">Удалить</a></button></td>
                          </tr>
                  <?php  
                        }?>
                        </table>
                        <?php
                  }
                  else
                  {
                      echo 'Неправильный ввод данных сломал меня, '?><a href="../pages/login.html" >полечи</a>;
                  <?php
                  }
                  ?>
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
