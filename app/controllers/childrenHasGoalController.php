<?php

class childrenHasGoal extends BaseController{

    public function update(){
        $idGoal = Input::get('data');
        $idSon = Auth::User()->Person()->first()->Son()->pluck('id');

        DB::table('hijos_metas_diarias')
        ->where('hijo_id', '=', $idSon)
        ->update(array(
            'meta_diaria_id' => $idGoal
        ));

        return $this->getMeta($idSon);
    }

    public function get($idSon){
        $currentDate = date("Y-m-d");
        $myGoal = DB::table('metas_diarias')
        ->join('hijos_metas_diarias', 'hijos_metas_diarias.meta_diaria_id', '=', 'metas_diarias.id')
        ->where('hijos_metas_diarias.hijo_id', '=', $idSon)
        ->select('metas_diarias.*', 'hijos_metas_diarias.id as metaAsignedId')
        ->first();
        $idAdvances = $myGoal->metaAsignedId;
        $advancesGoal = DB::table('avances_metas')
        ->where('fecha', '=', $currentDate)
        ->where('avance_id', '=', $idAdvances)
        ->pluck('avance');

          // --- Calculo del avance en porcenaje de la meta del hijo
          $avgAdvancesGoal = round(($advancesGoal * 100) / $myGoal->meta);
          if ($avgAdvancesGoal > 100) { $avgAdvancesGoal = 100; }

          // --- Calculo de cuanto falta para cumplir la meta diaria
          $goalMissing = $myGoal->meta - $advancesGoal;
          if ($goalMissing < 0) { $goalMissing = 0; }

        $row = array(
            "miMeta" => $myGoal,
            "porcAvanceMeta" => $avgAdvancesGoal,
            'avanceMeta' => $advancesGoal,
            'faltanteMeta' => $goalMissing
        );

        return $row;
    }
}
