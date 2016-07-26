'use strict';

		
// Register `contactDetail` component, along with its associated controller and template
angular.
  module('contactDetail').
  component('contactDetail', {
    templateUrl: 'contact-detail/contact-detail.template.html',
    controller: ['$routeParams', 'Contact',
      function ContactDetailController($routeParams, Contact) {
        var self = this;
		
		// GET Contact data from server
		self.contact = Contact.get({id: $routeParams.contactId}, function(contact){
			self.setModel(contact.contact);
			self.setFormData(contact.contact);
		});
		
		self.setModel = function setModel(contact){
			// extra copy - might be useful???
			self.m = contact;
		}
		
		self.setFormData = function setFormData(contact){
			// copy returned data into form control variables
			self.f = contact;
			
			// initialize state of locators (hide edit controls)
			for( var i = 0; i < self.f.locators.length; i++) {
				self.editLocators[i] = false;
			}
		} 
		
		self.showEdit= function showEdit(element){
			element = true;
		}
		self.locDescOptions = [
		  { 'id':1, 'name':'Main' }, 
		  { 'id':2, 'name':'Office' },
		  { 'id':3, 'name':'Home' }
		];
		
	  } // function ContactDetailController
	] // controller
  }); // component
