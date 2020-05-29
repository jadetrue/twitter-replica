	<! –– Footer starts below ––> 
		<footer class="footer">
			<div class="container">
				<p>&copy; My Website 2020</p>
			</div>
		</footer>
	
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="loginModalTitle">Login</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form>
				<div>
					<p id="info">Enter your details below to sign in.</p>
					<p><small>Press 'Sign up' to create a new account.</small></p>
				</div>
				<input type="hidden" name="loginActive" id="loginActive" value="1">
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email" placeholder="Email address">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" class="form-control" id="password" placeholder="Password">
				</div>
			</form>
			<div class="alert alert-danger" id="loginAlert">
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" id="toggleLogin">Sign up</a>
			<button type="button" class="btn btn-primary" id="loginBtn">Login</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<script>
	
		$("#toggleLogin").click(function() {
			if ($("#loginActive").val() == "1") {
				$("#loginActive").val("0");
				$("#loginModalTitle").html("Sign up");
				$("#loginBtn").html("Sign up");
				$("#toggleLogin").html("Back");
				$("#info").html('Enter your details below to sign up.');
			} else {
				$("#loginActive").val("1");
				$("#loginModalTitle").html("Login");
				$("#loginBtn").html("Login");
				$("#toggleLogin").html("Sign up");
				$("#info").html('Enter your details below to sign in');
			}
		})
		
		$("#loginBtn").click(function() {
			
			$.ajax({
				type: "POST",
				url: "actions.php?action=loginSignup",
				data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val(),
				success: function(result) {
				
					if (result == "1") {
					
						window.location.assign('http://46.32.240.41/jadetrue.co.uk/twitter/index.php');
					
					} else {
					
						$("#loginAlert").html(result).show();
					
					}
				}
			})
			
		})
		
		$(".toggleFollow").click(function() {
			
			var id = $(this).attr("data-userId");
			
			$.ajax({
				type: "POST",
				url: "actions.php?action=toggleFollow",
				data: "userId=" + id,
				success: function(result) {
				
					if (result == "1") {
					
						$("a[data-userId='" + id + "']").html("Follow");
						
					} else if (result == "2") {
					
						$("a[data-userId='" + id + "']").html("Unfollow");
						
					}
				}
			})
		
		})
		
		$("#postTweetBtn").click(function() {
			
			$.ajax({
				type: "POST",
				url: "actions.php?action=postTweet",
				data: "tweetContent=" + $("#tweetContent").val(),
				success: function(result) {
				
					if (result == "1") {
					
						$("#tweetSuccess").show();
						$("#tweetFail").html(result).hide();
						
					} else if (result != "") {
					
						$("#tweetFail").html(result).show();
						$("#tweetSuccess").hide();
					
					}

				}
			})
			
		})
	
	</script>
	
	
  </body>
</html>