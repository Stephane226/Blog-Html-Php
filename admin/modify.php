    
<?php


if(!empty($_POST)){

    $id =  $_GET['id'];
    echo $id;
function checkInput($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;


}

$titleUpdated = $_POST['title'];
//$minicontentUpdated = htmlspecialchars($_POST['minicontent']);
$contentUpdated = htmlspecialchars($_POST['content']);
$bannerTmpUpdated = $_FILES['banner']['tmp_name'];
$bannerUpdated = checkInput($_FILES['banner']['name']);
$imageUpdated =  checkInput($_FILES['image']['name']);

$imgTmpUpdated =$_FILES['image']['tmp_name'];

$imgLocationUpdated ='../images/'.basename($imageUpdated);
$imgLocationbnrUpdated ='../images/'.basename($bannerUpdated);
$imageExtensionUpdated     = pathinfo($imgLocationUpdated,PATHINFO_EXTENSION);
$dateUpdated =  date("d-m-Y",time());





echo "<script> alert('sum')</script>";



if(empty($titleUpdated) || empty($contentUpdated) || empty($imageUpdated) || empty($bannerUpdated) ){
    echo "<script> alert('Please All Fields Are Required!')</script>";

}
else if(!empty($titleUpdated)  && !empty($contentUpdated) && !empty($imageUpdated) && !empty($bannerUpdated) ){ 
   

    //verify Images
    


    require("../connectdb.php");
    $select = $conn->prepare( " UPDATE blog_posts SET Title=?, Content=?,Image=?, Banner=?, Date=?  WHERE id=? ");
    $select->execute(array($titleUpdated,$contentUpdated, $imageUpdated, $bannerUpdated,$dateUpdated,$id));



    move_uploaded_file($imgTmpUpdated, $imgLocationUpdated);
    move_uploaded_file($bannerTmpUpdated, $imgLocationbnrUpdated);

}
 ?><script> alert('Your Modification Has Succesfully Done')</script> <?php
header("location: index.php");


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
   
   <div class="admin-tables">

 <h3>Edit Your Blog</h3>

 <?php

require("../connectdb.php");
if(isset($_GET['id'])){
  $id =  $_GET['id'];

  echo "alert($id)";
$select = $conn->prepare("SELECT * FROM blog_posts WHERE id = ?");
$select->execute(array($id));

$oneRow = $select->fetch();
if($select->rowCount() > 0){



  $title = $oneRow['Title'];
  $minicontent = $oneRow['Minicontent'];
  $content = $oneRow['Content'];
  $image = $oneRow['Image'];
  $banner = $oneRow['Banner'];
  $date = $oneRow['Date'];
  
}
   ?>
              <form  action="<?php echo 'modify.php?id='. $id; ?>" role="form" method="post" class="blog-post-form" enctype="multipart/form-data">



              <div class="form-blog-post">
               <input type="text" name="title"  value="<?php echo  $title ?>" class="blog-title blog-posts">
               <input type="file" name="image"  id="img" class="blog-file blog-posts">
               <input type="file" name="banner" id="imgBnr"  class="blog-file blog-posts">
               <textarea name="content" id="" class="blog-posts text-area"> <?php echo  $content ?>    </textarea>
              
          
               <button type="submit"  class="form-top-btn">Submit</button>
  <br><br>
    </div>
    <div class="image-blog-edit">
        <img src="../images/<?php echo  $image ?>" alt="">
    </div>


           </form>
      
           <?php  
           

        }
       
           ?>
</div>
</section>


<div class="alt-footer-admin">
    Admin By Masaaki.Stephane @2021
</div>

</body>
</html>