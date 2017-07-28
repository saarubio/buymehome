/* global Ember Object */

window.Tasks= Ember.Application.create({ rootElement:"#tasks-app"});

Tasks.Router.map(function () {
    this.resource('tasks', { path : '/'}, function () {
        this.route('create',{path: '/create/'});
    });
});

Tasks.TasksIndexRoute = Ember.Route.extend({
	model: function () {
        return this.store.find('task');
    }
});






