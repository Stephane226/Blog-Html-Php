<?php



if(isset($_GET['id'])){
    $id= $_GET['id'];

    function button1() {
        require("../connectdb.php");
        $db = $conn->prepare('DELETE FROM blog_posts WHERE id = ?');
   $db->execute(array($_GET['id']));
   header('Location: index.php') ;
   }
   function button2() {
      header('Location: index.php') ;
   }

    if(array_key_exists('button1', $_POST)) {
       button1();
   }
   else if(array_key_exists('button2', $_POST)) {
       button2();
   }
  
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <title>blog Islam</title>
</head>
<body>
    <br><br><br>
                   <div class="delete-post">
                       <h3>Do you want to delete that post?</h3>

                       <div class="delete-post-select"> 
                       <form method="post">
        <input type="submit" name="button1"
                class="button" value="YES" />
          
        <input type="submit" name="button2"
                class="button" value="NO" />
    </form>
                       </div>
                   </div>
</body>
</html>