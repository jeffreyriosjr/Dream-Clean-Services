<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Handyman Cleaning Service
 */
?>

<footer id="colophon" class="site-footer border-top bg-warning mt-2">
    <div class="container-fluid d-flex justify-content-center">
    	<div class="row">
    		<div class="col-lg-5 col-md-5 col-12">
				<?php if ( has_nav_menu( 'footer' ) ): ?>
		            <nav class="navbar footer-menu">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'footer',
							'container'      => 'div',
							'container_id'   => 'main-nav',
							'menu_id'        => false,
							'depth'          => 1,
						) );
						?>
		            </nav>
				<?php endif ?>
			</div>
	        <div class="site-info col-lg-7 col-md-7 col-12">
			   
			</div>
	    </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
