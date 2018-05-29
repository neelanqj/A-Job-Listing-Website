// JavaScript Document
Core.ViewModel.JobSearch = function() {
	var _self = this;
	_self.jobList = ko.observableArray();
	_self.searchLocation = ko.observable();
	_self.searchSkills = ko.observable();
	_self.totalpages = ko.observable(1);
	_self.pagenum = ko.observable(1);
	_self.perpage = ko.observable(10);
	
	_self.setPage = function(target, callback) {
		_self.pagenum(target);		
		_self.searchJobs(target, _self._searchJobsCallback2);
	}
	
	_self.prevPage = function(target, callback) {
		if (_self.pagenum() > 1) {
			_self.pagenum(_self.pagenum() - 1) ;
			_self.setPage(_self.pagenum());
		}
	}
	
	_self.nextPage = function(target, callback) {
		if (_self.pagenum() < _self.totalpages()) {
			_self.pagenum(_self.pagenum() + 1) ;
			_self.setPage(_self.pagenum());
		}		
	}
	
	_self.searchJobs = function(target, callback) {		
			callback = typeof (callback) == "function" ? callback : _self._searchJobsCallback;
			
			// begin
			var Info = {
				ACTION: 'search',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({skills: _self.searchSkills(),
								location: _self.searchLocation(),
								filter: '',
								pagenum: _self.pagenum(),
								perpage: _self.perpage()})
			};
	
			$.ajax({
				url: '../../json/searchjobs.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	_self._searchJobsCallback = function(data) {
		_self.searchJobsCount();
                data.forEach(function(elem) {
                   elem.description = elem.description.replace(/<\/?[^>]+(>|$)/g, "");
                });
		_self.jobList(data);
		};
		
	_self._searchJobsCallback2 = function(data) {
		_self.jobList(data);
		};
	
	_self.searchJobsCount = function(target, callback) {		
			callback = typeof (callback) == "function" ? callback : _self._searchJobsCountCallback;
			
			// begin
			var Info = {
				ACTION: 'count',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({skills: _self.searchSkills(),
								location: _self.searchLocation(),
								filter: '',
								pagenum: _self.pagenum(),
								perpage: _self.perpage()})
			};
	
			$.ajax({
				url: '../../json/searchjobs.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	_self._searchJobsCountCallback = function(data) {
		_self.totalpages(parseInt(data[0].count));
		};
	
	_self.onEnter = function(data, event) {
			var keyCode = (event.which ? event.which : event.keyCode);
			if (keyCode === 13) {
				_self.searchJobs();
				return false;
			}
			return true;
		};

};

