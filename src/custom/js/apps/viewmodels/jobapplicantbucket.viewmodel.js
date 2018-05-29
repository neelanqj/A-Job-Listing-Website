Core.ViewModel.JobApplicantBucket = function() {
	var self = this;
	self.applicantList = ko.observableArray();
	
	self.loadApplicantList = function(callback) {		
			callback = typeof (callback) == "function" ? callback : self._loadApplicantListCallback;
			
			var Info = {
				ACTION: 'jobapplicants',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({userID: $('#userID').val(),
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress'),
								jobID: $('#jobID').val() })
			};
			
			$.ajax({
				url: '../../json/jobapplicantbucket.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._loadApplicantListCallback = function(data) {
		self.applicantList(data);	
		};
		
	self.loadApplicantList();
};

