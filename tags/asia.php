<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ιστορία</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <section>
      <img src="../img/tags/asia.jpeg" alt="Νικόλαος Πλαστήρας" class="tag-image">
    </section>
    <hr class="taghr">
    <div class="titles">
    <?php
    $articles_name = array();
    $articles_value = array();
    $output=null;
    $retval=null;
    exec("grep -l 'tag:Μικρασιατική Εκστρατεία' ../src/* | sed s/^.*src// | sed s/^.//", $output, $retval);
	  
    foreach ($output as $out){
    	$striped_file = str_replace(".html", "", $out);
    	$articles_name[] = $striped_file;
	$divided = explode(' - ', $striped_file);
        
    	if (strpos($divided[0],'πΧ') == true){
      	  $date_code = explode(' ',$divided[0]);  
      	  $articles_value[] = number_format('-' . $date_code[0]);
        }
        else{
          $articles_value[] = number_format($divided[0]);
        }
    }
    $articles = array_combine($articles_name,$articles_value);	
    asort($articles);

    foreach ($articles as $article => $val) {
          echo "<a href='../src/$article.html'>$article</a><br/>";
    }
  ?>
  </div>
  </body>
</html>
