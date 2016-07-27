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
		
		// copy returned data into form control variables
		self.setFormData = function setFormData(contact){
			self.f = contact;
		} 
		
		// extra copy - might be useful for refresh???
		self.setModel = function setModel(contact){
			self.m = contact;
		}
				
		// dummy data in place of RESTful call to load 
		// locator description options.
		self.locDescOptions = [
		  { 'id':1, 'name':'Main' }, 
		  { 'id':2, 'name':'Office' },
		  { 'id':3, 'name':'Home' }
		];
		
		// add new locator element
		self.addLocator = function addLocator(loc_type){
			self.f.locators.push(
				{
					'id': null,
					'contact_id': self.f.id,
					'locator_type': loc_type,
					'description': '',
					'info': '',
					'created': null,
					'modified': null
				}
			)
		}
		
		// remove locator element
		self.delLocator = function delLocator(idx){
			self.f.locators.splice(idx,1);
		}
		
		self.locatorTypes = [
			{'name':'telephone','icon':'glyphicon glyphicon-earphone'},
			{'name':'email',	'icon':'glyphicon glyphicon-envelope'},
			{'name':'address',	'icon':'glyphicon glyphicon-map-marker'},
			{'name':'website',	'icon':'glyphicon glyphicon-globe'},
			{'name':'IM',		'icon':'glyphicon glyphicon-heart-empty'}
		];
		
	  } // function ContactDetailController
	] // controller
  }); // component
