<div class="blog-summary">
	
	<div class="columns large-12">
		<div class="blogentry-preview">
			<% loop $Images %>
				<% if First %>
					<img src="$Image.setWidth(980).URL" alt="Image: $Title">
				<% end_if %>
			<% end_loop %>
			<% if $Images.Count!=1 %>
				<div class="hide-on-small-screens image-count web-font" title="this post contains $Images.Count images">+$Images.Count</div>
			<% end_if %>
			<div class="blogentry-summary">
				<div class="blog-summary-header">
					<h2 class="postTitle">
						<a href="$Link" title="<% _t('VIEWFULL', 'View full post -') %> $Title">$MenuTitle</a>
					</h2>
					<p class="blog-summary-date">$Author.XML, $Date.Format('d/m/Y')</p>
				</div>
				<p class="first-paragraph hide-on-small-screens">$Content.FirstParagraph</p>
				<!--<p class="icon comments-white">
					<a href="$Link#comments-holder" title="View Comments Posted">$Comments.Count</a>
				</p>-->
				<p class="icon read-more hide-on-small-screens">
					<a href="$Link">Read the full post</a>
				</p>
			</div>
		</div>
	</div>
	
	<!--
	<div class="columns large-12">
		<p class="icon comments">
			<a href="$Link#comments-holder" title="View Comments Posted">$Comments.Count <% _t('COMMENTS', 'Comments') %></a>
		</p>
	</div>
	
	<div class="columns large-6">
		<% if TagsCollection %>
			<p class="icon tags" title="Tags">
				<% loop TagsCollection %>
					<a href="$Link" title="View all posts tagged '$Tag'" rel="tag">$Tag</a><% if not Last %>,<% end_if %>
				<% end_loop %>
			</p>
		<% end_if %>
	</div>
	-->
	
</div>
