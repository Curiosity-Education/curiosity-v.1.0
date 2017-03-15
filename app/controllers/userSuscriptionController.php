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
            case 'subscription.paid':
                try{
                  $membership = Membership::where("token_card","=",$event_json->data->object->customer_id);
                  $membership->update(array('active' => "1"));
                }
                catch(Exception $e){

                }
            break;
            // case 'charge.paid':
            //     try{
            //       $membership = Membership::where("token_card","=",$event_json->object->customer_id);
            //       $membership->update(array('active' => "1"));
            //     }
            //     catch(Exception $e){
            //
            //     }
            // break;
            case 'charge.paid':
                try {
                   switch($event_json->data->object->payment_method->type){
                       case 'oxxo':
                           $membership = Membership::where("token_card","=",$event_json->data->object->order_id);
                           $membership->update(array('active' => "1"));
                       break;
                   }
                } catch (Exception $e) {

                }

            break;
        }
    }
}
