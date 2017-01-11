<?php
/*
    class created by Gerson Isaías
    @dater --> Date for manipulate
*/
class dreamDate {
    private $dates, $dater, $month, $week, $semester, $day , $monthCurrent, $year;
    private static $_dreamDate;

    private function __construct($dater = '') {
         if(preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/',$dater))
            $this->dater = $dater;
        else
            throw new Exception("The date {$dater} is invalid");
    }
    public static function singleton($dater = ''){
        if (self::$_dreamDate) {
            return self::$_dreamDate;
        } else {
            $class = __CLASS__;
            self::$_dreamDate = new $class($dater);
            return self::$_dreamDate;

        }
    }
    private function calcDaysMonth($monthNum,$yearMonth){
        $days = 0;

        if($monthNum > 0 && $monthNum <= 7 ){
            if($monthNum == 2){
                if($yearMonth % 4 == 0)
                    $days = 29;
                else
                    $days = 28;
            }
            else{
                if($monthNum % 2 == 0)
                    $days = 30;
                 else
                    $days = 31;
            }
        }
        else{
            if($monthNum % 2 == 0)
                $days = 31;
            else
                $days = 30;
        }

        return $days;
    }
    private function setVarsDate($dater = ''){
        $dates = explode("-",$dater);
        $this->year= $dates[0];
        $this->monthCurrent = $dates[1];
        $this->day = $dates[2];
    }
    private function calcMonth($rango){
        $this->setVarsDate($this->dater);
        if($this->monthCurrent > 12 || $this->day > 31 || $this->year < 1)
            return "Fecha invalida";
        if($this->monthCurrent - $rango <= 0){
            $this->monthCurrent = 12 + ($this->monthCurrent - $rango);
            $this->year = $this->year - 1;
        }
        else
            $this->monthCurrent = $this->monthCurrent - $rango;

        return $this->year."-".$this->monthCurrent."-".$this->day;
    }
    public static function calcMonthDate($dater){
        $dreamDATE = self::singleton($dater);
        $dreamDATE->month = $dreamDATE->calcMonth(1);
    }
    public static function calcSemesterDate($dater){
        $dreamDATE = self::singleton($dater);
        $dreamDATE->semester = $dreamDATE->calcMonth(6);
    }
    private function calcDay($rango){

       $this->setVarsDate($this->dater);

        if($this->day - $rango <= 0)
            $this->monthCurrent = $this->monthCurrent - 1;
        $this->day = ($this->day - $rango <= 0) ? ($this->calcDaysMonth($this->monthCurrent,$this->year)+($this->day - $rango)) : $this->day - $rango;
        if($this->monthCurrent > 12 || $this->day > 31 || $this->year < 1)
            return "Fecha invalida";
        else
            return $this->year."-".$this->monthCurrent."-".$this->day;
    }
    public static function calcWeek($dater){
       $dreamDATE = self::singleton($dater);
       $dreamDATE->week = $dreamDATE->calcDay(7);
    }

    public static function getDate() {
        $dreamDATE = self::singleton();
        return $dreamDATE->dater;
    }

    public static function getMonth() {
        $dreamDATE = self::singleton();
        return $dreamDATE->month;
    }

    public static function getWeek() {
        $dreamDATE = self::singleton();
        return $dreamDATE->week;
    }

    public static function getSemester() {
        $dreamDATE = self::singleton();
        return $dreamDATE->semester;
    }



}
