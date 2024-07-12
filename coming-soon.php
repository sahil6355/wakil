<?php

/*
Template Name: Coming Soon
*/

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="coming-soon p-100">
		<div class="sub-coming-soon-page">
			<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/header/logo.png">
			<div class="coming-soon-title">
				<h1>Something Awesome Is Coming</h1>
				<div class="title_border">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/home/border_icon.png" width="36" height="30">
				</div>
				<p>Keep Waiting To Get More Awesome Things</p>
			</div>
			<div class="countdown-height">
				<div id="countdown">
					<div class="number">
						<span class="days time"></span>
						<span class="text">Days</span>
					</div>
					<div class="number">
						<span class="hours time"></span>
						<span class="text">Hours</span>
					</div>
					<div class="number">
						<span class="minutes time"></span>
						<span class="text">Minutes</span>
					</div>
					<div class="number">
						<span class="seconds time"></span>
						<span class="text">Seconds</span>
					</div>
				</div>
			</div>
			<div class="subscription-form2">
				<?php echo do_shortcode('[contact-form-7 id="3abfe39" title="coming soon"]'); ?>
				<p class="text">We are working very hard on the new version of our site.</p>
			</div>
			<div class="social-media-icone">
				<a href="https://x.com/">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/case/twiter.png" width="24" height="24">
				</a>
				<a href="https://www.facebook.com/">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/case/facebook.png" width="24" height="24">
				</a>
				<a href="https://www.linkedin.com/">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/case/linkedin.png" width="24" height="24">
				</a>
				<a href="https://www.instagram.com/">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/case/instagram.png" width="24" height="24">
				</a>
			</div>
		</div>
	</div>
</main>
</div>
</div>
<!-- Page cursor Start -->
<div class="cursor cursor-shadow"></div>
<div class="cursor cursor-dot"></div>
<!-- Page cursor End -->
<?php wp_footer(); ?>

<script type="text/javascript">
	function getTimeRemaining(endtime) {
		let t = Date.parse(endtime) - Date.parse(new Date());
		let seconds = Math.floor((t / 1000) % 60);
		let minutes = Math.floor((t / 1000 / 60) % 60);
		let hours = Math.floor((t / (1000 * 60 * 60)) % 24);
		let days = Math.floor(t / (1000 * 60 * 60 * 24));
		return {
			total: t,
			days: days,
			hours: hours,
			minutes: minutes,
			seconds: seconds
		};
	}
	function initializeClock(id, endtime) {
		let clock = document.getElementById(id);
		let daysSpan = clock.querySelector(".days");
		let hoursSpan = clock.querySelector(".hours");
		let minutesSpan = clock.querySelector(".minutes");
		let secondsSpan = clock.querySelector(".seconds");
		function updateClock() {
			let t = getTimeRemaining(endtime);
			daysSpan.innerHTML = t.days;
			hoursSpan.innerHTML = ("0" + t.hours).slice(-2);
			minutesSpan.innerHTML = ("0" + t.minutes).slice(-2);
			secondsSpan.innerHTML = ("0" + t.seconds).slice(-2);
			if (t.total <= 0) {
				clearInterval(timeinterval);
			}
		}
		updateClock();
		var timeinterval = setInterval(updateClock, 1000);
	}
	const deadline = "November 31 2024";
	initializeClock("countdown", deadline);
</script>
</body>
</html>