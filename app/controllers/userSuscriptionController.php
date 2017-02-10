<?php

class userSuscriptionController extends BaseController{


    public function webhook_check_pay(){
        // Analizar la información del evento en forma de json
        $body = @file_get_contents('php://input');
        $event_json = json_decode($body);
        http_response_code(200); // Return 200 OK
        switch($event_json->type){
            case 'subscription.payment_failed':
                try{
                  $membership = Membership::where("token_card","=",$event_json->data->object->customer_id);
                  $membership->update(array('active' => "0"));
                }
                catch(Exception $e){

                }
            break;
        }
    }
}
