    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index"><i class="fa fa-stack-overflow"></i> </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
						<li><a href="index.php"><i class='fa fa-home'></i> Home</a></li>
						<li><a href="product.php"><i class='fa fa-briefcase'></i> Product</a></li>
						<li><a href="viewCart.php"><i class='fa fa-shopping-cart'></i> Cart</a></li>
						<li><a href="contact.php"><i class='fa fa-phone'></i> Contact</a></li>
						<?php 
							if(isset($_SESSION["AID"])||isset($_SESSION["UID"])||isset($_SESSION["SKID"]))
							{
								echo "<li><a href='#'> Welcome ";
										if(isset($_SESSION["AID"])){echo $_SESSION["ANAME"]; }
										else if(isset($_SESSION["UID"])){echo $_SESSION["UNAME"]; }
										else if(isset($_SESSION["SKID"])){echo $_SESSION["SKNAME"]; }
								echo "</a></li>";
								echo '<li><a href="logout.php"><i class="fa fa-sign-in"></i> Logout</a></li>';
							}
							else
							{
								?>
								<li><a href="login.php"><i class='fa fa-sign-in'></i> Sign In</a></li>
								<li><a href="alogin.php"><i class='fa fa-sign-in'></i> Admin</a></li>
								<?php
							}
						?>
						
                </ul>
            </div>
        </div>
    </nav>