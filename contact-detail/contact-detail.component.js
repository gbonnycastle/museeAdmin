'use strict';

// Register `contactDetail` component, along with its associated controller and template
angular.
  module('contactDetail').
  component('contactDetail', {
    templateUrl: 'contact-detail/contact-detail.template.html',
    controller: ['$http', '$routeParams', 
      function ContactDetailController($http, $routeParams) {
        var self = this;
        $http.get('http://localhost/musee/contacts/' +$routeParams.contactId + '.json').then(function(response) {
			self.contact = response.data.contact;

        });
	  function TextSimpleCtrl($scope) {
		$scope.contact = {
			fullname: 'awesome user'
		};
	  };

      }
	]
  });
