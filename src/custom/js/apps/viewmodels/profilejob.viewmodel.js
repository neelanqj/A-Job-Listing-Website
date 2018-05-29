// JavaScript Document
Core.ViewModel.JobProfile = function() {
	var self = this;
	self.job = ko.observable(new Core.Model.Job());
	
	self.jobDetails = function(callback) {		
			callback = typeof (callback) == "function" ? callback : self._jobDetailsCallback;
			
			// begin
			var Info = {
				ACTION: 'jobprofile',
				SESSION: $('#session').val(),
				JSON: ko.toJSON( {jobID: $('#jobID').val()} )
			};
	
			$.ajax({
				url: '../../json/profilejob.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._jobDetailsCallback = function(data) {
			callback = typeof (callback) == "function" ? callback : self._jobSkillDetailsCallback;
			self.job(new Core.Model.Job(data[0]));
			
			var Info = {
				ACTION: 'jobskills',
				SESSION: $('#session').val(),
				JSON: ko.toJSON( {jobID: $('#jobID').val()} )
			};
	
			$.ajax({
				url: '../../json/profilejob.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._jobSkillDetailsCallback = function(data) {
		self.job().skillList(data);
		};
		
	self.jobDetails();
};

