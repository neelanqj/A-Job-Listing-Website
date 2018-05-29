Core.ViewModel.PostJob = function() {
	var self = this;
	self.job = new Core.Model.Job();
	
	self.removeSkill = function(skill) {
		self.job.skillList.remove(skill);
	};
	
	self.addSkill = function() {
			emptySkill = ko.utils.arrayFirst(self.job.skillList(), function (skill) {
				if (skill.skillname() == '')
					return true;
				else
					return false;
			});
			
			if (self.job.skillList().length > 0 && emptySkill != null) {
				alert("Please fill in all blank skill descriptions before adding a new skill option.");		
			}
			else {
				self.job.skillList.push(new Core.Model.Skill());
			}
		};
	
	self.createJob = function(callback) {		
			callback = typeof (callback) == "function" ? callback : self._createJobCallback;
			
			// begin
			var Info = {
				ACTION: 'jobpost',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({ui: $('#userID').val(),
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress'),
								job: self.job})
			};
	
			$.ajax({
				url: '../../json/postjob.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._createJobCallback = function(data) {
			if (data[0].success == '1') {
				window.location = "message.view.php?message=Successfully created a job.&mood=positive";
			} else {
				window.location = "message.view.php?message=Job creation failed.&mood=negative";
			}	
		};
};

