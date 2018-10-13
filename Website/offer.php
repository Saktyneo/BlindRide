<!DOCTYPE html>
<html lang="en">
<?php 
	if(isset($_POST['offerride'])){
		$from = $_POST['from'];
		$to = $_POST['to'];
		
		$errormessage = "Please correct the below errors before proceeding<br/>";
		$flag=true;
		if($from=='0'){
			$errormessage = $errormessage. "<br/>Please select a value from FROM field";
			$flag=false;
		}		
		if($to=='0'){
			$errormessage = $errormessage. "<br/>Please select a value from TO field";
			$flag=false;
		}
		
		if(($from!='0') and $from==$to){
			$errormessage = $errormessage. "<br/>FROM and TO fields cannot be same";
			$flag=false;
		}
		
		if($flag){
			unset($errormessage);
			}
	}
?>
<head>
    <meta charset="UTF-8">
    <title>Blind Ride - Find a Ride</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    
   <?php include '/scripts.php' ?>
</head>
<body class="landing">

    <!-- Header -->
    <?php include '/header.php' ?>
	
	<?php 
	if(!isset($_SESSION['emailid'])){
		$_SESSION['navigateTo']="/blindride/offer.php#";
		header("Location: /blindride/#signin");
	}
	require_once('config.php');
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
	if(!$conn) {
		die('Failed to connect to server: ' . mysqli_error());
	}
	
	
	$qry="SELECT * FROM AREA WHERE CITY='PUNE' ORDER BY AREA, SUBAREA;";
	$result=mysqli_query($conn,$qry);
	$result1=mysqli_query($conn,$qry);
	mysqli_close($conn);
	
	?>
	
    <!-- One -->
    <section id="plan" class="wrapper style3 special">
        <div class="container">
            <header class="major">
                <h2>Offer a Ride</h2>
				<?php if(isset($errormessage)){ ?> 
					<div class="error"><?php if(isset($errormessage))echo $errormessage;?></div>
				<?php }?>
            </header>
        </div>
        <div class="container 50%">
            <form action="#" method="post">
                <div class="row uniform">
					<div class="6u$ 12u$(small)">
						<div class="select-wrapper">
							<input type = "text" value="Pune" disabled/>
						</div>
					</div>
					
					<div class="12u$">
						<div class="select-wrapper">
							<select name="from">
								<option value="0">- From -</option>
								<?php 
									while($row = mysqli_fetch_assoc($result)) {
										if($row['SUBAREA']!=''){
											echo "<option value='".$row['ID']."'";
											if(isset($from)){
												if($from==$row['ID'])
												   echo "selected";
											}
											echo ">".$row['AREA'] . " - " . $row['SUBAREA']."<br></option>";
											}
										else{
											echo "<option value='".$row['ID']."'";
											if(isset($from)){
												if($from==$row['ID'])
												   echo "selected";
											}
											echo ">".$row['AREA']."<br></option>";
											}
									}
								?>
							</select>
						</div>
					</div>
					<div class="12u$">
						<div class="select-wrapper">
							<select name="to">
								<option value="0">- To -</option>
								<?php 									
									while($row = mysqli_fetch_assoc($result1)) {
										if($row['SUBAREA']!=''){
											echo "<option value='".$row['ID']."'";
											if(isset($to)){
												if($to==$row['ID'])
												   echo "selected";
											}
											echo ">".$row['AREA'] . " - " . $row['SUBAREA']."<br></option>";
											}
										else{
											echo "<option value='".$row['ID']."'";
											if(isset($to)){
												if($to==$row['ID'])
												   echo "selected";
											}
											echo ">".$row['AREA']."<br></option>";
											}
									}
								?>
							</select>
						</div>
					</div>
                    <div class="12u$">
                        <ul class="actions">
                            <li><input value="Offer a Ride" name="offerride" class="special big" type="submit"></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Two -->
    <section id="rides" class="wrapper style2 special">
        <div class="container">
            <header class="major">
                <h2>Offering Ride</h2>
            </header>
            <section class="profiles">
                <div class="row">
                    <section class="3u 6u(medium) 12u$(xsmall) profile">
                        <img src="images/riders/safal.gif" alt="" />
                        <h3>Safal</h3>
                        <p>24 yrs | Male <br/> Wakad to Hinjewadi P1</p>
                        <a href="#" class="button small">Pick</a>
                    </section>
                    <section class="3u 6u(medium) 12u$(xsmall) profile">
                        <img src="images/riders/shabbir.gif" alt="" />
                        <h3>Shabbir</h3>
                        <p>24 yrs | Male <br/> Wakad to Hinjewadi P3</p>
                        <a href="#" class="button small">Pick</a>
                    </section>
                    <section class="3u 6u(medium) 12u$(xsmall) profile">
                        <img src="images/riders/himanshu.gif" alt="" />
                        <h3>Himanshu</h3>
                        <p>24 yrs | Male <br/> Wakad to Hinjewadi P1</p>
                        <a href="#" class="button small">Pick</a>
                    </section>
                    <section class="3u 6u(medium) 12u$(xsmall) profile">
                        <img src="images/riders/piyush.gif" alt="" />
                        <h3>Piyush</h3>
                        <p>24 yrs | Male <br/> Wakad to Hinjewadi P3</p>
                        <a href="#" class="button small">Pick</a>
                    </section>
                </div>
                <a href="http://blindride.in/allriders.html">See All...</a>
            </section>           
            
        </div>
    </section>

    <!-- Footer -->
   <?php include '/footer.php' ?>

</body>
</html>
