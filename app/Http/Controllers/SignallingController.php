<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Signalling;

class SignallingController extends Controller
{
    //
    function show(Request $request){
        $nodeName = $request->query('nodeName');
        $startDate = $request->query('startDate');
        $endDate = $request->query('endDate');
        $typeName = $request->query('typeName');
        $counterType = $request->query('counterType');
        $valueType = $request->query('valueType');
        if($counterType == 'node'){
            $datas = array();
            // $data = Signalling::where('node_name', $nodeName)
            // ->where('siglink_name', $typeName)
            // ->whereBetween('date_time', [date('Y-m-d H:i:s', strtotime($startDate)), date('Y-m-d H:i:s', strtotime($endDate))])
            // ->orderby("date_time")
            // ->get();
            $data = Signalling::all();
            // return $valueType;
            foreach($data as $dt){
                switch($valueType){
                    case 'PI_ETSI_SS7_UTIL_REC' : 
                        // $datas[] = array("x"=>strtotime($dt->date_time) * 1000, "y"=>floatval($dt->PI_ETSI_SS7_UTIL_REC));
                        $datas[] = array(strtotime($dt->date_time) * 1000, floatval($dt->PI_ETSI_SS7_UTIL_REC));
                    break;
                    case 'PI_ETSI_SS7_UTIL_TRANS' : 
                        // $datas[] = array("x"=>strtotime($dt->date_time) * 1000, "y"=>floatval($dt->PI_ETSI_SS7_UTIL_TRANS));
                        $datas[] = array(strtotime($dt->date_time) * 1000, floatval($dt->PI_ETSI_SS7_UTIL_TRANS));
                    break;
                }
            }
            return $datas;
        }else{
            return [
                "error" => true,
                "message" => 'data tidak ada' 
            ];
        }
    }

    function getTypeName(){
        $typeName = Signalling::orderBy('siglink_name', 'asc')->groupBy('siglink_name')->pluck('siglink_name')->all();
        return $typeName;
    }

    function getNodeName(){
        $typeName = Signalling::orderBy('node_name', 'asc')->groupBy('node_name')->pluck('node_name')->all();
        return $typeName;
    }

    function getValueType(){
        return [
            "error" => false,
            "data" => ["PI_ETSI_SS7_UTIL_REC","PI_ETSI_SS7_UTIL_TRANS"]
        ];
    }




}
