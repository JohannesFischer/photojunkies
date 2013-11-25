<% if BlogEntries.MoreThanOnePage %>
	<div class="columns large-12 pagination-centered">
		<ul class="pagination">
			<li class="arrow<% if BlogEntries.NotFirstPage %>unavailable<% end_if %>">
				<a href="<% if BlogEntries.NotFirstPage %>$BlogEntries.PrevLink<% else %>#<% end_if %>">&laquo;</a>
			</li>
			<% loop BlogEntries.PaginationSummary(4) %>
				<li<% if CurrentBool %> class="current"<% end_if %>>
					<a href="<% if Link %>$Link<% end_if %>">$PageNum</a>
				</li>
				<% if not Link %>
					<li class="unavailable">
						<a>&hellip;</a>
					</li>
				<% end_if %>
			<% end_loop %>
		
			<li class="arrow<% if not BlogEntries.NotLastPage %> unavailable<% end_if %>">
				<a href="$BlogEntries.NextLink">&raquo;</a>
			</li>
		</ul>
	</div>
<% end_if %>