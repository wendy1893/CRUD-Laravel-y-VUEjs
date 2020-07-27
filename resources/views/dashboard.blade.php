@extends('app')

@section('content')

	<div class="col-xs-12 page-header mt-4 text-center">
		<h1>CRUD Laravel y VUEjs</h1>
		<hr>
	</div>

	<div id="crud" class="row">
		<div class="col-sm-7">
			<h2>Listado de Tareas 
				<a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#create">Nueva tarea</a>
			</h2>
			
			<table class="table table-over table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Tarea</th>
						<th colspan="2">
							&nbsp;
						</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="keep in keeps">
						<td width="10px">@{{ keep.id }}</td>
						<td>@{{ keep.keep }}</td>
						<td width="10px">
							<a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editKeep(keep)">Editar</a>
						</td>
						<td width="10px">
							<a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteKeep(keep)">Eliminar</a>
						</td>
					</tr>
				</tbody>
			</table>

			<nav>
				<ul class="pagination">
					<li v-if="pagination.current_page > 1" class="page-item">
						<a href="#" @click.prevent="changePage(pagination.current_page - 1)" class="page-link">
							<span>Atrás</span>
						</a>
					</li>

					<li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']" class="page-item">
						<a href="#" @click.prevent="changePage(page)" class="page-link">
						 @{{ page }}
						</a>
					</li>
					
					<li  v-if="pagination.current_page < pagination.last_page" class="page-item">
						<a href="#" @click.prevent="changePage(pagination.current_page + 1)" class="page-link">
							<span>Siguiente</span>
						</a>
					</li>
				</ul>
			</nav>

			@include('create')
			@include('edit')
		</div>

		<div class="col-sm-5 bg-light">
			<pre>
				@{{ $data }}
			</pre>
		</div>

	</div>

@endsection