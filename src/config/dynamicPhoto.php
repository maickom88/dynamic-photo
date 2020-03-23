<?php

namespace michaelFrank\dynamicphoto\config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CkeditorUploud extends Controller
{
    public function uploadAction($file, String $nameFolder)
    {
        $siteRoot = url('/');
        if($file->hasFile('upload') && $file->file('upload')->isValid()){
                $name = uniqid(date('HisYmd'));
                $extension = $file->upload->extension();
                $nameFile = "{$name}.{$extension}";
                $upload = $file->upload->storeAs('public/'.$nameFolder.'/', $nameFile);
            if ( !$upload ){
                return response()->json("ErrorSavedImg");
            }
            $echo = '{
            "uploaded" : true ,
            "url" : "'.$siteRoot.'/storage/'.$nameFolder.'/'.$nameFile.'"
            }';
            return $echo;
        }
    }
}
