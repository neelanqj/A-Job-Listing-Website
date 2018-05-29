// JavaScript Document
Core.ViewModel.ViewApplication = function() {
	var self = this;
	self.application = ko.observable();
	
	self.loadApplication = function(callback) {		
			callback = typeof (callback) == "function" ? callback : self._loadApplicationCallback;
			
			// begin
			var Info = {
				ACTION: 'load',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({userID: $('#userID').val(),
								appID: $('#appID').text(),
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress')})
			};
	
			$.ajax({
				url: '../../json/viewapplication.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._loadApplicationCallback = function(data) {
			self.application(data[0]);
		};
		
	self.loadApplication();
};

