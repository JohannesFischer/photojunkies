<div class="row page-content">
	
	<div class="large-12 columns">
		<h1>$Title</h1>
	</div>
	
	<% loop getAuthors %>
		<div class="large-12 columns">
			<div class="row">
				<div class="large-4 columns">
					<img src="$Image.CroppedImage(500,300).URL" alt="" class="left">
					<div class="recent-posts">
						<h4>Recent Posts</h4>
						<ul>
							<% loop RecentPosts($ID).Limit(3) %>
								<li>
									<a href="$Link">$Title</a>
								</li>
							<% end_loop %>
						</ul>
					</div>
				</div>
				<div class="large-8 columns">
					<h2>$FirstName $Surname</h2>
					$Description
				</div>
			</div>
			</p>
		</div>
	<% end_loop %>
	
</div>