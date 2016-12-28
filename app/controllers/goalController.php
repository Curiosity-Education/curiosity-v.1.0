<?php

class goalController extends BaseController{
    public function all(){
        return DB::table('metas_diarias')->get();
    }
    /*
    *
    *   Estas funciones creo que deben ir en childrenHasGoalController
    *   pero no se muy bien su funcionamiento se encuentran en
    *   estado de PENDIENTES en cuanto a la actualización
    *
    */
    public function getGoalSon(){
        $idSon = Auth::User()->persona()->first()->hijo()->pluck('id');
        $myGoal = DB::table('metas_diarias')
        ->join('hijos_metas_diarias', 'hijos_metas_diarias.meta_diaria_id', '=', 'metas_diarias.id')
        ->where('hijos_metas_diarias.hijo_id', '=', $idSon)
        ->select('metas_diarias.*', 'hijos_metas_diarias.id as metaAsignedId')
        ->first();
        return $myGoal;
    }

    public function getAdvancesGoalSon(){
        $idAdvances = $this->getMetaHijo()->metaAsignedId;
        $currentDate = date("Y-m-d");
        $advancesGoal = DB::table('avances_metas')
        ->where('fecha', '=', $currentDate)
        ->where('avance_id', '=', $idAdvances)
        ->pluck('avance');
        return $advancesGoal;
    }

    public function hasGoalToday(){
        $idSon = Auth::User()->persona()->first()->hijo()->pluck('id');
        $currentDate = date("Y-m-d");
        $isFirst = DB::table('avances_metas')
        ->join('hijos_metas_diarias', 'hijos_metas_diarias.id', '=', 'avances_metas.avance_id')
        ->where('hijos_metas_diarias.hijo_id', '=', $idSon)
        ->where('avances_metas.fecha', '=', $currentDate)
        ->pluck('avances_metas.id');
        if ($isFirst == ""){
            return false;
        }
        return true;
    }
}
