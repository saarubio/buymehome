//models
Tasks.Task = DS.Model.extend({
    name: DS.attr('string'),
    done: DS.attr('boolean')
});