// JavaScript Document
Core.ViewModel.JobApplications = function() {
	var self = this;
	self.jobsList = ko.observableArray();
	
	self.loadJobs = function(callback) {		
			callback = typeof (callback) == "function" ? callback : self._loadJobsCallback;
			
			var Info = {
				ACTION: 'appliedjobs',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({userID: $('#userID').val(),
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress')})
			};
			
			$.ajax({
				url: '../../json/jobapplicationlist.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._loadJobsCallback = function(data) {
		self.jobsList(data);	
		};
		
	self.loadJobs();
};

