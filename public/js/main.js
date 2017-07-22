/* global Ember Object */

window.Tasks= Ember.Application.create({ rootElement:"#tasks-app"});

Tasks.Router.map(function () {
    this.resource('tasks', { path : '/'}, function () {
        this.route('create',{path: '/create/'});
    });
});
Tasks.TasksCreateRoute= Ember.Route.extend({
    setupController: function () {
    },
	model: function () {
	    return []
	}
});
Tasks.TasksIndexRoute = Ember.Route.extend({
	model: function () {
        return this.store.find('task');
    }
});
Handlebars.registerHelper('count', function (key) {

    bool_flag = (key == 'done') ? true : false;
    var counter = 0;
    var tasks = this.store.filter('task', function (task) {
        if(task.get('done') == bool_flag) counter++;
    });
      return new Handlebars.SafeString(
         "" + counter
      );
});   






