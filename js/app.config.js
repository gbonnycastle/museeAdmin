'use strict';

angular.
  module('museeAdmin').
  config(['$locationProvider' ,'$routeProvider',
    function config($locationProvider, $routeProvider) {
      $locationProvider.hashPrefix('!');

      $routeProvider.
        when('/persons', {
          template: '<person-list></person-list>'
        }).
        when('/person/:personId', {
          template: '<person-detail></person-detail>'
        }).
		when('/contacts', {
          template: '<contact-list></contact-list>'
        }).
        when('/contact/:contactId', {
          template: '<contact-detail></contact-detail>'
        }). 
        otherwise('/contacts');
    }
  ]);
