
<?php 


if(isset($_GET['id'])){
 
   $id = $_GET['id'];
   require("../connectdb.php");
   $conndb = $conn->prepare("SELECT * FROM blog_posts WHERE id = ?");
   $conndb->execute(array($id));
   $row = $conndb->fetch();

    
  $title = $row['Title'];
  $minicontent = $row['Minicontent'];
  $content = $row['Content'];
  $image = $row['Image'];
  $banner = $row['Banner'];
  $date = $row['Date'];

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
    

<section class="blog-post-section">
<div class="alt-footer-admin">
<span class="go-back"> <a href="index.php">  <i class="fas fa-arrow-left"></i></a> </span>    Admin 
</div>
   






    <div class="banner-blog-top">
dd
    </div>
   <section>
 
     <div class="view-blog-admin">
     <h2>  <?php echo $title ?></h2>
     <div class="image-blog-view">
        <img src="../images/<?php echo $image ?>" alt="">
    </div>

    
       <div>
  <?php echo $content ?>
       </div>

<h4>By Admin On   <?php echo $date ?></h4>
   </div>
  
   </section>
   <section class="blog-post-section">
<div class="alt-footer-admin">
<span class="go-back"> <a href="index.php">  <i class="fas fa-arrow-left"></i></a> </span>    Admin 
</div>
   
  </body>
</html>
    