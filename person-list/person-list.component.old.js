'use strict';

// Register `personList` component, along with its associated controller and template
angular.
  module('personList').
  component('personList', {
    templateUrl: 'person-list/person-list.template.html',
    controller: function PersonListController($http) {
        var self = this;
        self.orderProp = 'sortname';
		$http.get('localhost:8765/persons.json').then(function(response) {
			self.persons = response.data;
		});
      }
  });
