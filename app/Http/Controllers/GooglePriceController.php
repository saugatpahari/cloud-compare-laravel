<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;

class GooglePriceController extends Controller
{
    public function index(){      
        $client= new HttpClient([
            'verify'=>false,
            'headers'=> [
                'Accept' => 'application/json',
                
            ],
        ]);
         
        $result = [];
             
        try{
            $response = $client->get('https://cloudbilling.googleapis.com/v1/services?key=AIzaSyAbZEjZoQlfdRHIbwWlnC1GJ-EK8TOPlro');
            $body = json_decode($response->getBody());
            $result['status']=$response->getStatuscode();
            $result['data']=$body;                
        }

        catch (\Exception $e) {
            $result['status'] = $e->getCode();
            $result['message'] = $e->getMessage();
        }

        // dd($result['data']);

        if(isset($result['data'])){
            
            $count = 0;

            foreach($result['data'] as $value){
                $newclient= new HttpClient([
                    'verify'=>false,
                    'headers'=> [
                        'Accept' => 'application/json',
                        
                    ],
                ]);
                
                $results = [];
                    
                try{
                    $newresponse = $newclient->get('https://cloudbilling.googleapis.com/v1/services/'.$value[$count]->serviceId.'/skus?key=AIzaSyAbZEjZoQlfdRHIbwWlnC1GJ-EK8TOPlro');
                    $body = json_decode($newresponse->getBody());
                    $results['status']=$newresponse->getStatuscode();
                    $results['data']=$body;                
                }

                catch (\Exception $e) {
                    $results['status'] = $e->getCode();
                    $results['message'] = $e->getMessage();
                }
                // dd($results);
                if(isset($results['data'])){

                    $total_skus = count((array)$result['data']);
                    $total = 0;
                    
                    foreach($results['data'] as $data){
                        if($total < $total_skus){
                            $compare = $data[$total]->category->resourceFamily;
                            if($compare == "Compute"){
                                dd($results['data']);
                            }
                        }
                        $total = $total + 1;
                    }
                }
            }
        }
        
        // if(isset($result['data'])){
        //     //dd($result['data']->regions->{'Asia Pacific (Sydney)'}) ;           
        //     foreach($result['data']->regions->{'Asia Pacific (Sydney)'} as $value){
        //         // dd($value);
        //         AwsProducts::updateOrCreate([
        //             'instanceType' => $value->{'Instance Type'},
        //             'location' => $value->Location,
        //             'termType' => $value->TermType,
        //             'tenancy' => $value->Tenancy,
        //             'licenseModel' => $value->{'License Model'}
        //         ],[
        //             'instanceType' => $value->{'Instance Type'},
        //             'vcpu' => $value->vCPU,
        //             'ecu' => $value->ECU,
        //             'memory' => $value->Memory,
        //             'storage' => $value->Storage,
        //             'price' => $value->price,
        //             'location' => $value->Location,
        //             'gpu' => $value->GPU,
        //             'unit' => $value->Unit,
        //             'operatingSystem' => $value->{'Operating System'},
        //             'tenancy' => $value->Tenancy,
        //             'termType' => $value->TermType,
        //             'physicalProcessor' => $value->{'Physical Processor'},
        //             'networkPerformance' => $value->{'Network Performance'},
        //             'licenseModel' => $value->{'License Model'}
        //         ]);
        //     }
        // }
    }
}

