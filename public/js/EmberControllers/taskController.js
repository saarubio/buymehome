Tasks.TasksCreateController = Ember.ArrayController.extend({

    actions: {
        createNewTask: function () {
            var task_name = this.get('task_name').trim();
            if(!task_name || this.get('task_name').trim() == "") 
            {
                alert("שם משימה לא תקין");
                return;
            }
            tasks = this.store.createRecord('task', {
                name: task_name,
                done: false
            });
            tasks.save();
            this.set('task_name', '');
            this.transitionTo('tasks');
        },
    },
});

Tasks.TaskController = Ember.ObjectController.extend({

    done: function(key, value)
    {
        var task = this.get('model');
        if(typeof(value) == "boolean")
        {
             task.set(key, value);
             task.save();
             return value; 
         }
         return task.get('done');

    }.property('model.done')
    
});

Tasks.TasksIndexController = Ember.ArrayController.extend({
    current_record:{},
    actions: {
        DeleteTask: function (record) {
            record.deleteRecord()
            record.save();
        },
        Edit: function(record) {

            current_record = record;
        },
        focusOutInput: function(aaa) {
            current_record.save();
        }
    },
});
