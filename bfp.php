<html>
<?php
         $page_title = 'BFP Calculator';
         include ('./includes/header.html');
?>

<body>
	<form action = "bfp.php" method = "post">

     <br><br>
	 <fieldset><legend>Enter all the information below: </legend>
		<p><b>Name	      : </b> <input type="text" name="name" size="20" maxlength="40" value="<?php if (isset($_POST['name'])) echo $_POST ['name']; ?>" /></p>
		<p><b>Age	 	  : </b> <input type="text" name="age" size="20" maxlength="40" value="<?php if (isset($_POST['age'])) echo $_POST ['age']; ?>" /></p>
		<p><b>Weight (kg) : </b> <input type="text" name="weight" size="20" maxlength="40" value="<?php if (isset($_POST['weight'])) echo $_POST ['weight']; ?>" />	</p>
		<p><b>Height (m)  : </b> <input type="text" name="height" size="20" maxlength="40" value="<?php if (isset($_POST['height'])) echo $_POST ['height']; ?>" />	</p>
		<p><b>Gender  	  : </b> <input type="text" name="gender" size="20" maxlength="40" value="<?php if (isset($_POST['gender'])) echo $_POST ['gender']; ?>" />   e.g., Female or Male</p>
		
		</p></fieldset>
		<br><br>
		<div align = "left">
		<input type="submit" style="font-size:15px; width:150px; margin: 0 auto;" name="submit" value="Calculate" />
	    </div>
			
		</form>
</body>
</html>

<?php
if ($_SERVER ['REQUEST_METHOD'] == 'POST'){
	
	// Validate name
	if (!empty($_POST['name'])) {
		$name = $_POST['name'];
	} else {
		$name = NULL;
		echo '<p><b>PLEASE ENTER YOUR NAME !!</b></p>';
	}

    // Validate age
	if (!empty($_POST['age'])) {
		$age = $_POST['age'];
	} else {
		$age = NULL;
		echo '<p><b>PLEASE ENTER YOUR AGE !</b></p>';
	}

    // Validate weight
	if (!empty($_POST['weight'])) {
		$weight = $_POST['weight'];
	} else {
		$weight = NULL;
		echo '<p><b>PLEASE ENTER YOUR WEIGHT !</b></p>';
	}

    // Validate height
	if (!empty($_POST['height'])) {
		$height = $_POST['height'];
	} else {
		$height = NULL;
		echo'<p><b>PLEASE ENTER YOUR HEIGHT !</b></p>';
	}

    // Validate gender
	if (!empty($_POST['gender'])) {
		$gender = $_POST['gender'];
	} else {
		$gender = NULL;
		echo '<p><b>PLEASE ENTER YOUR GENDER !</b></p>';
	}

    // To categorize the BFP category 
	if($name && $age && $weight && $height && $gender) {

		// To calculate BMI
		$bmi = 0;
		$bmi = ($weight) / ($height * $height);

        if( $gender == "m"||$gender =="M"||$gender =="male"||$gender =="Male"||$gender =="MALE"){
			$gender_out = "Male";
			$bfp = 0;
			$bfp = (1.20 * $bmi) + ((0.23 * $age) - 16.2);

            if ($age>=20 && $age<=40){
				if( $bfp <= 8){
					$category = "Under fat";
				}
				else if($bfp>=8 && $bfp <=19){
					$category = "Healthy";	
				}
				else if($bfp>=19 && $bfp<=25){
					$category = "Overweight";
				}
				else if ($bfp>=25){
					$category = "Obese";
				}
				else {
					$category = "Invalid";
				}	
			}
			else if($age>=41 && $age<=60){
				if( $bfp <= 11){
					$category = "Under fat";
				}
				else if($bfp>=11 && $bfp <=22){
					$category = "Healthy";
				}
				else if($bfp>=22 && $bfp<=27){
					$category = "Overweight";
				}
				else if ($bfp>=27){
					$category = "Obese";
				}
				else {
					$category = "Invalid";
				}	
			}
			else if($age>=61 && $age<=79)
			{
				if( $bfp <= 13){
					$category = "Under fat";
				}
				else if($bfp>=13 && $bfp <=25){
					$category = "Healthy";
				}
				else if($bfp>=25 && $bfp<=30){
					$category = "Overweight";
				}
				else if ($bfp>=30){
					$category = "Obese";
				}
				else {
					$category = "Invalid";
				}	
			} 
		} 
		else if( $gender == "f"||$gender =="F"||$gender =="female"||$gender =="Female"||$gender =="FEMALE"){
            $gender_out = "Female";
            $bfp =0;
            $bfp = (1.2 * $bmi) + ((0.23 * $age) - 5.4);

            if ($age>=20 && $age<=40){
				if( $bfp <= 21){
					$category = "Under fat";
				}
				else if($bfp>=21 && $bfp <=33){
					$category = "Healthy";
				}
				else if($bfp>=33 && $bfp<=39){
					$category = "Overweight";
				}
				else if ($bfp>=39){
					$category = "Obese";
				}
				else {
					$category = "Invalid";
				}	
			}
			else if($age>=41 && $age<=60){
				if( $bfp <= 23){
					$category = "Under fat";
				}
				else if($bfp>=23 && $bfp <=35){
					$category = "Healthy";
				}
				else if($bfp>=35 && $bfp<=40){
					$category = "Overweight";
				}
				else if ($bfp>=40){
					$category = "Obese";
				}
				else {
					$category = "Invalid";
				}	
			}
			else if($age>=61 && $age<=79)
			{
				if( $bfp <= 24){
					$category = "Under fat";
				}
				else if($bfp>=24 && $bfp <=35){
					$category = "Healthy";
				}
				else if($bfp>=35 && $bfp<=42){
					$category = "Overweight";
				}
				else if ($bfp>=42){
					$category = "Obese";
				}
				else {
					$category = "Invalid";
				}	
			} 
		}
		else {
			echo"<p><b> INVALID INPUT. PLEASE PUT A CORRECT INPUT! </b></p>";
		}
	
if($name && $age && $weight && $height && $gender && $bmi && $bfp && $category){

        $bmi=round($bmi,2);
        $bfp=round($bfp,2);
        echo '<p><h2>BODY FAT PERCENTAGE(BFP) RESULT</h2> </p>';
        echo"<br>Below are the details:<br/>
            <br /><b>Name			: </b>$name
            <br /><b>Age			: </b>$age
            <br /><b>Weight	(kg)	: </b>$weight
            <br /><b>Height	(m)		: </b>$height
            <br /><b>Gender			: </b>$gender
            <br /><b>BMI			: </b>$bmi
            <br /><b>BFP			: </b>$bfp
            <br /><b>BFP Category   : </b>$category";
    }
else{
        echo'<font color="red">THERE ARE SOME ERROR ON YOUR DETAILS. PLEASE REFILL YOUR FORM!</font>';
    }

}else{
	echo'<font color="red">THERE ARE SOME ERROR ON YOUR DETAILS. PLEASE REFILL YOUR FORM!</font>';
}  
}    
    ?>

    <?php
    include ('./includes/footer.html');
    ?>