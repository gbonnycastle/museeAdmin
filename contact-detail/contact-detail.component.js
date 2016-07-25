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
			self.m = contact;
		}
		
		self.setFormData = function setFormData(contact){
			self.f = contact;
		} 
		
		self.toggle = function toggle(state){
			state = !state;
		}

		self.locDescOptions = [
		  { 'id':1, 'name':'Main' }, 
		  { 'id':2, 'name':'Office' },
		  { 'id':3, 'name':'Home' }
		];
		
//		self.display = element(b.css('div.display'));
		
/*		it('should check ng-show / ng-hide', function(){
			expect(edit.isDisplayed()).toBeFalsy();
			expect(display.isDisplayed()).toBeTruthy();
			
			element(by.model('checked')).click();
			
			expect(edit.isDisplayed()).toBeTruthy();
			expect(display.isDisplayed()).toBeFalsy();
			
		}); */
	  } // function ContactDetailController
	] // controller
  }); // component
