<div class="blog-summary">
	<div class="columns large-12">
		<h2 class="postTitle">
			<a href="$Link" title="<% _t('VIEWFULL', 'View full post -') %> $Title">$MenuTitle</a>
		</h2>
	</div>
	
	<!-- BlogHolder.ShowFullEntry -> disable this shit -->
	<div class="columns large-5">
		<% loop $Images %>
			<% if First %>
				<a href="$Top.Link">
					<img src="$Image.setWidth(400).URL" alt="Image: $Title">
				</a>
			<% end_if %>
		<% end_loop %>
	</div>
	<div class="columns large-7">
		<p class="authorDate"><% _t('POSTEDBY', 'Posted by') %> $Author.XML <% _t('POSTEDON', 'on') %> $Date.Long | <a href="$Link#comments-holder" title="View Comments Posted">$Comments.Count <% _t('COMMENTS', 'Comments') %></a></p>
		<p class="first-paragraph">$Content.FirstParagraph</p>
		<% if TagsCollection %>
			<p class="icon tags" title="Tags">
				<% loop TagsCollection %>
					<a href="$Link" title="View all posts tagged '$Tag'" rel="tag">$Tag</a><% if not Last %>,<% end_if %>
				<% end_loop %>
			</p>
		<% end_if %>
		<p class="read-more">
			<a href="$Link">Read the full post</a>
		</p>
	</div>
	
</div>
