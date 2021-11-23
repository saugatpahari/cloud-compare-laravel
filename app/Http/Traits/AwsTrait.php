<?php

namespace App\Http\Traits;

use GuzzleHttp\Client as HttpClient;
use App\Models\Product;

trait AwsTrait {
    public function aws_api() {
        $client= new HttpClient([
            'verify'=>false,
            'headers'=> [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer EC_j_L04t5H2moH-EcsL3DxI0Z9Cx5NKxWRqNuzFDfc',
            ],
        ]);
         
        $result = [];
         
        try{
            $response = $client->get('https://api.vantage.sh/v1/products');
            $body = json_decode($response->getBody());
            $result['status']=$response->getStatuscode();
            $result['data']=$body;
        }
        catch (\Exception $e) {
            Log::debug($e);
            $result['status'] = $e->getCode();
            $result['message'] = $e->getMessage();
        }

        if(isset($result['data'])){
            dd($result['data']);
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