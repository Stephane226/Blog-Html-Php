<?php 
 //echo(date("d-m-Y",time()));
    // echo "<script> alert('posted')</script>";
 
   // $image =  $_FILES['image']['name'];
   // $imgSize = $_FILES['image']['size'];
   // $imgTmp = $_FILES['tmp']['tmp_name'];
   // $imgLocation = '../images/';

if(!empty($_POST)){


    function checkInput($data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    
    
    }

    $title = $_POST['title'];
    $minicontent = htmlspecialchars($_POST['minicontent']);
    $content = htmlspecialchars($_POST['content']);
    $bannerTmp = $_FILES['banner']['tmp_name'];
    $banner = checkInput($_FILES['banner']['name']);
    $image =  checkInput($_FILES['image']['name']);
   
   $imgTmp =$_FILES['image']['tmp_name'];
   
    $imgLocation ='../images/'.basename($image);
    $imgLocationbnr ='../images/'.basename($banner);
    $imageExtension     = pathinfo($imgLocation,PATHINFO_EXTENSION);
    $date =  date("d-m-Y",time());





    echo "<script> alert('sum')</script>";
   

    
    if(empty($title) || empty($minicontent) || empty($content) || empty($image) || empty($banner) ){
        echo "<script> alert('Please All Fields Are Required!')</script>";

    }
    else if(!empty($title) && !empty($minicontent) && !empty($content) && !empty($image) && !empty($banner) ){ 
       

        //verify Images
        


        require("../connectdb.php");
        $select = $conn->prepare("INSERT INTO blog_posts(Title, Content, Minicontent, Image, Banner, Date) values(?,?, ?, ?,?,?)");
        $select->execute(array($title,$content,$minicontent,$image, $banner,$date));

 

        move_uploaded_file($imgTmp, $imgLocation);
        move_uploaded_file($bannerTmp, $imgLocationbnr);

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
 

<section class="blog-post-section">
<div class="alt-footer-admin">
<span class="go-back"> <a href="index.php">  <i class="fas fa-arrow-left"></i></a> </span>    Admin 
</div>
   
   <div class="admin-tables">

 <h3>Edit Your Blog</h3>
           <form action="post.php" role="form" method="post" class="blog-post-form" enctype="multipart/form-data">
            <div class="form-blog-post">
               <input type="text" name="title"  class="blog-title blog-posts">
               <input type="file" name="image" id="img" class="blog-file blog-posts">
               <input type="file" name="banner" id="imgBnr"  class="blog-file blog-posts">
               <textarea name="minicontent" id="" class="blog-posts text-area">   </textarea>
               <textarea  name="content" id="" class="blog-posts text-area">   </textarea>
          
               <button type="submit"  class="form-top-btn">Submit</button>
  <br><br>
    </div>
    <div class="image-blog-edit">
        <img src="../images/img3.jpeg" alt="">
    </div>
           </form>
</div>
</section>


<div class="alt-footer-admin">
    Admin By Masaaki.Stephane @2021
</div>

</body>
</html>