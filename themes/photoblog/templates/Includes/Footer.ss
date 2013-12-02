<footer role="contentinfo">
	<div class="row">
		<div class="columns large-6">
			<h5>About</h5>
			<p>Lorem Ipsum</p>
		</div>
		<div class="columns large-6">
			<h5>Tags</h5>
			<ul class="tag-list">
				<% loop getTags(10) %>
					<li>
						<a href="$Link">$Tag</a>
					</li>
				<% end_loop %>
			</ul>
		</div>
	</div>
	<div class="copy">
		<div class="row">
			<div class="copy columns large-12">
				<p class="text-center">
					developed &amp; designed by <a href="http://www.johannes-fischer.de" rel="external">Johannes Fischer</a>
				</p>
			</div>
		</div>
	</div>
</footer>