Core.ViewModel.MessageCP = function() {
	var self = this;
	
	self.createMessageObj = new Core.Model.Message();
	self.editMessageObj = ko.observable(new Core.Model.Message());
	self.viewMessageObj = ko.observable(new Core.Model.Message());
	self.selectedItem = ko.observable();
	self.messageList = ko.observableArray();
	self.existMessages = ko.observable(true);
	
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
		(self.messageList().length == 0)?self.existMessages(false):self.existMessages(true);
		};
	
	self.createMessage = function(target, callback) {		
			callback = typeof (callback) == "function" ? callback : self._createMessageCallback;
			
			var Info = {
				ACTION: 'createmessage',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({userid: $('#userID').val(),
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress'),
								title: self.createMessageObj.title(),
								message: self.createMessageObj.message()})
			};
	
			$.ajax({
				url: '../../json/messagecp.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
		
	self._createMessageCallback = function(data) {	
		$("#newmessage").modal('hide');
		$("#operationsuccess").modal('show');
		self.getMessageList();
		if (data[0].success == '1') $("#operationsuccess").modal('show'); else $("#operationfail").modal('show');	
		};
	
	self.viewEditMessage = function(target,callback) {
		callback = typeof (callback) == "function" ? callback : self._viewEditMessageCallback;
		self.viewMessage(null, callback);
		};
	
	self.editMessage = function(target, callback) {		
			callback = typeof (callback) == "function" ? callback : self._editMessageCallback;
			
			var Info = {
				ACTION: 'editmessage',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({userid: $('#userID').val(),
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress'),
								title: self.editMessageObj().title(),
								message: self.editMessageObj().message(),
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
		
	self._editMessageCallback = function(data) {
		$("#editmessage").modal('hide');
		self.getMessageList();
		if (data[0].success == '1')  $("#operationsuccess").modal('show'); else $("#operationfail").modal('show');
		};
		
	self.deleteMessage = function(target, callback) {		
			callback = typeof (callback) == "function" ? callback : self._deleteMessageCallback;
			
			var Info = {
				ACTION: 'deletemessage',
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
		
	self._deleteMessageCallback = function(data) {
		self.getMessageList();
		if (data[0].success == '1')  $("#operationsuccess").modal('show'); else $("#operationfail").modal('show');
		};
		
	self.viewMessage = function(target, callback) {		
			callback = typeof (callback) == "function" ? callback : self._viewMessageCallback;
			
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
		
	self._viewMessageCallback = function(data) {
		self.viewMessageObj(new Core.Model.Message(data[0]));
		$('#viewmessage').modal('show');
		};
		
	self._viewEditMessageCallback = function(data) {
		self.editMessageObj(new Core.Model.Message(data[0]));
		$('#editmessage').modal('show');
		};

	self.getMessageList();
};

