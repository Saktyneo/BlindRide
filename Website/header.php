<header id="header">
        <h1><a href="/blindride"><img src="/blindride/images/icon_blue.png"/></a></h1>
        <nav id="nav">
            <ul>
				<?php 
					session_start();
					if(isset($_SESSION['emailid'])){
						?>
						<li><?php echo $_SESSION['firstname']?>
							<ul>
								<li><a href="/blindride/offer.php" class="special">Offer Ride</a></li>
							</ul>
						</li>
						<li><a href="/blindride/offer.php" class="special">Offer Ride</a></li>
						<li><a href="/blindride/plan.php" class="special">Find Ride</a></li>
						<li><a href="/blindride/logout.php" class="button special">Log Out</a></li>
						<?php 
					}else{
				?>
                <li><a href="/blindride/">Home</a></li>
                <li><a href="/blindride/#about">About</a></li>
                <li><a href="/blindride/#rides">Rides</a></li>
                <li><a href="/blindride/#signup" class="button special">Sign Up</a></li>
				<li><a href="/blindride/#signin" class="button special">Sign In</a></li>
				<?php 
					}//end else
				?>
            </ul>
        </nav>
    </header>