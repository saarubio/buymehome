<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tasks Managment</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap-grid.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-flipped.css">
	<link rel="stylesheet" href="/css/main.css">

</head>
<body>
	<div class="container" id="tasks-app" >
	</div>
</body>
</html>

<script type="text/javascript" src="/js/lib/jquery-1.10.2.js"></script>
<script type="text/javascript" src="/js/lib/handlebars-1.1.2.js"></script>
<script type="text/javascript" src="/js/lib/ember-1.4.0.js"></script>
<script src="//builds.emberjs.com/tags/v1.0.0-beta.6/ember-data.min.js"></script>

<script src="/js/main.js"></script>
<script src="/js/EmberModels/TaskModel.js"></script>
<script src="/js/EmberControllers/taskController.js"></script>

<script type="text/x-handlebars" id="tasks">
	<div class="row orange-grad no-margins">
		<h4  class="col-md-6">משימות</h4>
		<div class="col-md-4"></div>
		<div class="col-md-2">
		{{#link-to "tasks.create"}}<div class="icon-box margin-top"><div class="icon icon-plus" ></div></div>{{/link-to}}
		</div>
	</div>
	<div class="small-container">
	 {{outlet}}
	</div>
</div>
</script>


<script type="text/x-handlebars" data-template-name="tasks/index" >
    
    {{#each controller itemController="task"}}
        <div class="row task-row">
        	<div class="col-md-1 no-padding">
        		{{input type="checkbox" class="checkbox" checked=done  }}
        	</div>
        	<div class="col-md-10 no-padding edit-col" {{action 'Edit' this}}>
        		<span>{{id}}. {{input type="text" class="input editable" value=name focus-out="focusOutInput" }}</span>
        		
        	</div>
        	<div class="col-md-1">
        		<div class="icon icon-plus delete"  {{action 'DeleteTask' this}}></div>
        	</div>
        </div>
    {{/each}}	
    <div class='row'>
		<div class="col-md-3">
		 {{opentasks}} לסיום
		</div>
		<div class="col-md-3">
		 {{donetasks}} הושלמו
		</div>
		<div class="col-md-3">
			סה״כ:{{length}}
		</div>
    </div>
</script>

<script type="text/x-handlebars" data-template-name="tasks/create" >

	<form {{action "createNewTask" on="submit"}}>
		<div class="row no-padding">
			<div class="col-md-6"> 
				{{input name="task_name" class="input" placeholder="שם המשימה" value=task_name  }}
			</div>
			<div class="col-md-6">
	  			 <button class="button" type="submit" {{action 'createNewTask'}}  >הוספה</button>
			</div>
		</div>
	</form>
     <p>
        {{#link-to "tasks"}}חזרה לעמוד הראשי{{/link-to}}
    </p>
</script>













