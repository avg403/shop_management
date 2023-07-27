<html>
<head>
    <title>
        UPDATING
    </title>
</head>
<style>
    body{
      background-color: black;
    }
    p{
      color: aqua;
      font-weight: 200;
      font-size: 20px;
      text-decoration: solid;
    }
    h1{color: lime;
      font-weight: 1000;
      font-size: 35px;
      text-decoration: solid;
      text-align: center;
    }

    h3{
      color: #a8c995;
      font-weight: 500;
      font-size: 16px;
    }
    h4
    {color: #e2597e;
      font-weight: 5px;
      font-size: 12px;
    text-decoration: wavy;}
  </style>
<body  >
    <h1><u>UPDATE STAFF</u></h1>
    <br>
    <h3>
    [PLEASE FILL ALL THE COLUMNS AND CHECK YOU HAVE FILLED NAME,GENDER AND MOBILE NO AGAIN]<br>
  </h3>
    <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SHOP";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//STORING CURRENT VALUES TO VARIABLE 

$staff_id2= $_GET["id2"];

$sql="SELECT*FROM STAFF_INFO where STAFF_ID=$staff_id2";
$result= $conn->query($sql);

if($result->num_rows>0) {
        while($row = $result->fetch_assoc()) {
            $name1 = $row["STAFF_NAME"];
            $pass1=$row["STAFF_PASSWORD"];
            $age1= $row["STAFF_AGE"];
            $sex1= $row["STAFF_SEX"];
            $dob1= $row["STAFF_DOB"];
            $address1= $row["STAFF_ADDRESS"];
            $sal1=$row["STAFF_SALARY"];
            $phone1= $row["STAFF_PHONE"];
        }
    } else {
        echo "0 result";
    }
    echo"</table>";
    ?>

    <!--DISPLAYING CURRENT DATA IN FROM-->

    <form action="updconfir.php" method="post" autocomplete="off">
      <table>
      <tr>
          <td><p>STAFF ID:<br><br></p></td>
          <td><input type="text"    name="staffid3" value=<?php echo $staff_id2 ?>  readonly="readonly"> <br><br></td>
        </tr>
        <tr>
          <td ><p>NAME: &emsp;&emsp;&emsp; <br><br> </p></td>       
          <td><input type="text"    name="fname3" value="<?php echo htmlspecialchars($name1) ?>" ></input> <br><br></td>
        </tr>
        <tr>
          <td ><p>PASSWORD: &emsp;&emsp;&emsp; <br><br> </p></td>       
          <td><input type="password"    name="passw3" value="<?php echo htmlspecialchars($pass1) ?>" ></input> <br><br></td>
        </tr>
        <tr>
          <td><p>AGE :<br><br></p></td>       
          <td><input type="number"  name="age3" value=<?php echo $age1 ?> ><br><br></td>
        </tr>
        <tr>
          <td><p>GENDER:   <br><br></p></td> 
          <td style="color: #ffff;">
          <?php
          if($sex1=="MALE")
          {?>
          
          <input type="radio"   name="sex3"     value="MALE" checked="checked">     MALE     &emsp;
          <input type="radio"   name="sex3"     value="FEMALE">   FEMALE   &emsp;
          <input type="radio"   name="sex3"     value="OTHER">    OTHERS   &emsp;
          <?php } 

          else if($sex1=="FEMALE")
          {?>
          
          <input type="radio"   name="sex3"     value="MALE" >     MALE     &emsp;
          <input type="radio"   name="sex3"     value="FEMALE"   checked="checked">   FEMALE   &emsp;
          <input type="radio"   name="sex3"     value="OTHER">    OTHERS   &emsp;
          <?php } 
          else
          {?>
          
          <input type="radio"   name="sex3"     value="MALE" >     MALE     &emsp;
          <input type="radio"   name="sex3"     value="FEMALE">   FEMALE   &emsp;
          <input type="radio"   name="sex3"     value="OTHER"   checked="checked">    OTHERS   &emsp;
          <?php } ?> 




          <br><br></td>
        </tr>
        <tr>
          <td><p>DOB :<br><br></p></td>       
          <td><input type="date"    name="dob3" value=<?php echo $dob1 ?> ><br><br></td>
        </tr>
        <tr>
          <td ><p>ADDRESS: &emsp;&emsp;&emsp; <br><br> </p></td>       
          <td><input type="text"    name="address3" value="<?php echo htmlspecialchars($address1) ?>" ></input> <br><br></td>
        </tr>
        <tr>
        <td><p>SALARY :<br><br></p></td>     
          <td><input type="number"     name="sal3"   value=<?php echo $sal1 ?>  required><br><br></td>
        </tr>
        <tr>
          <td><p>MOBILE NO :<br><br></p></td>
          <td><input type="tel"       name="phone3"   placeholder="000-0000-000" value=<?php echo $phone1 ?> maxlength="10" required><br><br></td>
        </tr>
      </table>
  
      <center><input type="submit" value="Submit" class="button3"></center>
    </form>
    
           
            
        

</body>
</html>