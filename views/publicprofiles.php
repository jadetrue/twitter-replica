<! –– Public profile content starts below ––> 
		
		<div class="container mainContainer">
			<div class="row">
				<div class="col-md-8">
					
					<?php if ($_GET['userid']) { ?>
					
					<?php displayTweets($_GET['userid']); ?>
					
					
					<?php } else { ?>

					<h2>Active users</h2>	
					<?php displayUsers(); ?>
					
					<?php } ?>
						
					</div>
				<div class="col-md-4">
					<h2>Search / post tweets</h2>
					<?php displaySearch(); ?>
					<hr>
					<?php displayTweetBox(); ?>
				</div>
			</div>
		</div>