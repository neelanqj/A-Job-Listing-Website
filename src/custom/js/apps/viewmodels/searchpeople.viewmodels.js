// JavaScript Document
Core.ViewModel.PeopleSearch = function() {
	var self = this;
	self.skillList = ko.observableArray();
	self.careerLvl = ko.observable();
	self.education = ko.observable();
	self.peopleList = ko.observableArray();
	self.totalpages = ko.observable(1);
	self.pagenum = ko.observable(1);
	self.perpage = ko.observable(10);
	
	self.setPage = function(target, callback) {
		self.pagenum(target);		
		self.searchPeople(target, self._searchPeopleCallback2);
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
	
	self.searchPeople = function(target, callback) {		
			callback = typeof (callback) == "function" ? callback : self._searchPeopleCallback;

			// begin
			var Info = {
				ACTION: 'search',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress'),
								skillList: self.skillList(),
								careerLvl: self.careerLvl(),
								education: self.education(),								
								filter: '',
								pagenum: self.pagenum(),
								perpage: self.perpage()})
			};
	
			$.ajax({
				url: '../../json/searchpeople.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._searchPeopleCallback = function(data) {
		self.searchPeopleCount();
		self.peopleList(data);
		};
		
	self._searchPeopleCallback2 = function(data) {
		self.peopleList(data);
		};
		
	self.searchPeopleCount = function(target, callback) {		
			callback = typeof (callback) == "function" ? callback : self._searchPeopleCountCallback;

			// begin
			var Info = {
				ACTION: 'count',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress'),
								skillList: self.skillList(),
								careerLvl: self.careerLvl(),
								education: self.education(),								
								filter: '',
								pagenum: self.pagenum(),
								perpage: self.perpage()})
			};
	
			$.ajax({
				url: '../../json/searchpeople.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	self._searchPeopleCountCallback = function(data) {
		self.totalpages(parseInt(data[0].count));
		};
				
		
	self.addSkill = function() {
			// returns the first element that doesn't have a name.
			emptySkill = ko.utils.arrayFirst(self.skillList(), function (skill) {
				if (skill.skillname() == '')
					return true;
				else
					return false;
			});
			
			if (self.skillList().length > 0 && emptySkill != null) {
				alert("Please fill in all blank skill descriptions before adding a new skill option.");		
			}
			else {
				self.skillList.push(new Core.Model.Skill());
			}
		};
		
	self.removeSkill = function(skill) {
		self.skillList.remove(skill);		
		};
		
};

