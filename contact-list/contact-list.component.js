'use strict';

// Register `contactList` component, along with its associated controller and template
angular.
  module('contactList').
  component('contactList', {
    templateUrl: 'contact-list/contact-list.template.html',
    controller: ['Contact',
		function ContactListController(Contact) {
			this.contacts = Contact.query();
            this.orderProp = 'sortname';
		}
      ]
  });
