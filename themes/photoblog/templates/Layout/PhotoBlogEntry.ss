<div class="blog-header" data-interchange="[$FirstImage.Image.CroppedImage(2000,300).URL.URL, (default)], [$FirstImage.Image.CroppedImage(800,200).URL, (small)], [$FirstImage.Image.CroppedImage(1200,300).URL, (medium)], [$FirstImage.Image.CroppedImage(2000,300).URL, (large)]">
	<div class="row">
		<div class="columns large-12">
			<h2>$Title</h2>
			<p>$Date.format('d/m/Y')</p>
		</div>
	</div>
</div>

<div class="row">
	
	<div id="BlogContent" class="blog-content columns large-12">
		
		<div class="blogEntry">
			
			<% if hasMoreThanOneImage %>
				<ul data-orbit>
					<% loop Images %>
						<li>
							<img src="$Image.PaddedImage(970, 650).URL">
							<% if $Title || $Description %><div class="orbit-caption"><strong>$Title</strong> $Description</div><% end_if %>
						</li>			
					<% end_loop %>
				</ul>
			<% else %>
				<div class="blog-image">
					<img src="$FirstImage.Image.PaddedImage(970, 650).URL" alt="Image: $FirstImage.Title">
					<% if $FirstImage.Title || $FirstImage.Description %>
						<p class="blog-image-caption">
							<strong>$FirstImage.Title</strong> $FirstImage.Description
						</p>
					<% end_if %>
				</div>
			<% end_if %>
			
			$Content
			
			<p class="authorDate">
				<% _t('POSTEDBY', 'Posted by') %> $Author.XML <% _t('POSTEDON', 'on') %> $Date.format('d/m/Y')</a>
			</p>
			<% if TagsCollection %>
				<p class="icon tags">
					<% loop TagsCollection %>
						<a href="$Link" title="<% _t('VIEWALLPOSTTAGGED', 'View all posts tagged') %> '$Tag'" rel="tag">$Tag</a><% if not Last %>,<% end_if %>
					<% end_loop %>
				</p>
			<% end_if %>
			
		</div>
		
		<% if IsOwner %>
			<p class="edit-post">
				<a href="$EditURL" id="editpost" title="<% _t('EDITTHIS', 'Edit this post') %>"><% _t('EDITTHIS', 'Edit this post') %></a> | <a href="$Link(unpublishPost)" id="unpublishpost"><% _t('UNPUBLISHTHIS', 'Unpublish this post') %></a>
			</p>
		<% end_if %>
	
	</div>
	
</div>

<div class="row">
	
	<div class="columns large-12">$PageComments</div>
	
</div>