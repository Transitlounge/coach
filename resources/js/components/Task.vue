<template>
	<li class="form-row">
		<!-- task name input field -->
		<div class="form-group col-9">
			<label for="task-name" class="sr-only">Task Name</label>
			<input type="text"
						name="name"
						id="task-name"
						class="form-control" 
						autocomplete="off"
						v-model="task.name"
						@keyup.enter="save(task)" 
			/>
		</div>
		<div class="form-group col-1">
			<!-- Icon to save changes -->
			<i class="material-icons icon icon-save"
				v-if="status != 'saved'"
				@click.stop="save(task)" 
				v-bind:class="[ status ]"
			>save</i>
			<v-progress-circular
				v-if="status == 'saved'"
				:size="24"
				:width="2.5"
        indeterminate
        color="primary"
      ></v-progress-circular>
			<!-- Icon to undo changes -->
			<i class="material-icons icon" 
				v-bind:class="{ undo: task.undo }"
				@click.stop="task.name = newTaskName = task.undo" 
			>undo</i>



		</div>

		<!-- <div class="form-group col-1">
			<i class="material-icons icon" 
				v-if="task.undo && status != 'saved'"
				@click.stop="task.name = newTaskName = task.undo" 
			>undo</i>
		</div> -->
		<!-- Icon the delete the task -->
		<div class="form-group col-2">
			<i class="material-icons icon icon-close">close</i>
		</div>
		<!-- Some extra info -->
		<!-- <div class="form-group col-2">
			<span v-if="status">task is {{ status }}</span>
		</div> -->

		<!-- <i class="material-icons icon">done</i> -->
	</li>

</template>

<script>
	export default {
		props: ['task'],
		data () {
			return {
				taskName: this.task.name,
				newTaskName: '',
				status: '',
				previousTask: ''
			}
		},
		watch: {
			task: {
				handler: function(newTask) {
					if( newTask.name !== this.taskName ) {
						this.newTaskName = newTask.name
						this.status = 'updated'
						newTask.undo = this.taskName
					} else {
						this.status = newTask.undo = ''
					}
				},
				deep: true				
			}
		},
		methods: {
			save(task) {
				if( task.name !== this.taskName ) {
					this.status = 'saved'

					// lets remove the status after a few sec
					setTimeout( () => (this.status = ''), 700)

					this.taskName = task.name

					// save in to the database //
					axios.put(`/api/tasks/${task.id}`, { 
							name: task.name
					})		
				} else if( this.status == 'saved') {
					// in nothing changed, remove the status
					this.status = ''
				}
			}
		}
	}
</script>

<style>

#task-list .form-row {
	background-color: rgba(233, 233, 233, 0.493);
	padding: .5rem;
	margin: 0 0 .5rem 0;
}

#task-list .form-control {
	margin-right: .5rem;
}

#task-list .form-group {
	padding: 0;
	margin: 0;
	/* text-align: center; */
  display: flex;
  align-items: center;
  /* justify-content: center; */
}
/* #task-list {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.task-item {
	margin: 1rem;
	padding: .7rem;
	border: 1px solid rgb(182, 182, 182);
	border-radius: 4px;
	background: rgb(214, 214, 214);
	vertical-align:middle;
}

.task-item-field {
	margin: 0;
	padding: .2rem .5rem;
	border: 1px solid silver;
	border-radius: 3px;
} */

.icon {
	cursor: pointer;
	padding: 0;
	margin: 0 .3rem 0 0;
	vertical-align: middle;
	color: silver;
}

.icon.updated {
		color: rgb(10, 100, 185);
}

.icon.undo {
		color:inherit;
}

.icon.saved {
	color: rgb(89, 155, 89);
}

.icon-save {
	color: silver;
}

.icon-close {
	color: rgb(253, 128, 128);
	margin-left: auto;
}

.v-progress-circular {
	margin: 0 .3rem 0 0;
}

</style>