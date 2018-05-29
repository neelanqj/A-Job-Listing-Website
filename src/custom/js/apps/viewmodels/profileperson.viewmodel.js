// JavaScript Document
Core.ViewModel.PersonProfile = function() {
	var self = this;
	self.person = ko.observable();
	
	self.skillList = ko.observableArray();
	
	self.selectedItem = ko.observable('');
	self.messageObj = ko.observable(new Core.Model.Message());
	self.messageList = ko.observableArray();
	
	self.employervisibility = ko.observable(false);
	self.employeevisibility = ko.observable(false);
	
	self.setVisibility = function(callback) {		
			if ($.cookie('accounttype') == 2 || $.cookie('accounttype') == 3) {
				self.employervisibility(true);
			}
			
			if ($.cookie('accounttype') == 1 || $.cookie('accounttype') == 3) {
				self.employeevisibility(true);
			}
		};

	self.setVisibility();
	
	// Below are messaging related functions
	self.getMessageList = function(target, callback) {		
			callback = typeof (callback) == "function" ? callback : self._getMessageListCallback;
			
			var Info = {
				ACTION: 'getmessagelist',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({userid: $('#userID').val(),
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress')})
			};
		
			$.ajax({
				url: '../../json/messagecp.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._getMessageListCallback = function(data) {
		self.messageList(data);
		};
		
	self.getMessage = function(target, callback) {		
			callback = typeof (callback) == "function" ? callback : self._getMessageCallback;
			
			var Info = {
				ACTION: 'viewmessage',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({userid: $('#userID').val(),
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress'),
								messageid: self.selectedItem()})
			};
	
			$.ajax({
				url: '../../json/messagecp.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._getMessageCallback = function(data) {
		self.messageObj(new Core.Model.Message(data[0]));
		};
		
	self.sendMessage = function(target, callback) {		
			callback = typeof (callback) == "function" ? callback : self._sendMessageCallback;
			
			var Info = {
				ACTION: 'sendmessage',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({userid: $('#userID').val(),
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress'),
								title: self.messageObj().title(),
								message: self.messageObj().message(),
								recieverid: $('#profileid').val() })
			};
	
			$.ajax({
				url: '../../json/messagecp.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._sendMessageCallback = function(data) {
			if( data[0].success == "1") { 
				$("#contactuser").modal('hide');
				$("#messagesent").modal(); 
			} else { 
				$("#contactuser").modal('hide');
				$("#messagenotsent").modal(); 
			}
		};
	
	// Below are the regular profile person functions
	self.personDetails = function(callback) {		
			callback = typeof (callback) == "function" ? callback : self._personDetailsCallback;
			
			// begin
			var Info = {
				ACTION: 'details',
				SESSION: $('#session').val(),
				JSON: ko.toJSON( {userID: $('#profileid').val()} )
			};
	
			$.ajax({
				url: '../../json/profileperson.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._personDetailsCallback = function(data) {
			self.person(new Core.Model.UserDetails(data[0]));			
		};
		
	self.personSkills = function(callback) {
			callback = typeof (callback) == "function" ? callback : self._personSkillsCallback;
			
			// begin
			var Info = {
				ACTION: 'skills',
				SESSION: $('#session').val(),
				JSON: ko.toJSON( {userID: $('#profileid').val()} )
			};
	
			$.ajax({
				url: '../../json/profileperson.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		
		};
		
	self._personSkillsCallback = function(data) {
		self.skillList(data);		
		};
		
	self.personDetails();
	self.personSkills();
	self.getMessageList();
};

