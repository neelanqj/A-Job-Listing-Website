/* ************************************************************************************************************************ *
 *                                                                                                                          *
 *      Filename: page.js                                                                                           		*
 *      Description: This page contains the base models, collections, and viewmodels common functionality that will be used *
 *                   as the basis for the rest of the system. This was created to minimize code redundancy.                 *
 *      Dependancies:   Knockoutjs                                                                                          *
 *      Developer: Neelan Joachimpillai                                                                                     *
 *                                                                                                                          *
 *      Version control:                                                                                                    *
 *                              Neelan Joachimpillai        Dec 23, 2012        Created file.                               *
 *                                                                                                                          *
 * ************************************************************************************************************************ */

/* ************* Arranges knockout elements ************* */
var Core = {};

Core.Model = {};

Core.ViewModel = {};


/* ************* Framework ************* */
var Guru = {};

Guru.standardMDYFormat = function(jsDate) {
	 var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    return months[parseDate(jsDate).getMonth()] + " " + parseDate(jsDate).getDate() + ", " + parseDate(jsDate).getFullYear();
	};
	
Guru.standardMDFormat = function(jsDate) {
	var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    return months[parseDate(jsDate).getMonth()] + " " + parseDate(jsDate).getDate();
	};
	
/* ************* AJAX Loader Screen Code ************* */
$(document).ajaxStart(function() {
      $( "#loading" ).show();
});

$(document).ajaxStop(function() {
      $( "#loading" ).hide();
});

