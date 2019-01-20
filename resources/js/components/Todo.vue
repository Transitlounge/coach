<template>
	<ul id="task-list" class="row flex-column">

		<!-- <form v-on:submit.prevent="addNewTodo">
			<label for="new-todo">Add a todo</label>
			<input id="new-todo" 
						v-model="newTodoText"
						placeholder="E.g. Feed the cat"
			>
			<button>Add</button>
		</form> -->

		<!-- <form>
			<ul class="list-group">
				<li class="list-group-item" 
						v-for="(task, i) in tasks" 
						:key="task.id" 
						spellcheck=false
				>
				{{ task.id }}
					<input type="text"
								v-model="task.name"
								@keyup.enter = "saveTask(task)"
					>

					<i class="material-icons" @click.stop="saveTask(task)">done</i>

					<button type="button" class="close float-right" aria-label="Close"  v-on:click="removeTask(i)">
						<span aria-hidden="true">&times;</span>
					</button>

				</li>
			</ul>
		</form> -->

		<task :task="task" v-for="task in tasks" :key="task.id"></task>
		
	</ul>
</template>

<script>
export default {
	props: {
		tasksData: Array
	},
	data () {
		return {	
			tasks: this.tasksData,
			newTodoText: '',
			tempInputValue: ''
		}
	},
		mounted() {
		// console.log(this.tasks)
	},
	computed: {
		updatedItem() {

		}
	},
	watch: {

	},
	methods: {
		addNewTodo: function () {
			this.tasks.push({
				name: this.newTodoText
			})
			this.newTodoText = ''
		},
		removeTask(index) {
			this.tasks.splice(index, 1)
		},
		updateTask(index) {
			console.log('updated')
		},
		saveTask(newTaskValue) {
			console.log('saved', newTaskValue.name)

      axios.put(`/api/tasks/${newTaskValue.id}`, { 
          name: newTaskValue.name
			})
			

		}
	}


}
</script>



<style>
ul#task-list {
	list-style-type: none;
	margin: 0;
	padding: 0;
}
/* ul li.list-group-item {
	margin: 0;
	padding: .3rem;
}

ul li.list-group-item input {
	border: none;
	padding: .2rem .3rem;
	width: 90%;
}

button:focus {outline:0;} */

</style>

