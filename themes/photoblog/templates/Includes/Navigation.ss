<div class="contain-to-grid sticky">
	<nav class="top-bar" data-topbar>
		<ul class="title-area">
			<!-- Title Area -->
			<li class="name">
			  <a href="$BaseHref" class="web-font" rel="home">$SiteConfig.Title</a>
			</li>
			<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		</ul>
	
		<section class="top-bar-section">
			<!-- Left Nav Section -->
			<ul class="right">
				<% loop $Menu(1) %>
					<li class="$LinkingMode<% if $Children %> has-dropdown<% end_if %>">
						<a href="$Link" title="$Title.XML">$MenuTitle.XML</a>
						<% if $Children %>
							<ul class="dropdown">
								<% loop $Children %>
								<li class="$LinkingMode">
									<a href="$Link" title="$Title.XML">$MenuTitle.XML</a>
								</li>
								<% end_loop %>
							</ul>
						<% end_if %>
					</li>
				<% end_loop %>
			</ul>
		</section>
	</nav>	
</div>