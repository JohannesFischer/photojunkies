<div id="BlogContent" class="blog-holder row">
	
	<div class="columns large-12">	
		<% if SelectedTag %>
			<h2><% _t('VIEWINGTAGGED', 'Viewing entries tagged with') %> '$SelectedTag'</h2>
		<% else_if SelectedDate %>
			<h2><% _t('VIEWINGPOSTEDIN', 'Viewing entries posted in') %> $SelectedNiceDate</h2>
		<% else_if SelectedAuthor %>
			<h2><% _t('VIEWINGPOSTEDBY', 'Viewing entries posted by') %> $SelectedAuthor</h2>
		<% end_if %>
	</div>
	
	<% if BlogEntries %>
		<% loop BlogEntries %>
			<% if Images.Count != 0 %>
				<% include BlogSummary HasFiveOrMore=$hasMoreThanFourImages() %>
			<% end_if %>
		<% end_loop %>
	<% else %>
		<h2><% _t('NOENTRIES', 'There are no blog entries') %></h2>
	<% end_if %>
	
	<% include BlogPagination %>
	
</div>
