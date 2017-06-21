<!DOCTYPE html>
<html lang="en">
  <?php
    session_start();
    function succ()
    {
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=studprofile.php\">";
    }
    if(!isset($_SESSION['student']))
    {
      header("refresh:0,url=index.php");
    }
    else
    {  
        ini_set('max_execution_time', 3000);
        $regno=$_SESSION['student'];
        require_once('db.php');
        $q="SELECT * FROM users where regno='$regno'";
        $r=mysqli_query($stat,$q);
        if($row=mysqli_fetch_array($r))
        {
            $img=(($regno%100)+37).md5($regno).($regno-118000000).'.jpg';
            $fil='img/student/'.$img;
            if($row['imghide']==false&&$row['imgchoose']==false&&file_exists($fil))
                $img=(($regno%100)+37).md5($regno).($regno-118000000).'.jpg';
            else if($row['imghide']==true||($row['imgchoose']==true&&$row['image']=="")||(!file_exists($fil)))
                $img="default.jpeg";
            else if($row['imgchoose']==true)
                $img=$row['image'];
  ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Altien</title>

    <!-- Bootstrap CSS -->    
    
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    <!-- Custom styles -->
    
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body style="background-image: url('assets/img/backgrounds/1.jpg')">
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>
            <!--logo start-->
            <a href="student.php" class="logo"><span class="lite">ALTIEN</span></a>
            <!--logo end-->
            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" style="height:35px;width:35px" src="img/student/<?php echo $img?>">
                            </span>
                            <span class="username"><?php echo $row['name']?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="studprofile.php"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="studeditprofile.php"><i class="fa fa-edit"></i> Edit Profile</a>
                            </li>
                            <li>
                                <a href="studeditpassword.php"><i class="fa fa-cog"></i> Edit Password</a>
                            </li>
                            <li>
                                <a href="logoutstu.php"><i class="fa fa-sign-out"></i> Log Out</a>
                            </li>
                            
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li>
                      <a class="" href="student.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="studpost.php">
                          <i class="fa fa-envelope"></i>
                          <span>My Posts</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="studimage.php">
                          <i class="fa fa-picture-o"></i>
                          <span>Images</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="studfiles.php">
                          <i class="fa fa-folder"></i>
                          <span>Files</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="studclassmates.php">
                          <i class="fa fa-group"></i>
                          <span>Classmates</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="studteachers.php">
                          <i class="fa fa-graduation-cap"></i>
                          <span>Teachers</span>
                      </a>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
              <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-gear"></i> Edit Profile</h3>
          
        </div>
      </div>
          
    <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget">
                          <div class="panel-body" style="">
                            <div id="edit-profile" class="tab-pane">
                                    <section class="">
                                          <div class="panel-body bio-graph-info">
                                              <h1> Profile Info</h1>
                                              <center><p id="incor1" class="error"></p>
                                              <p id="cor1"></p></center>
                                              <form class="form-horizontal" enctype="multipart/form-data" role="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">                                                  
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Nick Name</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" required class="form-control" id="name" name="nickname" value="<?php echo $row['nickname'];?>">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Email</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" required class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
                                                      </div>
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">About Me</label>
                                                      <div class="col-lg-10">
                                                          <textarea name="about" id="" required class="form-control" cols="30" rows="5"><?php echo $row['about']; ?></textarea>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="control-label col-lg-2" for="inputSuccess">Hide my Profile Pic</label>
                                                    <div class="col-lg-1">
                                                      <?php
                                                        if($row['imghide']==true)
                                                        {?>
                                                          <div class="radio">
                                                              <label>
                                                                  <input type="radio" name="hide" value="Yes" checked>
                                                                  <b>Yes</b>
                                                              </label>
                                                          </div>
                                                          <div class="radio">
                                                              <label>
                                                                  <input type="radio" name="hide" value="No">
                                                                  <b>No</b>
                                                              </label>
                                                          </div>
                                                        <?php
                                                      }
                                                      else
                                                        {?>
                                                          <div class="radio">
                                                              <label>
                                                                  <input type="radio" name="hide" value="Yes">
                                                                  <b>Yes</b>
                                                              </label>
                                                          </div>
                                                          <div class="radio">
                                                              <label>
                                                                  <input type="radio" name="hide" value="No" checked>
                                                                  <b>No</b>
                                                              </label>
                                                          </div>
                                                        <?php
                                                      }
                                                      ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-lg-2" for="inputSuccess">Change Profile Pic</label>
                                                    <div class="col-lg-2">
                                                      <?php
                                                        if($row['imgchoose']==false)
                                                        {?>

                                                          <div class="radio">
                                                              <label>
                                                                  <div id="profilepic">
                                                                  <input type="radio" name="change" checked value="Use Default Image">
                                                                  </div>
                                                                  <b>Use Default Image</b>
                                                              </label>
                                                          </div>
                                                          <div class="radio">
                                                              <label>
                                                                  <div id="profilepic1">
                                                                  <input type="radio" id="imgchange" name="change" value="Select Image">
                                                                  </div>
                                                                  <b style="float:left">Select Image</b>
                                                              </label>
                                                          </div>
                                                        <?php
                                                      }
                                                      else
                                                        {?>
                                                          <div class="radio">
                                                              <label>
                                                                  <div id="profilepic">
                                                                  <input type="radio" name="change" value="Use Default Image">
                                                                  </div>
                                                                  <b>Use Default Image</b>
                                                              </label>
                                                          </div>
                                                          <div class="radio">
                                                              <label>
                                                                  <div id="profilepic1">
                                                                  <input type="radio" id="imgchange" name="change" checked value="Select Image">
                                                                  </div>
                                                                  <b style="float:left">Select Image</b>
                                                              </label>
                                                          </div>
                                                        <?php
                                                      }
                                                      ?>
                                                      <div id="selectimg" hidden="true" >
                                                        <input style="width:200%;" class="form-control" type="file" id="img" name="img1" autocomplete="off">
                                                        <br>
                                                        <?php
                                                            if($row['image']!="")
                                                            {
                                                              ?>
                                                                <img style="height:100%;width:100%;border-radius:0px" src="img/student/<?php echo $row['image'];?>">
                                                            <?php
                                                            }
                                                        ?>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-0 col-lg-10">
                                                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                                                        <button type="submit" name="cancel" class="btn btn-danger">Cancel</button>
                                                    </div>
                                                </div>
                                              </form>
                                              <?php
                                                  if(isset($_POST['cancel']))
                                                  {
                                                      succ();
                                                  }
                                                  if(isset($_POST['save']))
                                                  {
                                                      $f=1;
                                                      if(isset($_POST['nickname']))
                                                          $nick=mysql_real_escape_string($_POST['nickname']);
                                                      else
                                                      {
                                                          $f=0;
                                                          ?>
                                                          <script>
                                                            var msg="Nickname cannot be empty!!";
                                                          </script>
                                                          <?php
                                                      }
                                                      if(isset($_POST['email']))
                                                          $email=mysql_real_escape_string($_POST['email']);
                                                      else
                                                      {
                                                        $f=0;
                                                        ?>
                                                        <script>
                                                          var msg="Email cannot be empty!!";
                                                        </script>
                                                        <?php
                                                      }
                                                      if(isset($_POST['about']))
                                                          $about=mysql_real_escape_string($_POST['about']);
                                                      else
                                                      {?>
                                                        <script>
                                                          var msg="About yourself cannot be empty!!";
                                                        </script>
                                                        <?php
                                                      }
                                                      if(isset($_POST['hide'])&&$_POST['hide']=="Yes")
                                                          $imghide=true;
                                                      else
                                                          $imghide=false;
                                                      $file1="";
                                                      if(isset($_POST['change'])&&$_POST['change']=="Select Image"&&(@$_FILES['img1']['name'])!="")
                                                      {
                                                          define('GW_UPLOADPATH','img/student/');
                                                          $name1=$_FILES['img1']['name'];
                                                          $file1=substr($name1,strrpos($name1, '.')+1);
                                                          $target=GW_UPLOADPATH.time().'.'.$file1;
                                                          $name1=time().'.'.$file1; 
                                                          $imgchoose=true;
                                                      }
                                                      else if(isset($_POST['change'])&&$_POST['change']=="Select Image"&&@$_FILES['img1']['name']==""&&$row['image']=="")
                                                      { 
                                                          $f=0;
                                                          ?>
                                                          <script>
                                                          var msg="Image not selected !";
                                                          </script>
                                                          <?php 
                                                      }
                                                      else if(isset($_POST['change'])&&$_POST['change']=="Select Image"&&$row['image']!="")
                                                      {
                                                          $name1=$row['image'];
                                                          $imgchoose=true;   
                                                      }
                                                      else if(isset($_POST['change'])&&$_POST['change']!="Select Image")
                                                      {
                                                          $name1="";
                                                          $imgchoose=false;
                                                          $im=$row['image'];
                                                      }
                                                      if((isset($_POST['change'])&&$_POST['change']=="Select Image")&&(@$_FILES['img1']['name']!="")&&$file1!="jpg"&&$file1!="jpeg"&&$file1!="png"&&$file1!="bmp")
                                                      {
                                                          $f=0;
                                                          ?>
                                                          <script>
                                                              var msg="Incorrect Image format !";
                                                          </script>
                                                          <?php 
                                                      }
                                                      if($f==1)
                                                      {
                                                          require_once("db.php");
                                                          $quer="SELECT * FROM users where nickname='$nick' and regno!='$regno';";
                                                          $resul=mysqli_query($stat,$quer);
                                                          if(mysqli_num_rows($resul)==0)
                                                          {
                                                              if((isset($_POST['change'])&&$_POST['change']=="Select Image")&&(!empty($_FILES['img1']['name']))&&move_uploaded_file($_FILES['img1']['tmp_name'],$target))
                                                              {
                                                                  if($row['image']!=""&&file_exists("img/student/".$row['image']))   
                                                                  {
                                                                      unlink("img/student/".$row['image']);  
                                                                  }
                                                              }
                                                              if(isset($_POST['change'])&&$_POST['change']!="Select Image")
                                                              {
                                                                  if($im!=""&&file_exists("img/student/".$im))
                                                                  {
                                                                      unlink("img/student/".$row['image']);  
                                                                  }
                                                              }
                                                              $query3="UPDATE users SET nickname='$nick',email='$email',about='$about',image='$name1',imghide='$imghide',imgchoose='$imgchoose' where regno=$regno;";
                                                              $result3=mysqli_query($stat,$query3);
                                                              succ();
                                                              
                                                          }
                                                          else
                                                          {
                                                            ?>
                                                                <script>
                                                                  var msg="Nickname not availalble...Choose anoter nickname!!";
                                                                </script>
                                                                <?php
                                                          }
                                                           
                                                      }
                                                      ?>
                                                      <script>
                                                        if(msg!="")
                                                        {
                                                              document.getElementById("incor1").innerHTML="ERROR : "+msg ;
                                                        }
                                                          </script>
                                                          <?php
                                                    }

                                                  
                                              ?>
                                          </div>
                                      </section>
                                  </div>    
                                </div>
                            </div>
                        </div>
              <!-- page start-->
     <!-- project team & activity end -->
       </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/image.js"></script>
    <!-- charts scripts -->
  <script src="js/scripts.js"></script>
        
    
   
<?php
}
}
?>
  

  </body>
</html>
