<?php 

add_shortcode('Consultation-layout', 'Consultation');

function Consultation(){ ?>

<div class="Consultation p-100">
	<div class="sub_Consultation">
		<div class="sub_left_sub_Consultation custome_color">
			<h2 class="secondary_heading">Get A Free <span>Consultation</span></h2>
			<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
			<div class="contact_form">
				<?php echo do_shortcode('[contact-form-7 id="d60d498" title="Message Form"]'); ?>
			</div>
		</div>
		<div class="sub_right_Consultation custome_color">
			<div class="Helpful_faq">
				<h2 class="secondary_heading">Helpful <span>FAQs</span></h2>
			</div>
			<div class="faq_main_container">
				<div class="faq_container">
					<div class="faq_question">
						<div class="faq_question-text">
							<h3>How do I place an order?</h3>
						</div>
						<div class="icon">
							<div class="icon-shape"></div>
						</div>
					</div>
					<div class="answercont">
						<div class="answer">
							<p>
								Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum ipsam odio voluptates ab quae beatae nihil illo alias vitae minima cumque atque, deleniti quos animi nostrum, veritatis quisquam ullam ducimus laboriosam reprehenderit sapiente, quo necessitatibus dolorem. Impedit sed, similique corporis quo totam, veniam consequatur blanditiis, voluptates ipsa eligendi excepturi incidunt facilis ex tempore? Ut vero voluptatum quis doloremque accusantium saepe.
							</p>
						</div>
					</div>
				</div>
				<div class="faq_container">
					<div class="faq_question">
						<div class="faq_question-text">
							<h3>What payment methods do you accept?</h3>
						</div>
						<div class="icon">
							<div class="icon-shape"></div>
						</div>
					</div>
					<div class="answercont">
						<div class="answer">
							<p>
							We accept a variety of payment methods, including credit/debit cards (Visa, MasterCard, American Express), PayPal, and bank transfers. Choose the option that suits you best during the checkout process.</p>
						</div>
					</div>
				</div>
				<div class="faq_container">
					<div class="faq_question">
						<div class="faq_question-text">
							<h3>Can I modify or cancel my order after placing it?</h3>
						</div>
						<div class="icon">
							<div class="icon-shape"></div>
						</div>
					</div>
					<div class="answercont">
						<div class="answer">
							<p>
								Unfortunately, once an order is placed, it cannot be modified or canceled. Please double-check your order before confirming the purchase.
							</p>
						</div>
					</div>
				</div>
				<div class="faq_container">
					<div class="faq_question">
						<div class="faq_question-text">
							<h3>How can I track my order?</h3>
						</div>
						<div class="icon">
							<div class="icon-shape"></div>
						</div>
					</div>
					<div class="answercont">
						<div class="answer">
							<p>
							Once your order is shipped, you will receive a confirmation email with a tracking number. You can use this number to track the delivery status of your package on our website or the courier's site.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php }