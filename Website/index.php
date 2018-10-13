<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blind Ride</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    
	<?php include '/scripts.php' ?>
	
	<script>
		$(document).ready(function(){
			$('#form_signin').one('submit', function() {
				$(this).find('input[type="submit"]').attr('style','opacity: 0.5');
			});
			
			$('#form_signup').one('submit', function() {
				$(this).find('input[type="submit"]').attr('style','opacity: 0.5');
			});
	});
		
</script>

</head>
<body class="landing">

    <!-- Header -->
    <?php include '/header.php' ?>
	
	
	<?php 
	if(isset($_POST["login"])){
		require_once('config.php');
		$email=clean($_POST["email"]);
		$password=clean($_POST["password"]);
		unset($_POST["login"]);
		
		$conn= getDatabaseConnection();
		$qry="SELECT * FROM USERS WHERE emailid='".$email."' and password = '".md5($password)."'";
		$result=mysqli_query($conn,$qry);
	
		mysqli_close($conn);
		if($result){
					if(mysqli_num_rows($result)==1){
							$row = mysqli_fetch_assoc($result);
							session_start();
							$_SESSION['emailid']=$row['emailid'];
							$_SESSION['firstname']=$row['firstname'];
							if(isset($_SESSION['navigateTo'])){
								$link = $_SESSION['navigateTo'];
								unset($_SESSION['navigateTo']);
								header("location: ".$link);
							}else{
								header("location: /blindride/#");
							}
						}
					else
						$signinerror = "Incorrect user name or password. Please try again.";
				}
		else
			$signinerror =  "Error occurred during login. Please contact administrator";
		}
		
	if(isset($_POST["signup"])){
		require_once('config.php');
			$firstname=clean($_POST["firstname"]);
			$lastname=clean($_POST["lastname"]);
			$email_signup=clean($_POST["email"]);
			$password=clean($_POST["password"]);
		unset($_POST["signup"]);
		
		$signuperror = "Please correct the below errors before proceeding<br/>";
		$flag =	true;	
			if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
				$signuperror = $signuperror. "<br/>First Name:	Only letters and white space allowed"; 
				$flag=false;
			}
			
			if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
				$signuperror = $signuperror. "<br/>Last Name:	Only letters and white space allowed"; 
				$flag=false;
			}

			if (!filter_var($email_signup, FILTER_VALIDATE_EMAIL)) {
				$signuperror = $signuperror. "<br/>Email:	Invalid Email Address"; 
				$flag=false;
			}
			
			if (strlen($password)<6) {
				$signuperror = $signuperror. "<br/>Password:	Password should contain minimum 6 characters"; 
				$flag=false;
			}
			
		if($flag){
			$conn= getDatabaseConnection();
			$qry="SELECT * FROM USERS WHERE emailid='".$email_signup."'";
			$result=mysqli_query($conn,$qry);	
			mysqli_close($conn);
			
			if($result){
				if(mysqli_num_rows($result)==1){
					$signuperror = "An account is already registered with ".$email_signup.". Please use another email to register.";
				}
			}
		}
	}
