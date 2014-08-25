<% loop Images %>
	<% if Image %>
		<div class="gallery-image orientation-<% if $Image.Orientation == 1 %>vertical<% else %>horizontal<% end_if %>">
			<img src="$Image.CroppedImage(485,485).URL" alt="$Title" width="100%">
			<div class="overlay">
				<h4>$Title</h4>
				<% if Description %><p>$Description</p><% end_if %>
				<a href="$BlogEntry.Link">$BlogEntry.Title &raquo;</a>
			</div>
		</div>
	<% end_if %>
<% end_loop %>