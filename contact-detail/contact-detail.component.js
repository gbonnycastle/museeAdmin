'use strict';

// Register `contactDetail` component, along with its associated controller and template
angular.
  module('contactDetail').
  component('contactDetail', {
    templateUrl: 'contact-detail/contact-detail.template.html',
    controller: ['$routeParams', 'Contact',
      function ContactDetailController($routeParams, Contact) {
        var self = this;
		self.contact = Contact.get({id: $routeParams.contactId});
	  }
	]
  });
