// JavaScript Document
Core.ViewModel.SignUp = function() {
	var self = this;
	self.userDetails = (new Core.Model.UserDetails());

	self.userSignup = function(callback) {		
			callback = typeof (callback) == "function" ? callback : self._userSignupCallback;
			
			// begin
			var Info = {
				ACTION: 'signup',
				SESSION: $('#session').val(),
				JSON: ko.toJSON(self.userDetails)
			};
	
			$.ajax({
				url: '../../json/signup.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._userSignupCallback = function(data) {
			var Info = {
				ACTION: 'verificationcode',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({email: self.userDetails.email()})
				};
			
			$.ajax({
				url: '../../json/signup.json.php',
				data: Info,
				dataType: 'json',
				type: "post"
				});
			
			if (data[0].success == '1') {
				window.location = "message.view.php?message=Please check your email for your account verification code information.&mood=positive";
			} else {
				window.location = "message.view.php?message=Signup failed. Please make sure you enter in all fields correctly. &mood=negative";
			}		
		};
};

