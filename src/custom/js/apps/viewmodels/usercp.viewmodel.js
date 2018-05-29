Core.ViewModel.UserCP = function() {
	var self = this;
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
};

