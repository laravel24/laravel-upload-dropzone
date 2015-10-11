@extends('master')

@section('content')

<style type="text/css">
	#game-images img{
		width: 240px;
		height: 160px;
		border: 2px solid black;
		margin-bottom: 10px;
	}
	#game-images ul{
		margin: 0;
		padding: 0;
	}	
	#game-images li{
		margin: 0;
		padding: 0;
		list-style: none;
		float: left;
		padding-right: 10px;
	}
</style>

	<div class="row">
		<div class="col-md-12">
			<h1>{{ $game->name }}</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div id="game-images">
				<ul>
					@foreach($game->images as $image)
						<li>
							<a href="{{ url($image->file_path) }}" target="_blank" data-lightbox="mylightbox">
								<img src="{{ url('/gallery/images/thumbs/'.$image->file_name) }}" alt="">
							</a>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('image/do-upload') }}" class="dropzone" id="addImages">
				{{ csrf_field() }}
				<input type="hidden" name="game_id" value="{{ $game->id }}">
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<a href="{{ url('game/list') }}" class="btn btn-primary">Back</a>
		</div>
	</div>
@endsection