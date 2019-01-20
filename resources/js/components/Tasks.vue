<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
								<b-card title="Tasks"
												img-src="https://picsum.photos/600/100/?image=11"
												img-alt="Image"
          							img-top
          							tag="article"
								>


									<b-table :items="tasks" 
													 :fields="fields"
													 :dark="dark"
													 :small="small" 
													 striped 
													 hover 
									>
										<template slot="index" slot-scope="data">
      								{{data.index + 1}}
    								</template>
										<template slot="actions" slot-scope="row">
											<!-- <b-link :href="'/tasks/'+task.item.id+'/edit'">edit</b-link> -->
											<b-button size="sm" @click.stop="info(row.item, row.index, $event.target)" class="mr-1">Info modal</b-button>
    								</template>

									</b-table>

									<b-button href="#" variant="primary">Go somewhere</b-button>

								 	<b-form-checkbox v-model="dark">Dark</b-form-checkbox>
									<b-form-checkbox v-model="small">Small</b-form-checkbox>



						<table>
							<th v-for="(task, key) in tasks[0]" :key="key.id">{{ key }}</th>
							<tr v-for="task in tasks" :key="task.id">
								<td v-for="t in task" :key="t.id">{{ t }}</td>
							</tr>
							<!-- <tr v-for="task in tasks" :key="task.id" >
								<td>{{ task.id }}</td>
								<td>{{ task.user.id }}</td>
								<td>{{ task.name }}</td>
								<td>{{ task.description }}</td>
								<td>{{ task.created_at }}</td>
								<td>{{ task.updated_at }}</td>
								<td>{{ task.user.name }}</td>
							</tr> -->
						</table>		

								</b-card>

							<!-- Info modal -->
							<b-modal id="modalInfo" @hide="resetModal" :title="modalInfo.title" ok-only>
								<pre>{{ modalInfo.content }}</pre>
								<!-- Task Name -->
								<div class="form-group col">
									<label for="task-name" class="sr-only">Task Name</label>
									<input type="text" name="name" id="task-name" class="form-control" :value="modalInfo.data.name" >
								</div>
							<!-- Task Description -->
							<div class="form-group col">
									<label for="task-description" class="sr-only">Task description</label>
									<input type="text" name="description" id="task-description" class="form-control" :value="modalInfo.data.description">
								</div>
							</b-modal>

            </div>

        </div>
    </div>
</template>

<script>
    export default {
			props: ['tasks-data'],
			data() {
				return {	
					// tasks: [],
					tasks: this.tasksData,
					fields: [
						{ 
							key: 'id',
							sortable: true
						},
						{
							key: 'name',
							label: 'Task name',
							sortable: true
						},
						{
							key: 'description',
							sortable: false,
							//variant: 'danger'
						},
						{
							key: 'user.name',
							label: 'Creator',
							sortable: false,
						},
						'index',
						'actions'
					],
					dark: false,
					small: true,
					modalInfo: { title: '', content: '', data: '' }
				};
			},
			computed: {
				// cleanTasks: function () {}
			},
			created() {
				// axios.get('/api/tasks').then((response) => {
				// 		this.tasks = response.data;
				// 		console.log(window.App);
				// 	});
				console.log(this.tasks)
			},
			methods: {
				info (item, index, button) {
					this.modalInfo.title = `Row index: ${index}`
					this.modalInfo.content = JSON.stringify(item, null, 2)
					this.modalInfo.data = item
					this.$root.$emit('bv::show::modal', 'modalInfo', button)
				},				
				resetModal () {
					this.modalInfo.title = ''
					this.modalInfo.content = ''
				}

			}
    }
</script>
<style>
table { margin-top:1rem;}
table th,
table td {
	border: 1px solid silver;
	padding: 1rem;
}
</style>