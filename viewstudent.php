<!DOCTYPE html>
<html lang="en">
	<?php
		session_start();
		if(!isset($_SESSION['student']))
		{
			header("refresh:0,url=index.php");
		}
		else if(isset($_GET['regno'])&&isset($_GET['key'])&&$_GET['key']==md5($_GET['regno']))
    {  
        $reg1=$_GET['regno'];
       	$regno=$_SESSION['student'];
       	require_once('db.php');
       	$q="SELECT * FROM users where regno='$regno'";
       	$r=mysqli_query($stat,$q);
       	$q1="SELECT * FROM users where regno='$reg1'";
        $r1=mysqli_query($stat,$q1);
        
        if($row1=mysqli_fetch_array($r1))
        {
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
            $img1=(($reg1%100)+37).md5($reg1).($reg1-118000000).'.jpg';
            $fil='img/student/'.$img1;
            if($row1['imghide']==false&&$row1['imgchoose']==false&&file_exists($fil))
                $img1=(($reg1%100)+37).md5($reg1).($reg1-118000000).'.jpg';
            else if($row1['imghide']==true||($row1['imgchoose']==true&&$row1['image']=="")||(!file_exists($fil)))
                $img1="default.jpeg";
            else if($row1['imgchoose']==true)
                $img1=$row1['image'];
  ?>
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
          <h3 class="page-header"><i class="icon_profile"></i><?php echo $row1['name']."'s" ?> Profile</h3>
          
        </div>
      </div>
          
		<div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body" style="background:#123;">
                            <div class="col-lg-3 col-sm-2">
                              <h3 style="font-family:Times;"><?php echo $row1['name']; ?></h4>               
                              <div class="follow-ava">
                                  <img style="height:100%;width:100%;" src="img/student/<?php echo $img1?>" alt="">
                              </div>
                              <h4 style="font-family:Times;"><?php echo "Student"?></h6>
                            </div>
                            <div class="col-lg-8 col-sm-2 follow-info" style="margin-left:50px;">
                                 <div style="font-size:18px;">
                                      <h1 style="font-family:Times;">About <?php echo $row1['name']?></h1>
                                                <?php echo $row1['about'];?>
                                      </div>
                                      <div class="">
                                          <h1 style="font-family:Times;">Details</h1>
                                          <div class="row">
                                              <div class="bio-row">
                                                  <p><span><b>Name </b></span>: <?php echo $row1['name'] ?> </p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span><b>Nick Name </b></span>: <?php echo $row1['nickname']; ?></p>
                                              </div>                                              
                                              <div class="bio-row">
                                                  <p><span><b>Register No.</b></span>: <?php echo $row1['regno']; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span><b>Semester </b></span>: <?php echo $row1['sem']; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span><b>Department </b></span>: <?php echo $row1['department']; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span><b>Email </b></span>: <?php echo $row1['email']; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span><b>Section </b></span>: <?php echo $row1['section']; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span><b>Roll No </b></span>:  <?php echo $row1['rollno']; ?></p>
                                              </div>
                                          </div>
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
    
	  <script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
      <!-- jQuery full calendar -->
    
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
  
    
   
<?php
}
}
else
{
    echo "Page Not Found.";
}

}
else
{
    echo "Page Not Found.";
}
?>
  

  </body>
</html>
