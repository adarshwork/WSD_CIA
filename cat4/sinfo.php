<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>CHRIST</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script>
        function onlyAlphabets(e, t) 
        {
            try {
                if (window.event) 
                {
                    var charCode = window.event.keyCode;
                }
                else if (e)
                {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }
        function isAgeKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode != 46 && charCode > 31 &&
                (charCode < 48 || charCode > 57)) 
            {
                alert("Please enter a valid Age");
                return false;
            }
            return true;
        }
</script>
</head>
<body style="background-color: blue;">
  <div class="sinfo">
          <h2 style="text-align: center; color: white;">INSERT/UPDATE/DELETE STUDENTS</h3>
          <form method="post" class="register" action="" name="inv" onsubmit="return validate_form();" enctype="multipart/form-data">
            <p>
              <p><label for="reg_sid">Student ID:</label></p>
              <input type="number" class="input-text" name="sid" id="reg_sid" min="1" placeholder="Student ID" required/>
            </p>   
            <p>
              <p><label for="reg_name">Student Name:</label></p>
              <input type="text" class="input-text" name="name" id="reg_name" onkeypress="return onlyAlphabets(event,this);" placeholder="Name of the Student"/>
            </p>          
            <p>
              <p><label for="reg_age">Student Age:</label></p>
              <input type="number" class="input-text" name="age" min="1" minlength="1" maxlength="3" onkeypress="return isAgeKey(event)" id="reg_age" placeholder="Age"/>
            </p>
            <p>
            <p><label for="reg_gender">Gender</label></p>
            <input type="radio" name="gender" value="Male" id="reg_gender"/>Male
            <input type="radio" name="gender" value="Female" id="reg_gender"/>Female
            </p>   
            <p>
              <p><label for="reg_course">Student Course:</label></p>
              <input type="text" class="input-text" name="course" onkeypress="return onlyAlphabets(event,this);" id="reg_course" placeholder="Course"/>
            </p>
            <p>
              <p><label for="reg_inamount">Student Address:</label></p>
              <textarea name="address" class="input-text" style="width: 500px; height: 100px; color: black;" id="reg_address" minlength="10" placeholder="Address"/></textarea>
            </p>             
            <p>
              <button type="submit" name="insert" class="glyphicon" style="background-color: #202020; height: 45px;"><i class="glyphicon glyphicon-plus"></i>INSERT</button>&nbsp;&nbsp;
              <button type="submit" name="update" class="glyphicon" style="background-color: #202020; height: 45px;"><i class="glyphicon glyphicon-floppy-disk"></i>UPDATE</button>&nbsp;&nbsp;
              <button type="submit" name="delete" class="glyphicon" style="background-color: #202020; height: 45px;"><i class="glyphicon glyphicon-trash"></i>DELETE</button>
            </p>         
          </form>
        <form action="#" method="get" style="padding-top: 15px;">
        <input type="text" placeholder="Student ID" name="stsearch_1" style="width: 400px; padding:15px; color: black;" value=""/>
          <button type="submit" name="submit_1" style="width: 50px; height: 50px; background-color: #202020; color: white; cursor: pointer; border: none;" class="glyphicon"><i class="glyphicon glyphicon-search"></i></button>
        </form>
          <h2 style="text-align: center; color: white;">STUDENT INFORMATION</h3>
          <table class="center" style="border-collapse: collapse; margin-left: 0px; text-align:justify; width:1320px;">
            <tr>
              <th>Student ID</th>
              <th>Student Name</th>
              <th>Student Age</th>
               <th>Student Gender</th>             
              <th>Student Course</th>
              <th>Student Address</th>
            </tr>
            <?php
              if(isset($_GET['submit_1']))
              {
                if(isset($_GET['stsearch_1']))
                {
                  $res=mysqli_query($link,"SELECT * from stuinfo where CAST(stu_id as CHAR) LIKE '%".$_GET['stsearch_1']."%'");
                  echo "<h3> Search results for: ".$_GET['stsearch_1']."</h3>";
                  while($row=mysqli_fetch_array($res))
                  {
                      echo "<tr>";
                      echo "<td>"; echo $row["stu_id"];echo "</td>";
                      echo "<td>"; echo $row["stu_name"];echo "</td>";
                      echo "<td>"; echo $row["age"];echo "</td>";
                      echo "<td>"; echo $row["gender"];echo "</td>";
                      echo "<td>"; echo $row["course"];echo "</td>"; 
                      echo "<td>"; echo $row["address"];echo "</td>";                    
                      echo "</tr>";
                  } 
                } 
              }
              else
              {
                $res=mysqli_query($link,"SELECT * from stuinfo");
                while($row=mysqli_fetch_array($res))
                {
                      echo "<tr>";
                      echo "<td>"; echo $row["stu_id"];echo "</td>";
                      echo "<td>"; echo $row["stu_name"];echo "</td>";
                      echo "<td>"; echo $row["age"];echo "</td>";
                      echo "<td>"; echo $row["gender"];echo "</td>";
                      echo "<td>"; echo $row["course"];echo "</td>"; 
                      echo "<td>"; echo $row["address"];echo "</td>";                    
                      echo "</tr>";
                }            
              }
            ?>
          </table>
           <h2 style="text-align: center; color: white;">STUDENT ID and NAME whose COURSE is MCA</h3>       
          <table class="center" style="border-collapse: collapse; margin-left: 0px; text-align:justify; width:1320px;">
            <tr>
              <th>Student ID</th>
              <th>Student Name</th>
            </tr>
            <?php
                $sql = "SELECT stu_id, stu_name from stuinfo where course='MCA'";
                $result = mysqli_query($link, $sql);

                if (mysqli_num_rows($result) > 0) 
                {
                  while($row = mysqli_fetch_assoc($result))
                  {
                    echo "<tr>";
                    echo "<td>"; echo $row["stu_id"];echo "</td>";
                    echo "<td>"; echo $row["stu_name"];echo "</td>";
                    echo "</tr>";
                  }
                } 
                else 
                {
                    echo "<tr>";
                    echo "<td>No Results</td>";;
                    echo "</tr>";
                }                        
            ?>
          </table>
    </div>
</body>
<?php
if(isset($_POST["insert"]))
{
mysqli_query($link,"INSERT into stuinfo values('$_POST[sid]','$_POST[name]','$_POST[age]','$_POST[gender]','$_POST[course]','$_POST[address]')");
?>
<script type="text/javascript">
  window.location.href= window.location.href;
</script>
<?php
}
if(isset($_POST["update"]))
{
mysqli_query($link,"UPDATE stuinfo set stu_name='$_POST[name]', age='$_POST[age]', gender='$_POST[gender]', course='$_POST[course]', address='$_POST[address]' where stu_id='$_POST[sid]'");
?>
<script type="text/javascript">
  window.location.href= window.location.href;
</script>
<?php
}
if(isset($_POST["delete"]))
{
mysqli_query($link,"DELETE from stuinfo where stu_id='$_POST[sid]'");
?>
<script type="text/javascript">
  window.location.href= window.location.href;
</script>
<?php
}
?>
</html>