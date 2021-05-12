
        
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

 <section>
   <div class="admin-tables">
    <h3 style="margin-left:50px"> All Posts <a href="post.php"> <button class="add-post-top-btn">Add Post <i class="fas fa-plus-circle"></i></button></a> </h3>
         
<br>
         

<?php 

require("../connectdb.php");




$select = $conn->query("SELECT * FROM blog_posts");
while($row = $select->fetch()){
  $id = $row['id'];
  $title = $row['Title'];
  $minicontent = $row['Minicontent'];
  $content = $row['Content'];
  $image = $row['Image'];
  $banner = $row['Banner'];
  $date = $row['Date'];
  

   ?>
   
   <div class="blog-row">
          <table>
            <tr>
              <td width="10%"> Post no: 1 <br><?php echo $date  ?> </td>
              <td width="40%"><?php echo  $title ?></td>
              <td width="10%"> <a href="view.php?id=<?php echo $id  ?>"> <span><i class="fas fa-eye"></i> </span>  View </a> </td>
              <td width="10%"> <a href="modify.php?id=<?php echo $id  ?>">  <span> <i class="fas fa-pen"></i> </span> Modify </a></td>
              <td width="20%"><a href=""> <span>  <i class="fas fa-signal"></i></span> Active</a> / <a href=""> Desactive</a></td>
              <td width="10%"> <a href="delete.php?id=<?php echo $id  ?>"> <span> <i class="fas fa-trash"></i> </span> Delete</a></td>
            </tr>
          </table>
          </div>
        
   
   
   
   <?php

}

?>
         

        
   </div>



 </section>




























  </body>
</html>
    