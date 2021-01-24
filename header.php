<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section
 *
 * @package WordPress
 * @subpackage themename
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<style type="text/css">
		.loggedin header {
			margin-top: 32px;
		}
		.loggedin #main-content {
			margin-top: 80px;
		}
		header{
			padding: 0 1rem;
			border-bottom: 1px solid #edf0f4;
			background: #fff;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			z-index: 1000;
			opacity: 1;
		}
		header .header-content {
			display: flex;
			align-items: center;
			justify-content: space-between;
			z-index: 3;
			margin: 0 auto;
			max-width: 1280px;
			padding-left: .9375rem;
			padding-right: .9375rem;
		}
		header .logo {
			line-height: 0;
		}
		#menu, .header-block-right {
		    flex: 1;
		}
		header .header-block-right {
			flex: inherit;
		}
		header .header-block-right {
			display: flex;
		    align-items: center;
		    line-height: 0;
		}
		#menu {
		    display: flex;
		    justify-content: flex-end;
		}
		.menu-container{
		    flex-grow: 1;
		    padding: 0 8px;
		}
		.menu-container ul{
			display: flex;
		    justify-content: space-evenly;
		    width: 100%;
		}
		.menu-container ul li {
			float: left;
		    flex-grow: 1;
		    text-align: center;
		}
		.menu-container ul li {
		    list-style-type: none;
		}

	</style>
	<header id="HeaderHome">
		<div class="header-content">
			<div class="log"><a href="/"><?php bloginfo('name'); ?></a></div>
			<div id="menu">
				<div class="menu-container">
					<?php wp_nav_menu(); ?>
				</div>
			</div>
			<div class="header-block-right">
				<div id="toggledarkmode">
					<a class="wpnm-button">
					<!--a class="wpnm-button" onclick="toggleTheme()"-->
						<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
							<path class="moon" d="M13 20c-1.438 0-2.77-.36-4-1.078a8.058 8.058 0 0 1-2.922-2.906C5.36 14.796 5 13.458 5 12c0-1.458.36-2.797 1.078-4.016A8.058 8.058 0 0 1 9 5.078 7.786 7.786 0 0 1 13 4c.5 0 .98.042 1.437.125.459.083.797.307 1.016.672.219.364.287.755.203 1.172-.083.416-.323.729-.719.937a4.274 4.274 0 0 0-1.546 1.531 4.014 4.014 0 0 0-.579 2.094c0 .854.235 1.625.704 2.313a4.26 4.26 0 0 0 1.843 1.531c.76.333 1.568.417 2.422.25.438-.083.823 0 1.156.25.334.25.537.583.61 1 .073.417-.037.802-.328 1.156a7.814 7.814 0 0 1-2.75 2.188A7.903 7.903 0 0 1 13 20zm0-14.5c-1.167 0-2.25.292-3.25.875a6.53 6.53 0 0 0-2.375 2.36A6.313 6.313 0 0 0 6.5 12c0 1.187.292 2.276.875 3.266a6.53 6.53 0 0 0 2.375 2.359c1 .583 2.083.875 3.25.875 1 0 1.943-.214 2.828-.64a6.4 6.4 0 0 0 2.234-1.766 5.677 5.677 0 0 1-3.28-.344 5.596 5.596 0 0 1-2.516-2.063c-.636-.937-.954-1.99-.954-3.156 0-1.041.26-2 .782-2.875a5.68 5.68 0 0 1 2.093-2.062A7.603 7.603 0 0 0 13 5.5z" fill="#6C7C9B" fill-rule="nonzero">
							</path>
						</svg>
					</a>
				</div>
			</div>
		</div>
	</header>
