<!DOCTYPE html>
<html lang="en">
  <?php
    session_start();
    function succ()
    {
        ?>
        <script>
          document.getElementById("cor1").innerHTML="Password Changed Succesfully!";
        </script>
        <?php   
    }
    function succ1()
    {
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=student.php\">";
    }
    if(!isset($_SESSION['student']))
    {
      header("refresh:0,url=index.php");
    }
    else
    {  
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
          <h3 class="page-header"><i class="fa fa-gear"></i> Password</h3>
          
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
                                              <h1> Change Password</h1>
                                              <center><p id="incor1" class="error"></p>
                                              <p id="cor1" style="color:green"></p></center>
                                              <form class="form-horizontal" enctype="multipart/form-data" role="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">                                                  
                                                  <div class="form-group">
                                                      <label class="col-lg-3 control-label">Current Password</label>
                                                      <div class="col-lg-6">
                                                          <input type="password" required class="form-control" id="name" name="curpass" >
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-3 control-label">New Password</label>
                                                      <div class="col-lg-6">
                                                          <input type="password" required class="form-control" id="name" minlength=6 name="pass" >
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-3 control-label">Re-Type New Password</label>
                                                      <div class="col-lg-6">
                                                          <input type="password" required class="form-control" id="name" minlength=6 name="repass" >
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
                                                      ?>
                                                      <script>
                                                          var msg="";
                                                      </script>
                                                      <?php
                                                      $f=1;
                                                      if(isset($_POST['curpass']))
                                                          $curpass=mysql_real_escape_string($_POST['curpass']);
                                                      else
                                                      {
                                                          $f=0;
                                                          ?>
                                                          <script>
                                                            var msg="Password cannot be empty!!";
                                                          </script>
                                                          <?php
                                                      }
                                                      if(isset($_POST['pass']))
                                                          $pass=mysql_real_escape_string($_POST['pass']);
                                                      else
                                                      {
                                                          $f=0;
                                                          ?>
                                                          <script>
                                                            var msg="New Password cannot be empty!!";
                                                          </script>
                                                          <?php
                                                      }
                                                      if(isset($_POST['repass']))
                                                          $repass=mysql_real_escape_string($_POST['repass']);
                                                      else
                                                      {
                                                          $f=0;
                                                          ?>
                                                          <script>
                                                            var msg="Re-Type New Password cannot be empty!!";
                                                          </script>
                                                          <?php
                                                      }
                                                      if($f!=0)
                                                      {
                                                          if(strlen($pass)<6)
                                                          {
                                                              $f=0;
                                                              ?>
                                                              <script>
                                                                var msg="New Password should be more than 6 characters!!";
                                                              </script>
                                                              <?php
                                                          }
                                                          else if($pass!=$repass)
                                                          {
                                                              $f=0;
                                                              ?>
                                                              <script>
                                                                var msg="New Password and Re-type New Password should be the same!!";
                                                              </script>
                                                              <?php
                                                          }
                                                          else
                                                          {
                                                            require_once("db.php");
                                                            $query3="SELECT * FROM users where regno='$regno';";
                                                            $result3=mysqli_query($stat,$query3);
                                                            if($r=mysqli_fetch_array($result3))
                                                            {
                                                                if(crypt($curpass,$r['password'])!=$r['password'])
                                                                {
                                                                    $f=0;
                                                                    ?>
                                                                    <script>
                                                                      var msg="Current Password Incorrect!!";
                                                                    </script>
                                                                    <?php
                                                                }
                                                                else
                                                                {
                                                                    $blowfish_salt=bin2hex(openssl_random_pseudo_bytes(22));
                                                                    $hash=crypt($pass,"$2a$12$".$blowfish_salt);
                                                                    $query3="UPDATE users SET password='$hash' where regno=$regno;";
                                                                    $result3=mysqli_query($stat,$query3);
                                                                    succ();
                                                                }
                                                            }
                                                          }
                                                      }?>
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
