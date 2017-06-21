<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Altien</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

	<?php
    session_start();
		function succ()
    {
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=student.php\">";
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
              $dept=$row['department'];
              $sec=$row['section'];
              $sem=$row['sem'];
    ?>
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
          <div id="sidebar" class="nav-collapse ">
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
                  <li class="active">
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
					<h3 class="page-header"><i class="fa fa-picture-o"></i> <b>Images</b></h3>
				</div>
			</div>
                <?php
                require_once("db.php");
                $quer1="SELECT * FROM posts WHERE dept='$dept' and sem='$sem' and section='$sec' and image=true ORDER BY id desc";
                $resul1=mysqli_query($stat,$quer1);
                $x=0;
                while($r1=mysqli_fetch_array($resul1))
                {
                    $x=1;
                    ?>
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="col-lg-8" style="background-color:#111;padding:15px;margin-left:15px">
                                <?php
                                $reg=$r1['regno'];
                                $quer2="SELECT * FROM users WHERE regno='$reg'";
                                $resul2=mysqli_query($stat,$quer2);
                                if($r2=mysqli_fetch_array($resul2))
                                {
                                    
                                    $img1=(($reg%100)+37).md5($reg).($reg-118000000).'.jpg';
                                    $fil='img/student/'.$img1;
                                    if($r2['imghide']==false&&$r2['imgchoose']==false&&file_exists($fil))
                                        $img1=(($reg%100)+37).md5($reg).($reg-118000000).'.jpg';
                                    else if($r2['imghide']==true||($r2['imgchoose']==true&&$r2['image']=="")||(!file_exists($fil)))
                                        $img1="default.jpeg";
                                    else if($r2['imgchoose']==true)
                                        $img1=$r2['image'];
                                    $date=new dateTime($r1['date']);
                                    $date=$date->format('d-m-Y H:i:s')

                                    ?>
                                    <div>
                                        <div style="float:left">
                                            <img alt="" style="height:45px;width:45px;border-radius:25px" src="img/student/<?php echo $img1?>">
                                        </div>
                                        <div style="float:left;margin-left:10px">
                                            <b><a href="viewstudent.php?regno=<?php echo $reg;?>&key=<?php echo md5($reg);?>"><?php echo $r2['name']; ?></a></b>
                                        </div>
                                        <div style="float:right;">
                                            <b><?php echo "Posted On: ".$date; ?></b>
                                        </div>
                                        <div >
                                            <br>
                                            <small style="margin-left:10px"><?php echo "(".$r2['nickname'].")"; ?></small>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-lg-offset-0 col-lg-13">
                                            <p style="color:white"><?php echo $r1['content'];?></p>
                                            
                                        </div>
                                    </div>
                                    <?php
                                        if($r1['image']==true)
                                        {
                                            ?>
                                            <a target="_blank" href="files/<?php echo $r1['temp'];?>"><img style="width:100%;height:100%" src="files/<?php echo $r1['temp'];?>" ></a>
                                            <?php
                                        }
                                        else if($r1['file']!="")
                                        {
                                            ?>
                                            Attached File: <a download="<?php echo $r1['file']; ?>" href="files/<?php echo $r1['temp'];?>"><?php echo $r1['file']; ?></a>
                                            <?php
                                        }
                                    ?>

                                <?php
                              }
                              ?>
                            </div>
                        </div>
                    
                  </div>
                  </div>
                  
                <?php
              }
              if($x==0)
              {
                  ?><h2 style="color:black;margin-left:30px"> No Posts Found.</h2>
              <?php
            }?>

          
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
