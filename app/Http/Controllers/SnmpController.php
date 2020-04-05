<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SnmpController extends Controller
{
    public function get(Request $request)
    {
        $hostName = $request->hostName;
        $commuinity = $request->commuinity;
        $oid = $request->oid;
        $data = snmp2_get($hostName, $commuinity, $oid);
        if($data){
            return response($data);
        }else{
            return response('can\'t get data',500);
        }
    }
    public function walk(Request $request)
    {
        $hostName = $request->hostName;
        $commuinity = $request->commuinity;
        $oid = $request->oid;
        $data = snmp2_walk($hostName, $commuinity, $oid);
        if($data){
            return response($data);
        }else{
            return response('can\'t get data',500);
        }
    }
    public function set(Request $request)
    {
        $hostName = $request->hostName;
        $commuinity = $request->commuinity;
        $oid = $request->oid;
        $type = $request->type;
        $value = $request->value;

        $data = snmp2_set($hostName, $commuinity, $commuinity, $type, $value);
        if($data){
            return response();
        }else{
            return response('can\'t set data',500);
        }
    }

}
