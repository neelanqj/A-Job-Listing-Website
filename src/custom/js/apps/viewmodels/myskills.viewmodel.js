Core.ViewModel.MySkills = function() {
	var _self = this;
	_self.skillList = ko.observableArray();
	_self.removeList = ko.observableArray();
	
	_self.loadSkills = function(target, callback) {		
			callback = typeof (callback) == "function" ? callback : _self._loadSkillsCallback;
			
			var Info = {
				ACTION: 'load',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({ui: $('#userID').val(),
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress')})
			};
	
			$.ajax({
				url: '../../json/myskills.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	_self._loadSkillsCallback = function(data) {
		//_self.skillList(data);	
		ko.mapping.fromJS(data, 
						  { create: function(elements) { return new Core.Model.Skill(elements.data) } 
						   }, _self.skillList);
		};
		
	_self.setSkills = function(target, callback) {		
			callback = typeof (callback) == "function" ? callback : _self._setSkillsCallback;
			
			var Info = {
				ACTION: 'setSkills',
				SESSION: $('#session').val(),
				JSON: ko.toJSON({
								email: $.cookie('email'),
								passcode: $.cookie('passcode'),
								ipaddress: $.cookie('ipaddress'),
								skillList: _self.skillList(),
								removeList: _self.removeList()})
			};
	
			$.ajax({
				url: '../../json/myskills.json.php',
				data: Info,
				dataType: 'json',
				type: "post",
				success: callback
			});
		};
		
	_self._setSkillsCallback = function(data) {
		alert('Changes Applied');
	}
		
	_self.addSkill = function() {
			emptySkill = ko.utils.arrayFirst(_self.skillList(), function (skill) {												 
				if (skill.skillname() == '')
					return true;
				else
					return false;
			});
			
			if (_self.skillList().length > 0 && emptySkill != null) {
				alert("Please fill in all blank skill descriptions before adding a new skill option.");		
			}
			else {
				_self.skillList.push(new Core.Model.Skill());
			}
		};
		
	_self.removeSkill = function(skill) {
		_self.removeList.push(new Core.Model.Skill(skill));
		_self.skillList.remove(skill);
		};
		
	_self.loadSkills();
};

