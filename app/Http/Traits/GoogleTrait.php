<?php

namespace App\Http\Traits;

use GuzzleHttp\Client as HttpClient;
use App\Models\Product;

trait GoogleTrait {
    public function index() {
        $authorization = 'AIzaSyBzdklTLm3M-KeaOa7k1yZjj0JnWvWo9iM';
        $client= new HttpClient([
            'verify'=>false,
            'headers'=> [
                'Accept' => 'application/json',
                'Authorization' => $authorization,
            ],
        ]);
         
        $result = [];
         
        try{
            $response = $client->get('https://cloudbilling.googleapis.com/v1/services/0017-8C5E-5B91/skus?key='.$authorization);
            $body = json_decode($response->getBody());
            $result['status']=$response->getStatuscode();
            $result['data']=$body;
        }
        catch (\Exception $e) {
            $result['status'] = $e->getCode();
            $result['message'] = $e->getMessage();
        }

        dd($result['data']);

        if(isset($result['data'])){
            foreach($result['data']->products as $value){
                if($value->details->storage == NULL){
                    Product::updateOrCreate([
                        'product_id' => $value->id, 
                        'product_name' => $value->name, 
                        'display_name' => $value->details->name, 
                    ],[
                        'provider' => $value->provider_id, 
                        'product_id' => $value->id, 
                        'product_name' => $value->name, 
                        'display_name' => $value->details->name, 
                        'vcpu' => $value->details->vcpu, 
                        'memory' => $value->details->memory, 
                        'gpu' => $value->details->gpu, 
                        'storage' => $value->details->storage, 
                        'clock_speed' => $value->details->clock_speed_ghz, 
                        'physical_processor' => $value->details->physical_processor_description, 
                        'network_performance' => $value->details->network_performance_description
                    ]);
                }
                else{
                    $storage = json_encode($value->details->storage);
                    Product::updateOrCreate([
                        'product_id' => $value->id, 
                        'product_name' => $value->name, 
                        'display_name' => $value->details->name, 
                    ],[
                        'provider' => $value->provider_id, 
                        'product_id' => $value->id, 
                        'product_name' => $value->name, 
                        'display_name' => $value->details->name, 
                        'vcpu' => $value->details->vcpu, 
                        'memory' => $value->details->memory, 
                        'gpu' => $value->details->gpu, 
                        'storage' => $storage, 
                        'clock_speed' => $value->details->clock_speed_ghz, 
                        'physical_processor' => $value->details->physical_processor_description, 
                        'network_performance' => $value->details->network_performance_description
                    ]);
                } 
                // dd($value->storage);
                
            }
        }
    }
}