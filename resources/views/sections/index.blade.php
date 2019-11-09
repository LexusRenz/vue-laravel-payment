<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id='app'>
	Select Section:
	<select name="" id="" v-on:change='fetchStudents()' v-model='selected_section'>
		@foreach($sections as $section)
		<option value="{{ $section->id }}">{{ $section->name }}</option>
		@endforeach
	</select>
</br></br>
	Paid Students:
	<ul name="" id="">
		<li v-for="student in paid_students" >@{{ student.first_name+" "+student.last_name }}</li>
	</ul>

	Unpaid Students:
	<ul name="" id="">
		<li v-for="student in unpaid_students" >@{{ student.first_name+" "+student.last_name }}</li>
	</ul>
</div>
</body>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
	var vm = new Vue ({
		el: '#app',
		data: {
			selected_section: '',
			student: [],
			
		},
		methods: {
			fetchStudents(){
				axios.get('/students?section_id='+this.selected_section).then(({data}) => 
				    {
                    this.student = data
					console.log(data);
				});
			}
		},
		mounted(){
			axios.get('/students').then(({data}) =>{
				console.log(data)
			});
		},
		computed:{
			paid_students(){
				return this.student.filter(function(student){
					return student.date_paid != null;
				});x
			},
			unpaid_students(){
				return this.student.filter(function(student){
					return student.date_paid == null;
				});
			}
		}
	})

</script>

</html>