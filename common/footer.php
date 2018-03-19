</div><!-- end content -->
<!-- end of container -->
</div>

<footer id="footer" role="contentinfo">

    <div id="footer-content" class="center-div">      
        <p>
			<img class="footer-logo" src="https://editionstest.ehri-project-stage.eu/themes/ehri/images/logo-bottom-ehri.png" title="EHRI">
			<img class="footer-logo" src="https://editionstest.ehri-project-stage.eu/themes/ehri/images/logo-bottom-na1.png" title="NA1">
			<img class="footer-logo" src="https://editionstest.ehri-project-stage.eu/themes/ehri/images/logo-bottom-na2.png" title="NA2">
	    </p>
	    <?php if($footerText = get_theme_option('Footer Text')): ?>
            <p><?php echo get_theme_option('Footer Text'); ?></p>
        <?php endif; ?>

    </div><!-- end footer-content -->

     <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

</footer>

<!-- addthis --> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5aa59d527f6db3d6"></script>

<!-- slick -->
<script type="text/javascript" src="https://editionstest.ehri-project-stage.eu/themes/ehri/slick/slick.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $('.featured-carousel').slick({
	  dots: true,
	  infinite: true,
	  speed: 400,
	  slidesToShow: 3,
	  slidesToScroll: 3,
	  responsive: [
		{
		  breakpoint: 1070,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2,
			infinite: true,
			dots: true
		  }
		},
		{
		  breakpoint: 430,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
	  ]
	});
});
</script>

</body>

</html>
