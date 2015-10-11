<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Game;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

/**
* 
*/
class GameController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function viewGameList(){
		$games = Game::where('created_by',Auth::user()->id)->get();

		return view('game.game')
			->with('games', $games);
	}

	public function saveGame(Request $request){
		//validate
		$validator = Validator::make($request->all(),[
			'game_name' => 'required|min:3',
		]);

		if($validator->fails()){
			return redirect('game/list')
				->withErrors($validator)
				->withInput();
		}

		$game 			  = new Game;
		$game->name 	  = $request->input('game_name');
		$game->created_by = Auth::user()->id;
		$game->published  = 1;
		$game->save();

		return redirect()->back();
	}

	public function viewGamePics($id){
		$game = Game::findOrFail($id);

		return view('game.game-view')
			->with('game',$game);
	}

	public function doImageUpload(Request $request){
		$file     = $request->file('file');
		$filename = uniqid().$file->getClientOriginalName();

		if(!file_exists('gallery/images')){
			mkdir('gallery/images',0777,true);
		}
		$file->move('gallery/images',$filename);

		if(!file_exists('gallery/images/thumbs')){
			mkdir('gallery/images/thumbs',0777,true);
		}

		$thumb = Image::make('gallery/images/'.$filename)
				 	->resize(240,160)
				 	->save('gallery/images/thumbs/'.$filename,50);

		$game  = Game::find($request->input('game_id'));
		$image = $game->images()->create([
			'game_id'    => $request->input('game_id'),
			'file_name'  => $filename,
			'file_size'  => $file->getClientSize(),
			'file_mime'  => $file->getClientMimeType(),
			'file_path'  => 'gallery/images/'.$filename,
			'created_by' => Auth::user()->id
		]);

		return $image;
	}

	public function delete($id){
		$current = Game::findOrFail($id);

		if($current->created_by != Auth::user()->id){
			abort('403','You are not allowed to delete this game');
		}

		$images = $current->images();

		foreach ($current->images as $value) {
			unlink(public_path($value->file_path));
			unlink(public_path('gallery/images/thumbs/'.$value->file_name));
		}

		$images->delete();
		$current->delete();

		return redirect()->back();
	}
}