?>

    <!-- Banner -->
    <section id="banner">
        <h2><?php if(isset($_SESSION['firstname'])){ echo "Bonjour ".$_SESSION['firstname']."!";} else echo "Welcome to Blind Ride.";?></h2>
        <p>Ready for a ride and make a new friend? Let's do it</p>
        <ul class="actions">
            <li>
                <a href="plan.php" class="button big">Find a Ride</a> &nbsp;&nbsp;
				<a href="offer.php" class="button big">Offer a Ride</a>
            </li>
        </ul>
    </section>

    <!-- One -->
    <section id="rides" class="wrapper style2 special">
        <div class="container">
            <header class="major">
                <h2>Need a Ride</h2>
            </header>
            <section class="profiles">
                <div class="row">
                    <section class="3u 6u(medium) 12u$(xsmall) profile">
                        <img src="images/pillions/jyoti.gif" alt="" />
                        <h3>Jyoti</h3>
                        <p>24 yrs | Female <br/> Wakad to Hinjewadi P1</p>
                        
                    </section>
                    <section class="3u 6u(medium) 12u$(xsmall) profile">
                        <img src="images/pillions/kirti.gif" alt="" />
                        <h3>Kirti</h3>
                        <p>24 yrs | Female <br/> Wakad to Hinjewadi P3</p>
                        
                    </section>
                    <section class="3u 6u(medium) 12u$(xsmall) profile">
                        <img src="images/pillions/vasu.gif" alt="" />
                        <h3>Vasundhara</h3>
                        <p>26 yrs | Female <br/> Pimple Saudagar to Hinjewadi P3</p>
                        
                    </section>
                    <section class="3u 6u(medium) 12u$(xsmall) profile">
                        <img src="images/pillions/jyoti.gif" alt="" />
                        <h3>Sneha</h3>
                        <p>24 yrs | Female <br/> Wakad to Hinjewadi P3</p>
                        
                    </section>
                </div>
                
            </section>

            <header class="major">
                <h2>Offering Ride</h2>
            </header>
            <section class="profiles">
                <div class="row">
                    <section class="3u 6u(medium) 12u$(xsmall) profile">
                        <img src="images/riders/safal.gif" alt="" />
                        <h3>Safal</h3>
                        <p>24 yrs | Male <br/> Wakad to Hinjewadi P1</p>
                        
                    </section>
                    <section class="3u 6u(medium) 12u$(xsmall) profile">
                        <img src="images/riders/shabbir.gif" alt="" />
                        <h3>Shabbir</h3>
                        <p>24 yrs | Male <br/> Wakad to Hinjewadi P3</p>
                        
                    </section>
                    <section class="3u 6u(medium) 12u$(xsmall) profile">
                        <img src="images/riders/himanshu.gif" alt="" />
                        <h3>Himanshu</h3>
                        <p>24 yrs | Male <br/> Wakad to Hinjewadi P1</p>
                        
                    </section>
                    <section class="3u 6u(medium) 12u$(xsmall) profile">
                        <img src="images/riders/piyush.gif" alt="" />
                        <h3>Piyush</h3>
                        <p>24 yrs | Male <br/> Wakad to Hinjewadi P3</p>
                        
                    </section>
                </div>
                
            </section>
        </div>
    </section>

    <!-- Two -->
    <section id="about" class="wrapper style1 special">
        <div class="container">
            <header class="major">
                <h2>Blind Ride</h2>
            </header>
			 <header class="major">
				<p>What is it all about?</p>
			</header>
			<div class="12u 12u$(large)">
                <section class="box">
                    <i class="icon big rounded color3 fa-car"></i>
                    <h3></h3>
                    <p>Blind Ride is an initiative by the people for the people like you to help your friends by giving them ride to their office or places coming en-route to your destinations.</br>
				We believe that there is no harm in doing so, instead it's very good idea to increase your network, pool your vehicle, reduce traffic and pollution.</p>
                </section>
            </div>

			 <header class="major">
				<p>Why Blind Ride?</p>
			</header>
			
            <div class="row 150%">
                <div class="4u 12u$(medium)">
                    <section class="box">
                        <i class="icon big rounded color1 fa-eye"></i>
                        <h3>You make new friends in life</h3>
                        <p align ="left">You meet someone unknown daily. You talk and mix with them. Sending request on facebook google+ has become old fashioned. Why don't you try this idea to make new friends!</p>
                    </section>
                </div>
                <div class="4u 12u$(medium)">
                    <section class="box">
                        <i class="icon big rounded color6 fa-heart"></i>
                        <h3>You earn respect by helping</h3>
                        <p align="left">A guy or a girl going to office walks so long to catch bus, waiting at bus stop in that kind of rush. Suddenly you reach there and ask to give a lift. Obviously you create a soft corner for you. There is nothing bad in it.</p>
                    </section>
                </div>
                <div class="4u$ 12u$(medium)">
                    <section class="box">
                        <i class="icon big rounded color9 fa-tree"></i>
                        <h3>You reduce traffic and pollution</h3>
                        <p align="left">Just imagine if each single rider takes one person from his/her nearest to home place, how much traffic and rush we could reduce! Just you need to find a right pinion.</p>
                    </section>
                </div>
            </div>
        </div>
    </section>

	<?php 
		if(!isset($_SESSION['emailid'])){
		?>
		<!-- Sign Up -->
    <section id="signup" class="wrapper style3 special">
        <div class="container">
            <header class="major">
                <h2>Create an Account</h2>
                Please fill most accurate information about you. All fields are mandatory.
				<?php if(isset($signuperror)){ ?> 
					<div class="error"><?php if(isset($signuperror))echo $signuperror;?></div>
				<?php }?>
            </header>
        </div>
        <div class="container 50%">
            <form action="/blindride/#signup" id="form_signup" method="post">
                <div class="row uniform">
                    <div class="6u 12u$(small)">
                        <input name="firstname" id="firstname" value="<?php if(isset($firstname))echo $firstname;?>" placeholder="First Name" type="text" required>
                    </div>
					<div class="6u$ 12u$(small)">
                        <input name="lastname" id="lastname" value="<?php if(isset($lastname))echo $lastname;?>" placeholder="Last Name" type="text" required>
                    </div>
                    <div class="6u$ 12u$(small)">
                        <input name="email" id="email" value="<?php if(isset($email_signup))echo $email_signup;unset($email_signup)?>" placeholder="Email" type="email" required>
                    </div>
                    <div class="6u$ 12u$(small)">
                        <input name="password" id="password" value="" placeholder="Password" type="password" required>
                    </div>
					
					<div class="3u$">
						<label>Gender:</label>
					</div>
					
					<div class="4u 12u$(3)">
						<input type="radio" id="gender_male" name="gender" checked="">
						<label for="gender_male">Male</label>
					</div>
					
					<div class="4u 12u$(3)">
						<input type="radio" id="gender_female" name="gender">
						<label for="gender_female">Female</label>
					</div>
					
                    <div class="12u$">
                        <ul class="actions">
                            <li>
                                <input value="Sign Up" name ="signup" class="special big" style="opacity:1" type="submit"></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section>
	
		<!-- Signin -->
    <section id="signin" class="wrapper style3 special">
        <div class="container">
            <header class="major">
                <h2>Log into an existing account</h2>
				<?php if(isset($_SESSION['navigateTo'])){ 
					$message =  "Sign in to Find Rides and Offer a Ride";
					echo "<div class='info'>".$message."</div>";
					}
				?>
				<?php if(isset($signinerror)){ ?> 
					<div class="error"><?php if(isset($signinerror))echo $signinerror;?></div>
				<?php }?>
				
            </header>
        </div>
        <div class="container 50%">
            <form action="/blindride/#signin" id="form_signin" method="post">
                <div class="row uniform">
                    <div class="6u$ 12u$(small)">
                        <input name="email" id="email" value="<?php if(isset($email))echo $email;unset($email);?>" placeholder="Email" type="email" required>
                    </div>
                    <div class="6u$ 12u$(small)">
                        <input name="password" id="password" value="" placeholder="Password" type="password" required>
                    </div>
					
                    <div class="12u$">
                        <ul class="actions">
                            <li>
                                <input value="Sign In" name="login" id="login" style="opacity: 1;" class="special big" type="submit"></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section>

		
		<?php
		}
	?>
	
    <!-- Footer -->
    <?php include '/footer.php' ?>

</body>
</html>
