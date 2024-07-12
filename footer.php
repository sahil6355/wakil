</main>

</div>

</div>
<?php 
$id = get_the_ID();
$footer_style = get_option('footer_style', '');
$footer_style = (get_post_meta($id, 'page_footer_style', true)) ? get_post_meta($id, 'page_footer_style', true) : $footer_style;
?>

<footer id="bwp-footer" class="bwp-footer <?php echo esc_attr(get_post($footer_style)->post_name); ?>">
	<?php echo flacio_render_footer($footer_style);	?>
</footer>


<!-- Page cursor Start -->
<div class="cursor cursor-shadow"></div>
<div class="cursor cursor-dot"></div>
<!-- Page cursor End -->
<?php wp_footer(); ?>

<div class="back-to-top" id="back-to-top" style="display:none;">
	<div class="triangle triangle-4">
		
		<svg width="17px" height="15px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				<g id="drop" fill="#FFFFFF" transform="translate(32.000000, 42.666667)">
					<path d="M246.312928,5.62892705 C252.927596,9.40873724 258.409564,14.8907053 262.189374,21.5053731 L444.667042,340.84129 C456.358134,361.300701 449.250007,387.363834 428.790595,399.054926 C422.34376,402.738832 415.04715,404.676552 407.622001,404.676552 L42.6666667,404.676552 C19.1025173,404.676552 7.10542736e-15,385.574034 7.10542736e-15,362.009885 C7.10542736e-15,354.584736 1.93772021,347.288125 5.62162594,340.84129 L188.099293,21.5053731 C199.790385,1.04596203 225.853517,-6.06216498 246.312928,5.62892705 Z" id="Combined-Shape">
					</path>
				</g>
			</g>
		</svg>
	</div>
	To TOP
</div>

</body>

</html>