<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php

    $path = "src";
    $dirop = opendir($path);

    while (($file = readdir($dirop)) !== false) {
      if($file != "." && $file != ".." && $file != "index.php" && $file != ".htaccess" && $file != "error_log" && $file != "cgi-bin")
      {
          $striped_file = str_replace(".html", "", $file);
          echo "<a href='$path/$file'>$striped_file</a><br/>";
      }
    }
    closedir($dirop);

    ?>
  </body>
</html>
