
<!DOCTYPE html>
<html>
<head>

	<title>Translation</title>
	<style >
		body{
			background-repeat: no-repeat;
		}
	
		th{ background-color: grey;
			font-family:verdana;
			color:pink;
	
		}	


p{
	color: black;
	font-family: verdana;
	 font-size: 25px;
}
a{
    text-decoration: none;
    color: black;
    font-size: 15px;
    }
	</style>
	<link rel="shortcut icon"  href="icon.jfif">
</head>
<body background="mau.jfif" background-repeat: no-repeat>
	
<table width="10%" cellspacing="20" >
<tr>
    <td><a href="index.php">Home</a></td></tr>
     <tr> <td><a href="new.php">Insert </a> </td>
  </tr>
  </table>
	<p >TRANSLATION PAGE</p>
	 
		<form method="post">
			
       
 
		<table  width="50%" cellspacing="20" >
				<tr ><td colspan="2"><h1 style=" font-family:algerian;color: grey; text-align: center;"> </h1></tr>
	<tr>			
	<td>Translating :</td>
	<td><!-- <select name="status" id="status" onchange="sayIt()">
				<option name="gura">kugura</option>
				<option name="tuma">V_Rangura</option>
				<option name="rangura">V_Gurisha</option>
				<option name="Gurisha">V_Tuma</option>
				
			</select> -->
			 <select name="word" id="val">
    <option value="0">your word</option>
    <?php
        include "conn.php";  // Using database connection file here
        $records = mysqli_query($db, "SELECT * From indimi");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['id'] ."'>" .$data['variable'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
			</td>
			
			<tr></tr>
			<td>
				<select name="status">
			    <option value="0">translation language</option>
				<option value="1">Kinyarwanda</option>
				<option value="2">French</option>
				<option value="3">English</option>
				<option value="4">Swahili</option>
				
			</select></td>
			<td>
                  <button name="translate" style="color: black;border-color: white;border-style:dashed;padding: 12px;background-color: light;">Translate</button>
                   </td>
     </tr>
     <tr>
		 <?php 
		 $result=[];
		 if(isset($_POST['translate']))
		 {	
			$result[0] = " ";
			 $language = $_POST['status'];
			 $word = $_POST['word'];
			 if(($language == 0) || ($word == 0))
			 {
				 $result[0] = "choose valid data";

			 }
			 else {
				 
				$query_select_indimi= mysqli_query($db, "SELECT * FROM indimi where id='$word'");
				if(mysqli_num_rows($query_select_indimi) > 0)
				{
					$result[0] = "one element found";

					$data_re = $query_select_indimi->fetch_array();

			if($language == 1)
			{
				$result[0] = $data_re['kinyarwanda'];
			}
			else if ($language == 2)
			{
				$result[0] = $data_re['french'];
			}	else if ($language == 3)
			{
				$result[0] = $data_re['english'];
			}	else if ($language == 4)
			{
				$result[0] = $data_re['swahili'];
			}
			else{
				$result[0]="not find";
			}
				}
				else{
					$result[0] = "not found";
				}

			 }

			
	
				
			

		
?> 
  <td> Response:</td><td><label></label><?php echo $result[0];?></td><?php
		 }

		 
		 ?>
   
    
     </tr>

          
                   
</table>
<!-- <label name="selected" id="selected">hjjfj</label>
 <script>
 function sayIt(){
	const variable=document.getElementById("status").value;
	document.getElementsByName("selected").value=variable;
	return variable;
}

// </script>-->

</body>
</html>			


