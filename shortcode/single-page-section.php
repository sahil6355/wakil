<?php 

add_shortcode('book-page-section', 'single_page_section');

function single_page_section()
{
	?>
	<div class="p-100 book_appointmain">
		<div class="sub_book_appointmain">
			<h2 class="secondary_heading">Ready to Assist You in <span>Resolving Any Legal Issues</span>You May Have.</h2>
			<p>We feel compelled to break the typical lawyer-client relationship. We endeavor to be friendly and reachable, and to keep in touch with our clients.</p>
			<div class="button-box Load_more">
			<a class="button-wrap">
				<span>
					Book Appointment
					<i class="ri-arrow-right-line"></i>
				</span>
			</a>
		</div>
		</div>
	</div>
	<?php
}