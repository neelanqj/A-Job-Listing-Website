Core.ViewModel.ChangePassword = function() {
	var self = this;
	self.oldpassword = ko.observable();
	self.password = ko.observable();
	self.password2 = ko.observable();
		
	self.changePassword = function(callback) {		
		callback = typeof (callback) == "function" ? callback : self._changePasswordCallback;
		
		// begin
		var Info = {
			ACTION: 'changepassword',
			SESSION: $('#session').val(),
			JSON: ko.toJSON( {	userID: $('#userID').val(),
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress'),
								password: self.password,
								password2: self.password2,
								oldpassword: self.oldpassword} )
		};
	
		$.ajax({
			url: '../../json/changepassword.json.php',
			data: Info,
			dataType: 'json',
			type: "post",
			success: callback
		});
	};
	
	self._changePasswordCallback = function(data) {
			if (data[0].success == '1') {
				window.location = "logout.view.php?message=Your password has been successfully changed. Please login with your new password.";
			} else {
				window.location = "message.view.php?message=Password change failed. Please try again.&mood=negative";
			}
		
	};

};

