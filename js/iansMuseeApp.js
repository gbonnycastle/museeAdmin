angular.module('museeApp', [])
    .controller('museeController', [ '$scope', '$http', function($scope, $http) {
         $scope.displayType = 'list';

         $scope.loadPersons = function() {
             $http.get('/musee/persons.json').then(function(response) {
                 $scope.persons = response.data.persons;
             });
         }

         $scope.loadPersons();

         $scope.displayPerson = function(id) {
             $scope.displayType = "loading";

             $http.get('/musee/persons/' + id + '.json').then(function(response) {
                 $scope.person = response.data.person;

                 $scope.displayType = "person";
             });
         }

         $scope.mainList = function() {
             $scope.displayType = "list";
         }
    }]);
