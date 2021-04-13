<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <img src="../img/index.jpeg" alt="Χάρτης Ελλάδας" class="bg">
    <hr>
    <div class="text-mid">
    <?php
	
    $path = "src";
    $articles_name = array();
    $articles_value = array();
    $dirop = opendir($path);

    while (($file = readdir($dirop)) !== false) {
      if($file != "." && $file != ".." && $file != "index.php" && $file != ".htaccess" && $file != "error_log" && $file != "cgi-bin")
      {
          $striped_file = str_replace(".html", "", $file);
          $articles_name[] = $striped_file;
        
	  $divided = explode(' - ', $striped_file);
        
          if (strpos($divided[0],'πΧ') == true) {
            $date_code = explode(' ',$divided[0]);  
            $articles_value[] = number_format('-' . $date_code[0]);

          }
          else {
            $articles_value[] = number_format($divided[0]);
          }
       }
    }
    
    closedir($dirop);

    $articles = array_combine($articles_name,$articles_value);	
    asort($articles);

    foreach ($articles as $article => $val) {
          echo "<a href='$path/$article.html' style='text-decoration: none;'>$article</a><br/>";
    }

    ?>
  </div>
  </body>
</html>
