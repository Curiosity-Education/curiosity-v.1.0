<?php
class libraryPdfController extends BaseController{

	function all(){
		$lb = LibraryPdfs::where('active', '=', 1)->get();
		return $lb;
	}

	function getByTopic(){
		$data = Input::all();
		$lb = LibraryPdfs::where("active", "=", 1)
		->where("tema_id", "=", $data['id'])
		->get();
		return $lb;
	}

	function getByIntelligent(){
		$data = Input::all();
		$lb = LibraryPdfs::where("active", "=", 1)
		->join("temas", "biblioteca_pdfs.tema_id", "=", "temas.id")
		->join("bloques", "temas.bloque_id", "=", "bloques.id")
		->join("inteligencias", "bloques.inteligencia_id", "=", "inteligencias.id")
		->where("inteligencias.id", "=", $data['id'])
		->get();
		return $lb;
	}

	function save(){
		$data = Input::all();
		$file = $data['albpdf_pdf'];
		$rules = array(
			'albpdf_pdf' => 'required',
			'tema' => 'required'
		);
		$msjs = Curiosity::getValidationMessages();
		$validation = Validator::make($data, $rules, $msjs);
		if( $validation->fails()){
			return Response::json(array("status" => "CU-104", 'statusMessage' => "Validation Error", "data" => $validation->messages()));
		}
		else{
			if ($this->NameActiveExist($file->getClientOriginalName(), $data['tema'])){
				return Response::json(array("status" => "CU-103", 'statusMessage' => "Duplicate Data", "data" => null));
			}
			else{
				$path = public_path()."/packages/assets/pdf/";
				$pdfName = Curiosity::makeRandomName().".".$file->getClientOriginalExtension();
				$lb = new LibraryPdfs();
				$lb->nombre = $pdfName;
				$lb->nombre_real = $file->getClientOriginalName();
				$lb->active = 1;
				$lb->vistos = 0;
				$lb->tema_id = $data['tema'];
				$lb->save();
				$file->move($path, $pdfName);
				return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $lb));
			}
		}
	}

	function delete(){
		$id = Input::all();
		LibraryPdfs::where('id', '=', $id)->update(array( 'active' => 0 ));
		$lb = LibraryPdfs::where('id', '=', $id)->first();
		return Response::json(array("status" => 200, 'statusMessage' => "success", "data" => $lb));
	}

	private function NameActiveExist($name, $topic){
		$objs = LibraryPdfs::where('tema_id', '=', $topic)->select('nombre_real', 'active')->get();
		$toLive = false;
		foreach ($objs as $obj) {
			if($obj->nombre_real == $name && $obj->active == 1){ $toLive = true; }
		}
		return $toLive;
	}

}
?>
