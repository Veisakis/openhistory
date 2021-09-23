<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ιστορία</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <section>
    	<img src="img/kontoglou.jpeg" alt="Χάρτης Ελλάδας" class="bg">
	<a href="rss.xml"><img src="img/rss.jpeg" alt="rss" class="rss"></a>
    </section>
    <hr>
    <section>
    <div class="titles">
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
          echo "<a href='$path/$article.html'>$article</a><br/>";
    }
  ?>
  </div>
  </section>
  <section id="map-section">
	<ul class="byzantine-maps">
	<li>
		<figure>
			<img src="img/maps/megas323.jpeg" alt="Ευρωπαϊκός χάρτης του 323μ.Χ." class="map-image">
			<figcaption id="map-caption"><i>Κωνσταντίνος Α' ο Μέγας (280-337)</i><figcaption>
		</figure>
	</li>
	<li>
		<figure>
			<img src="img/maps/boulgaroktonos1000.jpeg" alt="Ευρωπαϊκός χάρτης του 1000μ.Χ." class="map-image">
			<figcaption id="map-caption"><i>Βασίλειος B' ο Βουλγαροκτόνος (958-1025)</i><figcaption>
		</figure>
	</li>
	<li>
		<figure>
			<img src="img/maps/palaiologos1453.jpeg" alt="Ευρωπαϊκός χάρτης του 1453μ.Χ." class="map-image">
			<figcaption id="map-caption"><i>Κωνσταντίνος IA' Παλαιολόγος (1405-1453)</i><figcaption>
		</figure>
	</li>	
	<h4 class="map-title">Με κίτρινο η εδαφική έκταση της Βυζαντινής Αυτοκρατορίας, κατά τη διακυβέρνηση τριών εμβληματικών αυτοκρατόρων της.</h4>
  </section>
  <div class="titles">
  <section id="cat-section">
	  <a href="tags/anc.php">Αρχαία Ελλάδα</a><br/>
	  <a href="tags/byz.php">Βυζαντινή Αυτοκρατορία</a><br/>
	  <a href="tags/rev.php">Επανάσταση 1821</a><br/>
	  <a href="tags/maced.php">Μακεδονικός Αγώνας</a><br/>
	  <a href="tags/balkan.php">Βαλκανικοί Πόλεμοι</a><br/>
	  <a href="tags/ww2.php">Β Παγκόσμιος Πόλεμος</a><br/>
  </section>
  </div>
  </body>
</html>
