Core.ViewModel.Activate = function() {
	var self = this;
	
	self.email = ko.observable();	
	self.vCode = ko.observable();
	self.accountType = ko.observable();
	
	self.activateEmployee = function(callback) {		
			callback = typeof (callback) == "function" ? callback : self._activateEmployeeCallback;
			
			var Info = {
				ACTION: 'activateEmployee',
				SESSION: $('#session').val(),
				JSON: ko.toJSON( {  email: self.email,
									vcode: self.vCode} )
			};
			
			$.ajax({
				url: '../../json/activate.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._activateEmployeeCallback = function(data) {
			if (data[0].success == '1') {
				window.location = "message.view.php?message=Successfully created an Employee Account. Please log in.&mood=positive";
			} else {
				window.location = "message.view.php?message=Invalid email or verification code.&mood=negative";
			}	
		};
		
	self.activateEmployer = function(callback) {		
			callback = typeof (callback) == "function" ? callback : self._activateEmployerCallback;
			
			var Info = {
				ACTION: 'activateEmployer',
				SESSION: $('#session').val(),
				JSON: ko.toJSON( {  email: self.email,
									vcode: self.vCode} )
			};
	
			$.ajax({
				url: '../../json/activate.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._activateEmployerCallback = function(data) {
			if (data[0].success == '1') {
				window.location = "message.view.php?message=You have successfully created an Employer Account. Please log in.&mood=positive";
			} else {
				window.location = "message.view.php?message=Invalid email or verification code.&mood=negative";
			}	
		};	
		
	self.resendVerification = function(data) {
			var Info = {
				ACTION: 'verificationcode',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({email: self.email })
				};
			
			$.ajax({
				url: '../../json/signup.json.php',
				data: Info,
				dataType: 'json',
				type: "post"
				});
			
			alert ("Check your email");
	};
};

