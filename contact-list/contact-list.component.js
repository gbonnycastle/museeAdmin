'use strict';

// Register `contactList` component, along with its associated controller and template
angular.
  module('contactList').
  component('contactList', {
    templateUrl: 'contact-list/contact-list.template.html',
    controller: function ContactListController($http) {
        var self = this;
        self.orderProp = 'sortname';
		self.orgProp = {org:0};
			
$http.get('http://localhost/musee/contacts.json').then(function(response) {
			self.contacts = response.data.contacts;
		});
      }
  });
