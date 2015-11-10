# Alexander Street Press Video Thumbnails

Code to pull thumbnail links for Alexander Street Press streaming videos.

Prerequisits: 
  * A MySQL database with a varchar(255) field to store the thumbnail link in.
  * PHP 5
  * CURL (debian users: "sudo apt-get install php5-curl" then restart apache2 with: "sudo /etc/init.d/apache2 restart")
 

Sample Usage: 

  ```
  //Sample Usage.
  require_once('get_asp_thumbnail.php');
  $videoURL = "http://search.alexanderstreet.com/view/work/764265"; //This is the URL of the ASP video. 
  $thumbnailURL = get_asp_thumb_link($videoURL);
  
  echo "<img src='$thumbnailURL' alt='Video Thumbnail' />";
  
  //Update your database with the new link.
  require_once('database_connetion_file.php'); //This is your mysqli connection ($DBCONNECTION)
  $SQL = "UPDATE `alexander_street_press_videos` SET `thumbnail_link` = '$thumbnailURL' WHERE `video_identifier` = '$videoID'";
  $query = mysqli_query($DBCONNECTION,$SQL);
  
```

