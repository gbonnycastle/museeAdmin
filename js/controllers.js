as.controller('PostListCtrl', function($scope, $rootScope, $http, $location) {
        var load = function() {
            console.log('call load()...');
            $http.get($rootScope.appUrl + '/posts.json')
                    .success(function(data, status, headers, config) {
                        $scope.posts = data.posts;
                        angular.copy($scope.posts, $scope.copy);
                    });
        }

        load();

        $scope.addPost = function() {
            console.log('call addPost');
            $location.path("/new-post");
        }

        $scope.editPost = function(index) {
            console.log('call editPost');
            $location.path('/edit-post/' + $scope.posts[index].Post.id);
        }

        $scope.delPost = function(index) {
            console.log('call delPost');
            var todel = $scope.posts[index];
            $http
                    .delete($rootScope.appUrl + '/posts/' + todel.Post.id + '.json')
                    .success(function(data, status, headers, config) {
                        load();
                    }).error(function(data, status, headers, config) {
            });
        }

});