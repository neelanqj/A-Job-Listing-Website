var VM = {};

VM = new Core.ViewModel.JobSearch();

// Initialize the knockout function
ko.applyBindings(VM);

VM.searchJobs();