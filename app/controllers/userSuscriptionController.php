<?php

class userSuscriptionController extends BaseController{


    public function webhook_check_pay(){
        // Analizar la información del evento en forma de json
        $body = @file_get_contents('php://input');
        $event_json = json_decode($body);
        http_response_code(200); // Return 200 OK

        if ($event_json->type == 'subscription.payment_failed'){
            $membership = Membership::where("token_card","=",$event_json->object->customer_id);
            $membership->active = 0;
            $membership->save();
        }
    }
}
