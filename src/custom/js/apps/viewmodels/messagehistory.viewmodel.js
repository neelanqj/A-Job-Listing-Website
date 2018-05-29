Core.ViewModel.MessageHistory = function() {
	var self = this;
	
	self.messageHistoryList = ko.observableArray([]);
	
	self.totalpages = ko.observable(1);
	self.pagenum = ko.observable(1);
	self.perpage = ko.observable(10);
	self.iasloadedpage = ko.observable(1);
	self.pendingRequest = ko.observable(false);
	
	self.viewMessageObj = ko.observable(new Core.Model.Message());
	
	self.viewMessage = function(target, callback) {		
			callback = typeof (callback) == "function" ? callback : self._viewMessageCallback;
			
			var Info = {
				ACTION: 'viewmessage',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({userid: $('#userID').val(),
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress'),
								messageid: target.id})
			};
	
			$.ajax({
				url: '../../json/messagehistory.json.php',
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
	
	self.setPage = function(target, callback) {
		self.pagenum(target);
		self.getMessageHistory(target, self._getMessageHistoryCallback2);
	}
	
	self.prevPage = function(target, callback) {
		if (self.pagenum() > 1) {
			self.pagenum(self.pagenum() - 1) ;
			self.setPage(self.pagenum());
		}
	}
	
	self.nextPage = function(target, callback) {
		if (self.pagenum() < self.totalpages()) {
			self.pagenum(self.pagenum() + 1) ;
			self.setPage(self.pagenum());
		}
	}
	
	self.scrolled = function (data, event) {
		var elem = event.target;
        if (elem.scrollTop > (elem.scrollHeight - elem.offsetHeight - 20)) {
			self.getMessageHistoryIAS(null, self._getMessageHistoryCallback3);
        }		
	}
	
	self.getMessageHistoryIAS = function(target, callback) {		
			callback = typeof (callback) == "function" ? callback : self._getMessageHistoryCallback;
			
			if (self.pagenum() < self.totalpages()) {
				self.pendingRequest(true);
				self.pagenum(self.pagenum() + 1);
				
				var Info = {
					ACTION: 'messagehistory',
					SESSION: $('#session').val(),
					JSON: ko.toJSON({
									userID: $('#userID').val(),
									email: $.cookie('email'),
									passcode: $.cookie('passcode'),
									ipaddress: $.cookie('ipaddress'),
									filter: '',
									pagenum: self.pagenum(),
									perpage: self.perpage()})
				};
		
				$.ajax({
					url: '../../json/messagehistory.json.php',
					data: Info,
					dataType: 'json',
					type: "post",
					success: callback
				});
			
			}
		};
	
	self.getMessageHistory = function(target, callback) {		
			callback = typeof (callback) == "function" ? callback : self._getMessageHistoryCallback;
			self.pendingRequest(true);
			var Info = {
				ACTION: 'messagehistory',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({
								userID: $('#userID').val(),
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress'),
								filter: '',
								pagenum: self.pagenum(),
								perpage: self.perpage()})
			};
	
			$.ajax({
				url: '../../json/messagehistory.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._getMessageHistoryCallback = function(data) {
		self.getMessageHistoryCount();
		self.messageHistoryList(data);
		self.pendingRequest(false);
		};
		
	self._getMessageHistoryCallback2 = function(data) {
		self.messageHistoryList(data);
		self.pendingRequest(false);
		};
		
	self._getMessageHistoryCallback3 = function(data) {
			ko.utils.arrayForEach(data, function(element) {
				self.messageHistoryList.push(element);
			});			
			self.pendingRequest(false);
		};
		
	self.getMessageHistoryCount = function(target, callback) {		
			callback = typeof (callback) == "function" ? callback : self._getMessageHistoryCountCallback;
			
			var Info = {
				ACTION: 'messagehistorycount',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({
								userID: $('#userID').val(),
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress'),
								filter: '',
								pagenum: self.pagenum(),
								perpage: self.perpage()})
			};
	
			$.ajax({
				url: '../../json/messagehistory.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._getMessageHistoryCountCallback = function(data) {
		self.totalpages(Math.ceil(data[0].count))
		};
	
	self.getMessageHistory();
};

