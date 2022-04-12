@extends('layouts.landingpage.main')

@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Get 24/7 Support</p>
					<h1>Contact us</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mb-5 mb-lg-0">
				<div class="form-title">
					<h2>Have you any question?</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, ratione! Laboriosam est,
						assumenda. Perferendis, quo alias quaerat aliquid. Corporis ipsum minus voluptate? Dolore,
						esse natus!</p>
				</div>
				<div id="form_status"></div>
				<div class="contact-form">
					<form type="POST" id="fruitkha-contact" onSubmit="return valid_datas( this );">
						<p>
							<input type="text" placeholder="Name" name="name" id="name">
							<input type="email" placeholder="Email" name="email" id="email">
						</p>
						<p>
							<input type="tel" placeholder="Phone" name="phone" id="phone">
							<input type="text" placeholder="Subject" name="subject" id="subject">
						</p>
						<p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
						</p>
						<input type="hidden" name="token" value="FsWga4&@f6aw" />
						<p><input type="submit" value="Submit"></p>
					</form>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="contact-form-wrap">
					<div class="contact-form-box">
						<h4><i class="fas fa-map"></i> Shop Address</h4>
						<p>Jl.Pahlawan no.10 <br> Pasuruan, Jawa Timur <br> Indonesia</p>
					</div>
					<div class="contact-form-box">
						<h4><i class="far fa-clock"></i> Shop Hours</h4>
						<p>SEN - JUM: 7 to 10 PM <br> SAB - MIN: 8 to 8 PM </p>
					</div>
					<div class="contact-form-box">
						<h4><i class="fas fa-address-book"></i> Contact</h4>
						<p>Phone: +6283406948512 <br> Email: Apochecker@gmail.com</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end contact form -->

<!-- find our location -->
<div class="find-location blue-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
			</div>
		</div>
	</div>
</div>
<!-- end find our location -->

<!-- google map section -->
<div class="embed-responsive embed-responsive-21by9">
	<iframe
		src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63268.726803004945!2d112.87007502284293!3d-7.65134876914726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7c5e1a5fb57df%3A0xbe8c958dde768096!2sPasuruan%2C%20Pasuruan%20City%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1648123759016!5m2!1sen!2sid"
		width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
		class="embed-responsive-item"></iframe>
</div>
<!-- end google map section -->
@endsection