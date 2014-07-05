<% loop Images %>
	<% if Image %>
		<div class="gallery-image orientation-<% if $Image.Orientation == 1 %>vertical<% else %>horizontal<% end_if %>">
			<img src="$Image.SetWidth(485).URL" alt="$Title" width="100%">
			<div class="overlay"<% if AverageColor %>style="background:rgba($AverageColor,.75);"<% end_if %>>
				<h4>$Title</h4>
				<% if Description %><p>$Description</p><% end_if %>
				<a href="$BlogEntry.Link">Read more</a>
			</div>
		</div>
	<% end_if %>
<% end_loop %>