  <style type="text/css">
   A {
    color: #000000; /* Цвет обычной ссылки */
    text-decoration: none; /* Отменяем подчеркивание у ссылки */
   }
   A:visited {
    color: #000000; /* Цвет посещенной ссылки */
   }
  </style> 
 <header id="header">
      <div class="header__top">
        <div class="container">
          <div class="header__top__logo">
            <h1><a href="/">Деканат</a></h1>
          </div>
          <nav class="header__top__menu">
            <a href="../pages/login.html" >Log in</a>
          </nav>
        </div>
      </div>
      <?php 
      $categories = mysqli_query($connection, "SELECT `id`, `abbr` FROM `kafedra`");
      ?>
      <div class="header__bottom">
        <div class="container">
          <nav>
            <ul>
              <?php
                while ($cat = mysqli_fetch_assoc($categories) )
                {
                    ?>
                    <li><a href="/pages/kafedra.php?category=<?php echo $cat['id']; ?>"><?=$cat['abbr']; ?></a></li> 
              <?php   
                }
              ?> 
            </ul>
          </nav>
        </div>
      </div>
    </header>
