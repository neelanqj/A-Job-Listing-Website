Core.Model.Message = function(obj) {
	var self = this;
	obj || (obj = {});
	
	self.title = ko.observable(obj.title || '');
	self.message = ko.observable(obj.message || '');
	self.messageid = ko.observable(obj.mid || '');	
	self.createdate = ko.observable(obj.createdate || '');
	self.revisedate = ko.observable(obj.revisedate || '');
};

