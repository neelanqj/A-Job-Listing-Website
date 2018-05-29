Core.ViewModel.AccountSettings = function() {
	var self = this;
	self.user = ko.observable(new Core.Model.UserDetails());
	
	self.loadAccountSettings = function(callback) {		
			callback = typeof (callback) == "function" ? callback : self._loadAccountSettingsCallback;
			
			// begin
			var Info = {
				ACTION: 'userdetails',
				SESSION: $('#session').val(),
				JSON: ko.toJSON( {	userID: $('#userID').val(),
									email: $.cookie('email'),
									passcode: $.cookie('passcode'),
									ipaddress: $.cookie('ipaddress')} )
			};
	
			$.ajax({
				url: '../../json/accountsettings.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._loadAccountSettingsCallback = function(data) {
			self.user(new Core.Model.UserDetails(data[0]));
			
		};
		
	self.saveAccountSettings = function(callback) {		
		callback = typeof (callback) == "function" ? callback : self._saveAccountSettingsCallback;
		
		// begin
		var Info = {
			ACTION: 'updatedetails',
			SESSION: $('#session').val(),
			JSON: ko.toJSON( {	userID: $('#userID').val(),
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress'),
								password: self.user().password,
								password2: self.user().password2,
								phone: self.user().phone,
								firstName: self.user().firstName,
								lastName: self.user().lastName,
								region: self.user().region,
								city: self.user().city,
								country: self.user().country,
								postalCode: self.user().postalCode,
								careerLvl: self.user().careerLvl,
								education: self.user().education} )
		};
	
		$.ajax({
			url: '../../json/accountsettings.json.php',
			data: Info,
			dataType: 'json',
			type: "post",
			success: callback
		});
	};
	
	self._saveAccountSettingsCallback = function(data) {
			if (data[0].success == '1') {
				window.location = "message.view.php?message=Successfully updated account settings.&mood=positive";
			} else {
				window.location = "message.view.php?message=Account settings update failed.&mood=negative";
			}	
		
	};

	self.loadAccountSettings();
};

