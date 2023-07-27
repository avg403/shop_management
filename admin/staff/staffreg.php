<?php 
require 'connection.php';
if (isset($_POST["register"])) {


  $sql="SELECT MAX(STAFF_ID) FROM STAFF_INFO";
  $result=$conn->query($sql);
  $row=mysqli_fetch_array( $result );
  $maxid=$row['MAX(STAFF_ID)'];

  $id=$maxid+1;
  $name = $_POST["fname"];
  $pass=$_POST['passw'];
  $encr=md5($pass);
  $age = $_POST["age"];
  $sex = $_POST["sex"];
  $dob = $_POST["dob"];
  $address = $_POST["addr"];
  $sal=$_POST["sal"];
  $phone = $_POST["phone"];


  $query = $conn->prepare('INSERT INTO STAFF_INFO(STAFF_ID,STAFF_NAME,STAFF_PASSWORD,STAFF_AGE,STAFF_SEX,STAFF_DOB,STAFF_ADDRESS,STAFF_SALARY,STAFF_PHONE)
      VALUES (?,?,?,?,?,?,?,?,?);');

  $query->bind_param('ississsis',$id,$name,$encr,$age,$sex,$dob,$address,$sal,$phone);

  $query->execute();
  mysqli_close($conn);


  echo
  "
  <script>
    alert(' New Staff Successfully Added ');
    document.location.href = 'http://localhost/shop_mgmt/admin/staff/index.php';
  </script>
  ";
}

?>


<html>
<head>
  <title>
    REGISTER
  </title>
  <style>
    body{
      background-color: #87ceeb;
    }
    p{
      color: #000000;
      font-weight: 200;
      font-size: 20px;
      text-decoration: solid;
    }
    
  </style>
</head>

<body>

				<center><b><h1 style="color: #ff0000">
          NEW STAFF
        </center></b></h1>
        <hr>

     <form action=" " method="post" autocomplete="off">
      <table>
        <tr>
          <td><p>NAME:<br><br></p></td>       
          <td><input type="text"    name="fname" required autofocus><br><br></td>
        </tr>
        <tr>
          <td><p>PASSWORD :<br><br></p></td>       
          <td><input type="password"  name="passw"><br><br></td>
        </tr>
        <tr>
          <td><p>AGE :<br><br></p></td>       
          <td><input type="number"  name="age"><br><br></td>
        </tr>
        <tr style="color: #fff;">
          <td><p>GENDER :<br><br></p></td>  
          <td><input type="radio"   name="sex"     value="MALE">     MALE     &emsp;
          <input type="radio"   name="sex"     value="FEMALE">   FEMALE   &emsp;
          <input type="radio"   name="sex"     value="OTHER">    OTHERS   &emsp;
          <br><br></td>
        </tr>
        <tr>
          <td><p>DOB :<br><br></p></td>       
          <td><input type="date"    name="dob"><br><br></td>
        </tr>
        <tr>
          <td><p>ADDRESS :<br><br></p></td>     
          <td><input type="text"     name="addr"     required><br><br></td>
        </tr>
        <tr>
          <td><p>SALARY :<br><br></p></td>     
          <td><input type="number"     name="sal"     required><br><br></td>
        </tr>
        <tr>
          <td><p>MOBILE NO :<br><br></p></td>
          <td><input type="tel"       name="phone"   placeholder="00-0000-0000" maxlength="10" required><br><br></td>
        </tr>
        
      </table>
      
      <center><button type="submit" name="register" class="button2">REGISTER</button></center>
    </form>
</body>
</html>