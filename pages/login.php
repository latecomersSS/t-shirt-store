		<!--- start-content---->
		<div class="content login-box">
			<div class="login-main">
				<div class="wrap">
					<h1>LOGIN OR CREATE AN ACCOUNT</h1>
					<div class="login-left">
						<h3>NEW CUSTOMERS</h3>
						<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
						<a class="acount-btn" href="index.php?act=register">Creat an Account</a>
					</div>
					<div class="login-right">
						<h3>REGISTERED CUSTOMERS</h3>
						<p>If you have an account with us, please log in.</p>
						<form action="./handle/logincheck.php" method="POST" name="login">
							<div>
								<span>Email<label>*</label></span>
								<input type="text" name="email"> 
							</div>
							<div>
								<span>Password<label>*</label></span>
								<input type="text" name="password"> 
							</div>
							<a class="forgot" href="#">Forgot Your Password?</a>
							<input type="submit" value="Login" />
						</form>
					</div>
					<div class="clear"> </div>
				</div>
			</div>
		</div>
		<!---- start-bottom-grids---->