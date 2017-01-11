<?php
class SesionInfo extends Eloquent{
    protected $table = 'sesiones_info';
    protected $fillable = ['device', 'browser', 'app_version','mobile', 'users_id'];

    public function User(){
        return $this->belongsTo('User');
    }
}
