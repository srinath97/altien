
<?php
    session_start();
    if(!isset($_SESSION['student']))
    {
      header("refresh:0,url=index.php");
    }
    else
    {
        function succ()
        {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=student.php\">";
        }
        $regno=$_POST['regno'];
        $dept=$_POST['dept'];
        $sec=$_POST['sec'];
        $sem=$_POST['sem'];
        $f=1;
        if($_FILES['file']['size']>50*1024*1024)
        {
            $f=0;
            ?>
            <script>
                alert('Size of file should be less than 50MB');
            </script>
          <?php
        }
        require_once("db.php");
        if(isset($_POST['content']))
            $content=mysqli_real_escape_string($stat,$_POST['content']);
        else
        {
            $f=0;
            ?>
            <script>
              var msg="Post cannot be empty!!";
            </script>
            <?php
        }
        if((@$_FILES['file']['name'])!="")
        {
            define('GW_UPLOADPATH','files/');
            $name1=$file=$_FILES['file']['name'];
            $file1=substr($name1,strrpos($name1, '.')+1);
            $target=GW_UPLOADPATH.time().'.'.$file1;
            $name1=time().'.'.$file1; 
            $imgchoose=true;
            if(($file1=="jpg"||$file1=="jpeg"||$file1=="png"||$file1=="bmp"||$file1=="gif"||$file1=="JPG"||$file1=="JPEG"||$file1=="PNG"||$file1=="BMP"||$file1=="GIF"))
            {
                $image=true;
            }
            else
            {
                $f=0;
                ?>
                <script>
                  var msg="Image is in wrong format!!";
                </script>
                <?php
            }
        }
        else
        {
            $name1="";
            $file="";
            $temp="";
            $image=false;
        }
        if($f==1)
        {
            if(($_FILES['file']['name']!=""&&move_uploaded_file($_FILES['file']['tmp_name'],$target)))
            {}
            date_default_timezone_set('Asia/Kolkata');
            $date=date('Y-m-d H:i:s');
            require_once("db.php");
            $quer="INSERT INTO `posts`(`id`, `regno`, `content`, `date`, `image`, `file`, `temp`, `dept`, `section`, `sem`) VALUES (NULL,'$regno','$content','$date','$image','$file','$name1','$dept','$sec','$sem')";
            $resul=mysqli_query($stat,$quer);
            succ();
        }
        ?>
        <script>
          if(msg!="")
          {
                alert(msg);
          }
        </script>
            <?php
      }
?>  