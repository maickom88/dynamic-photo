<?php

namespace MichaelFrank\EditorPost\congif;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CkeditorUploud extends Controller
{
    public function uploadAction($file)
    {
        $siteRoot = url('/');
        if($file->hasFile('upload') && $file->file('upload')->isValid()){
                $name = uniqid(date('HisYmd'));
                $extension = $file->upload->extension();
                $nameFile = "{$name}.{$extension}";
                $upload = $file->upload->storeAs('storage/AlbumPost/', $nameFile);
            if ( !$upload ){
                return response()->json("ErrorSavedImg");
            }
            $echo = '{
            "uploaded" : true ,
            "url" : "'.$siteRoot.'/storage/AlbumPost/'.$nameFile.'"
            }';
            return $echo;
        }
        else{
            return $echo;
        }
    }
}
