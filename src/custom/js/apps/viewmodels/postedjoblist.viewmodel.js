// JavaScript Document
Core.ViewModel.PostedJobs = function() {
	var self = this;
	self.jobsList = ko.observableArray();
	self.selectedJob = ko.observable();
	
	self.selectJob = function () {
		self.selectedJob(this);
		$("#delModal").modal("show");
	};
	
	self.removeJob = function(callback) {
			callback = typeof (callback) == "function" ? callback : self._removeJobCallback;
			
			var Info = {
				ACTION: 'removejob',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({userID: $('#userID').val(),
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress'),
								jobID: self.selectedJob().jid})
			};
	
			$.ajax({
				url: '../../json/postedjoblist.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._removeJobCallback = function(data) {
		self.jobsList.remove(self.selectedJob());
		$('#delModal').modal('hide');
	};
	
	self.loadJobs = function(callback) {		
			callback = typeof (callback) == "function" ? callback : self._loadJobsCallback;
			
			var Info = {
				ACTION: 'listjobs',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({userID: $('#userID').val(),
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress')})
			};
	
			$.ajax({
				url: '../../json/postedjoblist.json.php',
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

