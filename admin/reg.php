
<html>
<head>
  <title>
    REGISTER
  </title>
  <style>
    body{
      background-color: #0d484a;
    }
    p{
      color: #a8c995;
      font-weight: 200;
      font-size: 20px;
      text-decoration: solid;
    }
    
  </style>
  <link rel="stylesheet" href="style3.css">
</head>

<body>

				<center><b><h1 style="color: #a8ff95;">
          PRODUCTS
        </center></b></h1>
        <hr>

		<form action="insertdata.php" method="post" autocomplete="off">
      <table>
        
        <tr>
          <td><p>PRODUCT :<br><br></p></td>       
          <td><input type="text"  name="pname" required><br><br></td>
        </tr>
       
       
        <tr>
          <td><p>CATEGORY :<br><br></p></td> 
          <td><select name="category">
            <option value="1"> CLOTHING & APPAREL</option>
	    <option value="2"> COSMETICS </option>  
            <option value="3"> FOOTWEAR & SHOES</option>
            <option value="4"> ELECTRONIC & GADGETS </option>
            <option value="5"> GAMES & TOYS </option>
            <option value="6"> VETERINARY & PET ITEMS </option>
            <option value="7"> STATIONARY </option>
            <option value="8"> TUPPERWARE </option>
            <option value="9"> SPORTS PRODUCTS </option>
            
          </select><br><br></td>
        </tr>
<tr>
          <td><p>PRODUCT COMPANY :<br><br></p></td>
          <td><input type="number"       name="pcompany"    required><br><br></td>
        </tr>
        <tr>
          <td><p>PRODUCT PRICE :<br><br></p></td>
          <td><input type="number"       name="pprice"    required><br><br></td>
        </tr>
        <tr>
          <td><p>PRODUCT AVAILABLE :<br><br></p></td>     
          <td><input type="text"     name="pavailable"     required><br><br></td>
        </tr>
          <tr>
          <td><p>PRODUCT DETAILS:<br><br></p></td>     
          <td><input type="text" id="p_details"     name="productdetails"   maxlength='1000' required><br><br></td>
        </tr>
    <tr>
          <td><p>PRODUCT IMAGE :<br><br></p></td>     
          <td>    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
</td>
        </tr>
</table>
      <center><input type="submit" value="Submit" class="button2"></center>
    </form>
</body>
</html>