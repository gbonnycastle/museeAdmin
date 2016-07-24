'use strict';

angular.
  module('core.contact').
  factory('Contact', ['$resource',
    function($resource) {
      return $resource('localhost\musee\contacts\:id.json', {}, {
        query: {
          method: 'GET',
          params: {Id: 'id'},
          isArray: true
        }
      });
    }
  ]);
