<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SnmpController extends Controller
{
    public function getView(Request $request)
    {
        return view('get');
    }
    public function setView(Request $request)
    {
        return view('set');
    }
    public function systemView(Request $request)
    {
        $hostName = 'localhost';
        $commuinity = 'public';
        $oid = '1.3.6.1.2.1.1';
        $tableData = snmp2_walk($hostName, $commuinity, $oid);

        foreach ($tableData as $key => $value) {
            $tempData = explode(' ',$value,2);

            if(count($tempData)>1){
                $tableData[$key] = [
                    'id'=>$key,
                    'type'=>$tempData[0],
                    'data'=>$tempData[1],
                ];
            }else{
                $tableData[$key] = [
                    'id'=>$key,
                    'type'=>'#N/A',
                    'data'=>'Not set',
                ];
            }
        }
        return view('tables/system')->with(['systemData'=>$tableData]);
    }
    public function ipNetToMediaPhysAddressView(Request $request)
    {
        $hostName = 'localhost';
        $commuinity = 'public';
        $oid = '1.3.6.1.2.1.4.22.1.2';
        $tableData = snmp2_walk($hostName, $commuinity, $oid);

        foreach ($tableData as $key => $value) {
            $tempData = explode(' ',$value,2);

            if(count($tempData)>1){
                $tableData[$key] = [
                    'id'=>$key,
                    'type'=>$tempData[0],
                    'data'=>$tempData[1],
                ];
            }else{
                $tableData[$key] = [
                    'id'=>$key,
                    'type'=>'#N/A',
                    'data'=>'Not set',
                ];
            }
        }
        return view('tables/ipNetToMediaPhysAddress')->with(['systemData'=>$tableData]);
    }
    public function ipNetToMediaNetAddressView(Request $request)
    {
        $hostName = 'localhost';
        $commuinity = 'public';
        $oid = '1.3.6.1.2.1.4.22.1.3';
        $tableData = snmp2_walk($hostName, $commuinity, $oid);

        foreach ($tableData as $key => $value) {
            $tempData = explode(' ',$value,2);

            if(count($tempData)>1){
                $tableData[$key] = [
                    'id'=>$key,
                    'type'=>$tempData[0],
                    'data'=>$tempData[1],
                ];
            }else{
                $tableData[$key] = [
                    'id'=>$key,
                    'type'=>'#N/A',
                    'data'=>'Not set',
                ];
            }
        }
        return view('tables/ipNetToMediaNetAddress')->with(['systemData'=>$tableData]);
    }
    public function ipNetToMediaTypeView(Request $request)
    {
        $hostName = 'localhost';
        $commuinity = 'public';
        $oid = '1.3.6.1.2.1.4.22.1.4';
        $tableData = snmp2_walk($hostName, $commuinity, $oid);

        foreach ($tableData as $key => $value) {
            $tempData = explode(' ',$value,2);

            if(count($tempData)>1){
                $tableData[$key] = [
                    'id'=>$key,
                    'type'=>$tempData[0],
                    'data'=>$tempData[1],
                ];
            }else{
                $tableData[$key] = [
                    'id'=>$key,
                    'type'=>'#N/A',
                    'data'=>'Not set',
                ];
            }
        }
        return view('tables/ipNetToMediaType')->with(['systemData'=>$tableData]);
    }
    public function ipNetToMediaIfIndexView(Request $request)
    {
        $hostName = 'localhost';
        $commuinity = 'public';
        $oid = '1.3.6.1.2.1.4.22.1.1';
        $tableData = snmp2_walk($hostName, $commuinity, $oid);

        foreach ($tableData as $key => $value) {
            $tempData = explode(' ',$value,2);

            if(count($tempData)>1){
                $tableData[$key] = [
                    'id'=>$key,
                    'type'=>$tempData[0],
                    'data'=>$tempData[1],
                ];
            }else{
                $tableData[$key] = [
                    'id'=>$key,
                    'type'=>'#N/A',
                    'data'=>'Not set',
                ];
            }
        }
        return view('tables/ipNetToMediaIfIndex')->with(['systemData'=>$tableData]);
    }
    public function get(Request $request)
    {
        $hostName = $request->hostName;
        $commuinity = $request->commuinity;
        $oid = $request->oid;
        try {
            $data = snmp2_get($hostName, $commuinity, $oid);
            if ($data) {
                return redirect()->back()->with('getData', $data);
            } else {
                return  redirect()->back()->withErrors(['getError' => 'can\'t get data']);
            }
        } catch (\Exception $e) {
            return  redirect()->back()->withErrors(['getError' => $e->getMessage()]);
        }
    }

    public function set(Request $request)
    {
        $hostName = $request->hostName;
        $commuinity = $request->commuinity;
        $oid = $request->oid;
        $type = $request->type;
        $value = $request->value;
        try {
            $data = snmp2_set($hostName, $commuinity, $oid, $type, $value);
            if ($data) {
                return redirect()->back()->with('setData', $data);
            } else {
                return  redirect()->back()->withErrors(['setError' => 'can\'t get data']);
            }
        } catch (\Exception $e) {
            return  redirect()->back()->withErrors(['setError' => $e->getMessage()]);
        }
    }
}
