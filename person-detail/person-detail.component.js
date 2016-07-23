'use strict';

// Register `personDetail` component, along with its associated controller and template
angular.
  module('personDetail').
  component('personDetail', {
    templateUrl: 'person-detail/person-detail.template.html',
    controller: ['$http', '$routeParams',
      function PersonDetailController($http, $routeParams) {
        var self = this;
        $http.get('/musee/persons/' +$routeParams.personId + '.json').then(function(response) {
			self.person = response.data.person;

        });

      }
	]
  });
