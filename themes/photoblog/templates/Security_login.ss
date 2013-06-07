<!DOCTYPE html>
<html lang="$ContentLocale">
<head>
    <% base_tag %>
    <title>$Title</title>
	<% require themedCSS(foundation/css/normalize) %>
	<% require themedCSS(foundation/css/foundation.min) %>
	<% require themedCSS(layout) %>
	<% require themedCSS(cmslogin) %>
	<meta name="viewport" content="width=device-width">
	<meta name="robots" content="noindex, nofollow">
</head>
<body class="$ClassName LoginPage typography">
    
	<header>
		<div class="row">
	        <div class="column large-12">
				<h1><a href="/">login</a></h1>
			</div>
		</div>
	</header>
	
    <% if Content %>
		<div class="row">
	        <div class="column large-12">
			    <div class="PageContent">$Content</div>
			</div>
		</div>
    <% end_if %>

    <div id="CMSLogin" class="row">
        <div class="column large-12">
            $Form
        </div>
    </div>
	
</body>
</html>