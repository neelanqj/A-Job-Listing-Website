// JavaScript Document
Core.Model.UserDetails = function(obj) {
	var self = this;
	obj || (obj = {});
	self.country = ko.observable(obj.country || '-1');
	self.province = ko.observable(obj.province || '-1');
	self.state = ko.observable(obj.state || '-1');
	
	self.region = ko.computed(function() {
			if (self.country() == '1') {
				return self.province();	
			} else if (self.country() == '2') {
				return self.state();	
			} else {
				return '-1';
			}
		});
	
	self.email = ko.observable(obj.email || '');
	self.password = ko.observable(obj.password || '');
	self.password2 = ko.observable(obj.password2 || '');
	self.phone = ko.observable(obj.phone || '');
	self.firstName = ko.observable(obj.firstName || '');
	self.lastName = ko.observable(obj.lastName || '');

	self.postalCode = ko.observable(obj.postalCode || '');

	
	self.city = ko.observable(obj.city || '');
	self.careerLvl = ko.observable(obj.careerLvl || '-1');
	self.education = ko.observable(obj.education || '-1');
};

Core.Model.User = function(obj) {
	var self = this;
	obj || (obj = {});
	
	self.email = ko.observable(obj.email || '');
	self.password = ko.observable(obj.password || '');
};

Core.Model.Skill = function(obj) {
	var self = this;
	obj || (obj = {});
	
	self.lastused = ko.observable(obj.lastused || '0');
	self.skillname = ko.observable(obj.skillname || '');
	self.experience = ko.observable(obj.experience || '1');	
};