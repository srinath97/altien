<!DOCTYPE html>
<html lang="en">
	<?php
		session_start();
		if(isset($_SESSION['student']))
		{
			header("refresh:0,url=student.php");
		}
		function succ()
        {
        	echo"
          		<script type='text/javascript'>
                document.getElementById('cor1').innerHTML='Account Registered succesfully ! ' ;
                </script>"
                ;
        }
        require_once('db.php');
       	if(isset($_POST['regno']))
       		$regno=mysqli_real_escape_string($stat,$_POST['regno']);
       	else
       		$regno="";
       	if(isset($_POST['nickname']))
       		$nick=mysqli_real_escape_string($stat,$_POST['nickname']);
       	else
       		$nick="";
       	if(isset($_POST['email']))
       		$email=mysqli_real_escape_string($stat,$_POST['email']);
       	else
       		$email="";
       	if(isset($_POST['about']))
       		$about=mysqli_real_escape_string($stat,$_POST['about']);
       	else
       		$about="";
       	if(isset($_POST['department']))
       		$dept=mysqli_real_escape_string($stat,$_POST['department']);
       	else
       		$dept="";
       	if(isset($_POST['section']))
       		$sec=mysqli_real_escape_string($stat,$_POST['section']);
       	else
       		$sec="";
       $pass=$repass='';
	?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Altien</title>
        <script src="jquery-1.12.0.min.js"></script>
    	<script src="jquery-migrate-1.2.1.min.js"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

    <div id="cssmenu">
    	<h1 style="color:#61FBCA; font-family:Stencil"><strong>ALTIEN</strong></h1>
    </div>
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text" style="color:#fff">
                            <div class="description">
                            	<p><b>
                            	<div class="form-box">
	                        		<div class="form-top">
	                            		<center style="margin:5px;color:cyan">
		                            		This is a login and registration form for students in SASTRA University 3rd year B.Tech. 
		                            		Register and login with your College Register Number and start posting !! 
	                            		</center>
	                            		<center style="margin:5px;color:green;font-size:20px;">
		                            		Stop using group mail. Start using <b style="font-family:Stencil">ALTIEN</b> !!
	                            		</center>
                            		</div>
                            	</div>
                            	</b></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login to our site</h3>
	                            		<p>Enter below details to login:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>	" method="post" class="login-form">
				                    	<center><p id="incor2" class="error"></p></center>
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-username">Register Number</label>
				                        	<input type="number" name="form-username" placeholder="Register Number *" class="form-username form-control" id="form-username" value="<?php echo $regno;?>" required>
				                        </div>
				                        <div class="form-group">
				                        <br>
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="form-password" placeholder="Password *" class="form-password form-control" id="form-password" value="<?php echo $pass;?>" required>
				                        </div>
				                        <br>
				                        <button type="submit" name="signin" class="btn">Sign in ! </button>
				                    </form>
			                    </div>
		                    </div>
							<!--		                
		                	<div class="social-login">
	                        	<h3>...or login with:</h3>
	                        	<div class="social-login-buttons">
		                        	<a class="btn btn-link-2" href="#">
		                        		<i class="fa fa-facebook"></i> Facebook
		                        	</a>
		                        	<a class="btn btn-link-2" href="#">
		                        		<i class="fa fa-twitter"></i> Twitter
		                        	</a>
		                        	<a class="btn btn-link-2" href="#">
		                        		<i class="fa fa-google-plus"></i> Google Plus
		                        	</a>
	                        	</div>
	                        </div>
	                        -->
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sign up now</h3>
	                            		<p>Fill in the form to register your account:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="registration-form">
				                    	<center><p id="incor1" class="error"></p>
				                        <p id="cor1"></p></center>
				                        <div class="form-group">
				                    		<label class="sr-only" for="form-dept">Department</label>
				                        	<select onchange="load()" class="form-dept form-control" name="department" id="element_0" style="height:50px" required>
				                        		<option disabled selected>Select your department</option>
				                        		<?php
				                        			require_once('db.php');
				                        			$query="SELECT * FROM users GROUP BY department;";
				                        			$result=mysqli_query($stat,$query);
				                        			$f=0;
				                        			while($rows=mysqli_fetch_array($result))
				                        			{
				                        				if($rows['department']==$dept)
				                        				{
				                        					?>
				                        					<option selected value="<?php echo $rows['department']; ?>"><?php echo $rows['department']; ?></option>
				                        					<?php
				                        					$f=1;
				                        				}
				                        				else
				                        				{
															?>
				                        					<option value="<?php echo $rows['department']; ?>"><?php echo $rows['department']; ?></option>
				                        					<?php
				                        				}
				                        			}

				                        		?>

				                        	</select>
				                        </div>
				                        <div class="form-group" id="element_1">
				                        <?php
				                        if($f==1)
				                        {
				                        	?>
				                        	
				                        	<label class="sr-only" for="form-section">Section</label>
	      										<select class="form-section form-control" name="section" style="height:50px" required>
	        										<option disabled selected>Select your section</option>
	     											<?php
	        											$query1="SELECT section from users WHERE department='$dept' GROUP BY department,section";
	        											$result1=mysqli_query($stat,$query1);
	        											while($row=mysqli_fetch_array($result1))
		        										{
		        											if($row['section']==$sec)
           													{
           														?>
           														<option selected><?php echo $row['section'];?></option>
		        												<?php
		        											}
		        											else
		        											{
		        												?>
		        												<option><?php echo $row['section'];?></option>
		        												<?php
		        											}
		        										}
	  	 											?>
	  	 										</select>  
	  	 										
	  	 								<?php
				                        }
				                        ?>
				                        </div>
				                        <script>
				                        function load()
										{
											var st=document.getElementById('element_0');
										    var dept=st.options[st.selectedIndex].text;
										    $.get("section.php?dept="+dept,function(data,status)
								            {
								               document.getElementById("element_1").innerHTML=data;
							                });
										}
										</script>
				                    	
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-regno">Register Number</label>
				                        	<input type="number" name="regno" placeholder="Register Number *" class="form-regno form-control" id="form-regno" required value="<?php echo $regno;?>">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-nick-name">Nick name</label>
				                        	<input type="text" name="nickname" placeholder="Nick name *" class="form-nick-name form-control" id="form-nick-name" required value="<?php echo $nick;?>">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" >Email</label>
				                        	<input type="email" name="email" placeholder="Email *" class="form-email form-control"  value="<?php echo $email;?>">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="password" placeholder="Password *" class="form-last-name form-control" id="form-last-name" required minlength="6" value="<?php echo $pass;?>">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-repassword">Re-type Password</label>
				                        	<input type="password" name="repassword" placeholder="Re-type Password *" class="form-last-name form-control" id="form-last-name" minlength="6" required value="<?php echo $repass;?>">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-about-yourself">About yourself</label>
				                        	<textarea name="about" placeholder="About yourself *" 
				                        				class="form-control" id="form-about-yourself"><?php echo $about;?></textarea>
				                        </div>
				                        <button type="submit" name="register" class="btn">Register my Account ! </button>
				                    </form>
			                    </div>
                        	</div>
                        	<?php
	        					if(isset($_POST['register']))
								{
									$f=1;
									if(isset($_POST['section'])&&$_POST['section']!="Select your section")
								    	$sec=mysqli_real_escape_string($stat,$_POST['section']);
								    else
								    {
								    	$f=0;
								    	?>	
								    	<script>
								    		var msg="Section cannot be empty!!";
								    	</script>
								    	<?php
								    }
									if(isset($_POST['department'])&&$_POST['department']!="Select your department")
	    						    	$dept=mysqli_real_escape_string($stat,$_POST['department']);
	    						    else
	    						    {
	    						    	$f=0;
	    						    	?>	
	    						    	<script>
	    						    		var msg="Department cannot be empty!!";
	    						    	</script>
	    						    	<?php
	    						    }
								    if(isset($_POST['regno']))
								    	$regno=mysqli_real_escape_string($stat,$_POST['regno']);
								    else
								    {
								    	$f=0;
								    	?>
								    	<script>
								    		var msg="Regno cannot be empty!!";
								    	</script>
								    	<?php
								    }
								    if(isset($_POST['nickname']))
								    	$nick=mysqli_real_escape_string($stat,$_POST['nickname']);
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
								    	$email=mysqli_real_escape_string($stat,$_POST['email']);
								    else
								    {
								    	$f=0;
								    	?>
								    	<script>
								    		var msg="Email cannot be empty!!";
								    	</script>
								    	<?php
								    }
								    if(isset($_POST['password']))
								    	$pass=mysqli_real_escape_string($stat,$_POST['password']);
								    else
								    {
								    	$f=0;
								    	?>
								    	<script>
								    		var msg="Password cannot be empty!!";
								    	</script>
								    	<?php
								    }
								    if(isset($_POST['repassword']))
								    {
								    	$repass=mysqli_real_escape_string($stat,$_POST['repassword']);
								    	if(strlen($pass)<6)
		                        		{
		                        			$f=0;
		                        			?>
		                        			<script>
		                        				var msg="Password cannot be less than 6 letters...";
		                        			</script>
		                        			<?php
		                        		}
		                        		if($pass!=$repass)
		                        		{
		                        			
		                        			$f=0;
		                        			?>
		                        			<script>
		                        				var msg="Password and Re-type password should be the same!";
		                        			</script>
		                        			<?php
		                        		}
								    }
								    else
								    {
								    	$f=0;
								    	?>
								    	<script>
								    		var msg="Re-type password cannot be empty!!";
								    	</script>
								    	<?php
								    }
								    if(isset($_POST['about']))
								    	$about=mysqli_real_escape_string($stat,$_POST['about']);
	                        		else
	                        		{?>
	                        			<script>
	                        				var msg="About yourself cannot be empty!!";
	                        			</script>
	                        			<?php
	                        		}
	                        		
	                        		if($f==1)
									{
										require_once("db.php");
		                        		$query2="SELECT * FROM users where department='$dept' and section='$sec' and regno='$regno';";
						                $result2=mysqli_query($stat,$query2);
						                if(mysqli_num_rows($result2)==0)
						                {
						                	$f=0;
						                	?>
		                        			<script>
		                        				var msg="Register Number does not exist! Contact administrator...";
		                        			</script>
		                        			<?php
						                }
						                if($r=mysqli_fetch_array($result2))
						                {
						                	if($r['nickname']!="")
						                	{
						                		$f=0;
						                		?>
			                        			<script>
			                        				var msg="Account already registered!!";
			                        			</script>
			                        			<?php
						                	}
						                	else
						                	{
						                		$quer="SELECT * FROM users where nickname='$nick';";
								                $resul=mysqli_query($stat,$quer);
								                if(mysqli_num_rows($resul)==0)
								                {
							                		$blowfish_salt=bin2hex(openssl_random_pseudo_bytes(22));
	                                				$hash=crypt($pass,"$2a$12$".$blowfish_salt);
	                                				$query3="UPDATE users SET nickname='$nick',email='$email',password='$hash',about='$about' where regno=$regno;";
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
								if(isset($_POST['signin']))
								{
									$f=1;
									if(isset($_POST['form-username']))
								    	$regno=mysqli_real_escape_string($stat,$_POST['form-username']);
								    else
								    {
								    	$f=0;
								    	?>
								    	<script>
								    		var msg="Regno cannot be empty!!";
								    	</script>
								    	<?php
								    }
								    if(isset($_POST['form-password']))
								    	$pass=mysqli_real_escape_string($stat,$_POST['form-password']);
								    else
								    {
								    	$f=0;
								    	?>
								    	<script>
								    		var msg="Password cannot be empty!!";
								    	</script>
								    	<?php
								    }
								    if($f==1)
									{
										require_once("db.php");
		                        		$query3="SELECT * FROM users where regno='$regno';";
						                $result3=mysqli_query($stat,$query3);
						                if(mysqli_num_rows($result3)==0)
						                {
						                	$f=0;
						                	?>
		                        			<script>
		                        				var msg="Register Number does not exist! Contact administrator...";
		                        			</script>
		                        			<?php
						                }
						                
						                if($r=mysqli_fetch_array($result3))
						                {
						                	if($r['password']=="")
							                {
							                	$f=0;
							                	?>
			                        			<script>
			                        				var msg="Account not registered yet!! Please register to continue..";
			                        			</script>
			                        			<?php
							                }
						                	else if(crypt($pass,$r['password'])==$r['password'])
									        { 
												$_SESSION['student']=$r['regno'];
												echo "<meta http-equiv=\"refresh\" content=\"0;URL=student.php\">";
									      	}
									      	else
									      	{
									      		?>
			                        			<script>
			                        				var msg="Password is incorrect !! ";
			                        			</script>
			                        			<?php
									      	}
									    }
									}
						            ?>
						            <script>
						            	if(msg!="")
						            	{
						                    document.getElementById("incor2").innerHTML="ERROR : "+msg ;
						            	}
						            	
				                    </script>
				                    <?php
								}					                        			
                        	?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        			<div class="footer-border"></div>
        				<p><b>Made by Sameer and Srinath.</b></p>
        			</div>
        			
        		</div>
        	</div>
        </footer>
        <!-- Javascript -->
        
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
    </body>
</html>