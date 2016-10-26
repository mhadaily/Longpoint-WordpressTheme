<?php
/**************************************
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

get_header(); ?>

	<section id="error404" data-stellar-background-ratio="0.5">
		<div class="marginSection pattern dotted">	
			<div class="container voffset9 voffsetd9" >
				<div class="row divide">
					<div class="col-md-12" style="text-align:center">
						<h1><?php echo __('Oops! Page Not Found', 'Longpoint'); ?></h1>
						<h4><?php echo __('Appears we took a wrong turn', 'Longpoint'); ?></h4>
                        <p><?php echo __('<strong>Note:</strong> Some pages may not be available. Please check back soon for updates.', 'Longpoint'); ?></p>
						<?php get_search_form( true ); ?>
						<a href="<?php echo home_url(); ?>" class="btn btn-default pull-cent"><i class="fa fa-home"></i>  <?php echo __('Back to the Homepage', 'Longpoint'); ?></a>
					</div>
				</div> <!-- end row -->
            </div>  
		</div> 
	</section>
<?php get_footer(); ?>