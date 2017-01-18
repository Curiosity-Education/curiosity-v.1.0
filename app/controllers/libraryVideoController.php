<?php
class libraryVideoController extends BaseController{

	function all(){
		$vids = LibraryVideos::where("active", "=", 1)->get();
		return $vids;
	}

	function getByTopic(){
		$data = Input::all();
		$vids = LibraryVideos::where("tema_id", "=", $data["id"])
		->join("profesores_apoyo", "biblioteca_videos.profesor_apoyo_id", "=", "profesores_apoyo.id")
		->select("biblioteca_videos.*", "profesores_apoyo.escuela_id")
		->where("biblioteca_videos.active", "=", 1)
		->where("profesores_apoyo.active", "=", 1)
		->get();
		return $vids;
	}

	function save(){
		$data = Input::all();
		$file = $data['albvid_poster'];
		$rules = array(
			'albvid_poster' => 'required',
			'profesor' => 'required',
			'embed' => 'required',
			'tema' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
		}
		else{
			if ($this->EmbedActiveExist($data['embed'], $data['tema'])){
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
			else{
				$path = public_path()."/packages/assets/media/images/posters/";
				$posterName = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
				$lb = new LibraryVideos();
				$lb->poster = $posterName;
				$lb->embed = $data['embed'];
				$lb->active = 1;
				$lb->vistos = 0;
				$lb->tema_id = $data['tema'];
				$lb->profesor_apoyo_id = $data['profesor'];
				$lb->save();
				$file->move($path, $posterName);
				// activitiesVideosController::saveFromActivity($lb);
				// activitiesPdfsController::saveFromLibrary($lb);
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $lb));
			}
		}
	}

	function update(){
		$data = Input::all();
		$file = $data['albvid_poster'];
		$rules = array(
			'profesor' => 'required',
			'embed' => 'required',
			'tema' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
		}
		else{
			$lb = LibraryVideos::where('id', '=', $data['id'])->first();
			$namePass = true;
			if ($lb->embed != $data['embed']){
				if ($this->EmbedActiveExist($data['embed'], $data['tema'])){
					$namePass = false;
				}
			}
			if ($namePass){
				if ($file != null){
					$path = public_path()."/packages/assets/media/images/posters/";
					$namePoster = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
					$file->move($path, $namePoster);
					unlink($path.$lb->poster);
					$lb->poster = $namePoster;
				}
				$lb->embed = $data['embed'];
				$lb->profesor_apoyo_id = $data['profesor'];
				$lb->save();
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $lb));
			}
			else{
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
		}
	}

	function delete(){
		$id = Input::all();
		LibraryVideos::where('id', '=', $id)->update(array( 'active' => 0 ));
		$lb = LibraryVideos::where('id', '=', $id)->first();
		return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $lb));
	}

	private function EmbedActiveExist($code, $topic){
		$objs = LibraryVideos::where('tema_id', '=', $topic)->select('embed', 'active')->get();
		$toLive = false;
		foreach ($objs as $obj) {
			if($obj->embed == $code && $obj->active == 1){ $toLive = true; }
		}
		return $toLive;
	}

}
?>
