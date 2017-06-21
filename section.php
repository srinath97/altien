<?php
require_once("db.php");
if(isset($_GET['dept']))
{?>
    <label class="sr-only" for="form-section">Section</label>
    <select class="form-section form-control" name="section" style="height:50px" required>
    <option disabled selected>Select your section</option>
    <?php
    $dept=trim($_GET['dept']);  
    $query1="SELECT section from users WHERE department='".$dept."' GROUP BY department,section";
    $result1=mysqli_query($stat,$query1);
    while($row=mysqli_fetch_array($result1))
    {
        ?>
        <option><?php echo $row['section'];?></option>
        <?php
    }
    ?>
    </select>  
    <?php
}
?>