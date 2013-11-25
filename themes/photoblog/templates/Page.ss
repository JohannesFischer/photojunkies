<!DOCTYPE html>
<html lang="$ContentLocale"
	xmlns="http://www.w3.org/1999/xhtml"
    xmlns:og="http://ogp.me/ns#"
    xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
	<% base_tag %>
	<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<% if $ClassName="PhotoBlogEntry" %><meta property="og:image" content="http://www.photojunkies.de$getEntryImage.Image.PaddedImage(300,200).URL"><% end_if %>
	$MetaTags(false)
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=$getFontFamily">
	<link rel="shortcut icon" href="$ThemeDir/images/favicon.ico" />
</head>
<body class="$ClassName">

	<% include Header %>
	
	<div class="typography" role="main">
		$Layout
	</div>
	
	<% if ClassName == PhotoBlogEntry %>
		<div class="row entry-nav">
			<% if nextEntry %>
				<div class="large-4 small-6 columns">
					<% with nextEntry %>
						<a href="$Link">&larr; $Title</a>
					<% end_with %>
				</div>
			<% end_if %>
			<% if previousEntry %>
				<div class="large-4 <% if not nextEntry%>large-offset-8 <% end_if %>small-6 columns text-right">
					<% with previousEntry %>
						<a href="$Link">$Title &rarr;</a>
					<% end_with %>
				</div>
			<% end_if %>
		</div>
	<% end_if %>
	
	<% include Footer %>

	<script src="{$ThemeDir}/javascript/jquery.js"></script>
	<script src="{$ThemeDir}/javascript/script.js"></script>
	<script src="{$ThemeDir}/javascript/foundation/foundation.min.js"></script>
	<script src="{$ThemeDir}/javascript/foundation/foundation/foundation.orbit.js"></script>
	<script>jQuery(document).foundation();</script>
	<% if not CurrentMember %>
		<% include TrackingCode %>
	<% end_if %>
	
</body>
</html>
