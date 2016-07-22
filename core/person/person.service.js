'use strict';

angular.
  module('core.person').
  factory('Person', ['$resource',
    function($resource) {
      return $resource('localhost\musee\persons\:id.json', {}, {
        query: {
          method: 'GET',
          params: {Id: 'id'},
          isArray: true
        }
      });
    }
  ]);
