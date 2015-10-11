@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>My Games</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
			@if ($games->count() > 0)
				<table class="table table-striped table-bordered table-responsive">
					<thead>
						<tr class="info">
							<th>Name of the game</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($games as $game)
							<tr>
								<td>{{ $game->name }}
									<span class="pull-right">{{ $game->images()->count()}}</span>
								</td>
								<td>
									<a href="{{ url('game/view/'.$game->id) }}">view</a> / 
									<a href="{{ url('game/delete/'.$game->id) }}">delete</a>
								</td>	
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
		</div>

		<div class="col-md-4">
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<form class="form" method="POST" action="{{ url('game/save') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<div class="form-group">
					<input type="text" name="game_name" id="game_name" placeholder="Name of the game" class="form-control" value="{{ old('game_name') }}">
				</div>

				<button class="btn btn-primary">Save</button>
			</form>
		</div>
	</div>
@endsection