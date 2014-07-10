<h3>{{model.task.name}}</h3>

<select ng-model="assignedUser" ng-options="user.name for user in model.users"></select><br>

<p>
	{{model.task.message}}
</p>
