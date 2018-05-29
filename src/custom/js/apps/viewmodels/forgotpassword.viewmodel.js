Core.ViewModel.ForgotPassword = function() {
	var self = this;
	self.email = ko.observable();
	self.authenticationcode = ko.observable();
	self.newpassword = ko.observable();
	self.reenternewpassword = ko.observable();
	
	self.getAuthenticationCode = function(callback) {		
			callback = typeof (callback) == "function" ? callback : self._getAuthenticationCodeCallback;
			
			// begin
			var Info = {
				ACTION: 'getauthenticationcode',
				SESSION: $('#session').val(),
				JSON: ko.toJSON( {	userID: $('#userID').val(),
									email: self.email()} )
			};
		
			$.ajax({
				url: '../../json/forgotpassword.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
	
	self._getAuthenticationCodeCallback = function(data) {
		if (data[0].success == '1') alert("Please check your email for your authentication code.");
		else if(data[0].success == '2') alert("Account does not exist, please create a new account.");
		};
	
	
	self.resetPassword = function(callback) {		
			callback = typeof (callback) == "function" ? callback : self._resetPasswordCallback;
			
			// begin
			var Info = {
				ACTION: 'resetpassword',
				SESSION: $('#session').val(),
				JSON: ko.toJSON( {	userID: $('#userID').val(),
									email: self.email(),
									newpassword: self.newpassword(),
									reenternewpassword: self.reenternewpassword(),
									authenticationcode: self.authenticationcode()} )
			};
		
			$.ajax({
				url: '../../json/forgotpassword.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
	
	self._resetPasswordCallback = function(data) {
			if (data[0].success == '1') {
				window.location = "message.view.php?message=Your password has been successfully changed. Please login with your new password.&mood=positive";
			} else {
				window.location = "message.view.php?message=Password change failed. Please make sure you fill the fields out correctly and try again.&mood=negative";
			}
		};

};

