<div class="blog-summary">
	
	<div class="columns large-12">
		<div class="blogentry-preview">
			
			<% with $Images.First %>
				<img data-interchange="[$Image.setWidth(980).URL, (default)], [$Image.setWidth(640).URL, (small)], [$Image.setWidth(980).URL, (medium)]" alt="Image: $Image.Title">
			<% end_with %>
			
			<% if $Images.Count!=1 %>
				<div class="hide-on-small-screens image-count web-font" title="this post contains $Images.Count images">+$Images.Count</div>
			<% end_if %>
			
			<div class="blogentry-summary">
				<div class="blog-summary-header">
					<h2 class="postTitle">
						<a href="$Link" title="<% _t('VIEWFULL', 'View full post -') %> $Title">$MenuTitle</a>
					</h2>
					<p class="blog-summary-date">$Author.XML, $Date.Format('F d, Y')</p>
				</div>
				<p class="first-paragraph hide-on-small-screens">$Content.FirstParagraph</p>
				<%--
				<p class="icon comments-white">
					<a href="$Link#comments-holder" title="View Comments Posted">$Comments.Count</a>
				</p>
				--%>
				<p class="icon read-more hide-on-small-screens">
					<a href="$Link">Read the full post</a>
				</p>
			</div>
			
		</div>
	</div>
	
</div>
