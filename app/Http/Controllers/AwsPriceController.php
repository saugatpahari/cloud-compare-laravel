<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;
use App\Models\AwsProducts;

class AwsPriceController extends Controller
{
    public function index(){
        // dd($value);
        $client= new HttpClient([
            'verify'=>false,
            'headers'=> [
                'Accept' => 'application/json',
            ],
        ]);
         
        $result = [];
             
        try{
            $response = $client->get('https://calculator.aws/pricing/2.0/meteredUnitMaps/ec2/USD/current/ec2-calc/Asia%20Pacific%20(Sydney)/OnDemand/Dedicated/Linux/NA/No%20License%20required/Yes/index.json');
            $body = json_decode($response->getBody());
            $result['status']=$response->getStatuscode();
            $result['data']=$body;                
        }

        catch (\Exception $e) {
            $result['status'] = $e->getCode();
            $result['message'] = $e->getMessage();
        }
        
        if(isset($result['data'])){
            foreach($result['data']->regions->{'Asia Pacific (Sydney)'} as $value){
                AwsProducts::updateOrCreate([
                    'instanceType' => $value->{'Instance Type'},
                    'location' => $value->Location,
                    'termType' => $value->TermType,
                    'tenancy' => $value->Tenancy,
                    'licenseModel' => $value->{'License Model'},
                    'operatingSystem' => $value->{'Operating System'},
                ],[
                    'instanceType' => $value->{'Instance Type'},
                    'vcpu' => $value->vCPU,
                    'ecu' => $value->ECU,
                    'memory' => $value->Memory,
                    'storage' => $value->Storage,
                    'price' => $value->price,
                    'location' => $value->Location,
                    'gpu' => $value->GPU,
                    'unit' => $value->Unit,
                    'operatingSystem' => $value->{'Operating System'},
                    'tenancy' => $value->Tenancy,
                    'termType' => $value->TermType,
                    'physicalProcessor' => $value->{'Physical Processor'},
                    'networkPerformance' => $value->{'Network Performance'},
                    'licenseModel' => $value->{'License Model'}
                ]);
            }
        }
    }
}
