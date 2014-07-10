var app = angular.module('tasknizer', ['ngRoute']);

app.config(['$routeProvider', function($routeProvider) {
	$routeProvider.when('/', {
		templateUrl: 'templates/home.php',
		controller: 'HomeController'
	}).when('/about', {
		templateUrl: 'templates/about.php',
		controller: 'AboutController'
	}).when('/task/:taskId', {
		templateUrl: 'templates/tasks/taskdetail.php',
		controller: 'TaskDetailController'
	});

}]);

app.factory('apiFactory', ['$http', function($http) {
	return {
		getUserTasks: function() {
			return $http.get('api/user-tasks');
		},
		getTask: function($id) {
			return $http.get('api/task/'+$id);
		}
	};
}])

app.controller('HomeController', ['$scope', 'apiFactory', function($scope, apiFactory) {
	$scope.tasks = [];

	apiFactory.getUserTasks().then(function(tasks) {
		$scope.tasks = tasks.data;
	});
}]);

app.controller('TaskDetailController', ['$scope', '$routeParams', 'apiFactory', function($scope, $routeParams, apiFactory) {
	$scope.taskId = $routeParams.taskId;

	apiFactory.getTask($routeParams.taskId).then(function(task) {
		$scope.model = task.data;
		for (var x in task.data.users) {
			if (task.data.users[x].id == task.data.assignedUser.id) {
				$scope.assignedUser = task.data.users[x];
			}
		}
	});
}]);

app.controller('AboutController', ['$scope', function($scope) {
	$scope.data = {
		title: 'About'
	};
}]);