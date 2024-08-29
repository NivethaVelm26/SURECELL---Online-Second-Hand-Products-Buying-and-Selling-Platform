<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="/style.css"> -->
    <title> POST AD | BUY & SELL</title>
    <!-- favicon -->
    <link rel="icon" href="img/buysellicon.jpg" type="image" sizes="16x16">
    <!-- header links -->
    <script src="https://kit.fontawesome.com/4a3b1f73a2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <script src="js/jQuery3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
</head>

<body>
    <form name="sendMail" id="sendMailForm">
		<div class="form-group user-name">
			<label for="name" class="sr-only">Name</label>
			<!-- "id" for taking name -->
			<input type="text" class="form-control" required="" id="name" placeholder="First Name">
		</div>
		<div class="form-group user-email">
			<label for="email" class="sr-only">Email</label>
			<!-- "id" for taking email -->
			<input type="email" class="form-control" required="" id="email" placeholder="Email Address">
		</div>
		<div class="form-group user-phone">
			<label for="contactNumber" class="sr-only">Contact Number</label>
			<!-- "id" for taking contact number -->
			<input type="text" class="form-control" required="" id="contactNumber" placeholder="Phone">
		</div>
		<div class="form-group user-message">
			<label for="message" class="sr-only">Message</label>
			<!-- "id" for taking message -->
			<textarea class="form-control" required="" id="message" placeholder="Write Message"></textarea>
		</div>
	<!-- Notifications for 'error' Or 'successfully'-->
		<div class="col-md-12 mailResponse" style="display:none;">
			<div class="alert alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<p class="mailResponseText"></p>
			</div>
		</div>
	<!-- submit button -->
	<button type="submit" class="btn btn-primary">Send Message <i class="fa fa-paper-plane"></i></button>
</form>

<script>
// #sendMailForm takes the data from the form with given ID
$( '#sendMailForm' ).submit(function ( e ) {
    var data = {
        'name': $('#name').val(),
        'email': $('#email').val(),
        'contact': $('#contactNumber').val(),
        'message' : $('#message').val()
    };
    // POST data to the php file
    $.ajax({ 
        url: 'mail.php', 
        data: data,
        type: 'POST',
        success: function (data) {
			// For Notification
            document.getElementById("sendMailForm").reset();
            var $alertDiv = $(".mailResponse");
            $alertDiv.show();
            $alertDiv.find('.alert').removeClass('alert-danger alert-success');
            $alertDiv.find('.mailResponseText').text("");
            if(data.error){
                $alertDiv.find('.alert').addClass('alert-danger');
                $alertDiv.find('.mailResponseText').text(data.message);
            }else{
                $alertDiv.find('.alert').addClass('alert-success');
                $alertDiv.find('.mailResponseText').text(data.message);
            }
        }
    });
    e.preventDefault();
});
</script>

</body>