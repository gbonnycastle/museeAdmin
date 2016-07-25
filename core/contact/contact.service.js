'use strict';

angular.
  module('core.contact').
  factory('Contact', ['$resource',
    function($resource) {
      return $resource('contacts/:id.json', {id:'@id'}, {
        query: {
          method: 'GET',
		  isArray: true
        }
      });
    }
  ]);
