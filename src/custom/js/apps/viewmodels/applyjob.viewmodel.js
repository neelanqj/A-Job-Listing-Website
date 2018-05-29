// JavaScript Document
Core.ViewModel.ApplyJob = function() {
	var self = this;
	self.resume = ko.observable();
	self.coverletter = ko.observable();
	
	self.apply = function(callback) {		
			callback = typeof (callback) == "function" ? callback : self._applyCallback;
			
			// begin
			var Info = {
				ACTION: 'apply',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({userID: $('#userID').val(),
								jobID: $('#jobID').val(),
								resume: self.resume() || '',
								coverletter: self.coverletter() || '',
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress')})
			};
	
			$.ajax({
				url: '../../json/applyjob.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._applyCallback = function(data) {
			if (data[0].success == '1') {
				window.location = "message.view.php?message=Successfully applied for the job.&mood=positive";
			} else {
				window.location = "message.view.php?message=You already applied for this position.&mood=negative";
			}
		};
};

