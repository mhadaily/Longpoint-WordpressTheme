<!-- BEGIN MAIN NAVIGATION -->

<nav class="nav nav__primary clearfix" id="nav">

<?php if (has_nav_menu('mainnav')) {

	wp_nav_menu( array(
		
		'container'      => 'ul',
		'menu_class'     => 'nav navbar-nav',
		'menu_id'        => 'mainnav',

		'depth'          => 0,

		'theme_location' => 'mainnav',
		

	));

} else {

	echo '<ul class="nav navbar-nav">';

		$ex_page = get_page_by_title( 'Privacy Policy' );

		if ($ex_page === NULL) {

			$ex_page_id = '';

		} else {

			$ex_page_id = $ex_page->ID;

		}

		wp_list_pages( array(

			'depth'    => 0,

			'title_li' => '',

			'exclude'  => $ex_page_id

			)

		);

	echo '</ul>';

} ?>

</nav><!-- END MAIN NAVIGATION -->