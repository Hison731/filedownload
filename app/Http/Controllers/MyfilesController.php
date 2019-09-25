<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Auth;
use mysql_xdevapi\Exception;
use ZipArchive;

class MyfilesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $username = Auth::user()->name;
        $userdirectorypath = "uploads/".$username.'/';
        $dirlists = glob(public_path($userdirectorypath) . '*' , GLOB_ONLYDIR);
        foreach ($dirlists as $key => $value) {
          $dirlists[$key] = str_replace(public_path($userdirectorypath),"",$value);
        }

        // date_default_timezone_set('US/Central');
        // $today = date("Y-m-d");
        // $newDate = date("dmY", strtotime($today));
        $newDate = "No directoy";
        rsort($dirlists);
        if($dirlists){
            $newDate = $dirlists[0];
        }

        $filepath = "uploads/".$username."/".$newDate;

        $files = array();

        if(file_exists(public_path($filepath))){
            $filesInFolder  = File::files(public_path($filepath));
            foreach($filesInFolder as $path) {
                $file = pathinfo($path);
                $file['linkTarget'] = $filepath.'/'.$path->getFilename();
                $file['size'] = floor($path->getSize()/1024).' Kb';
                $files[] = $file;
            }
        }

        // return view('myfile', compact('today', 'files', 'dirlists'));
        return view('myfile', compact('files', 'dirlists', 'newDate'));

    }

    public function download($date){

        // $newDate = date("dmY", strtotime($date));
        $newDate = $date;

        $username = Auth::user()->name;
        $filepath = "uploads/".$username."/".$newDate;

        if(file_exists(public_path($filepath))){
            $zip_file = "uploads/".$username.'/'.$date.'.zip';
            $zip = new ZipArchive();
            $zip->open(public_path($zip_file), \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

            $filesInFolder  = File::files(public_path($filepath));

            foreach($filesInFolder as $path) {
                $zip->addFile(public_path($filepath.'/'.$path->getFilename()), $path->getFilename());
            }

            $zip->close();
            return response()->download(public_path($zip_file));
        } else {
            return;
        }



    }

    public function show(Request $request){

        $today = $request['date'];

        $newDate = date("dmY", strtotime($today));

        $username = Auth::user()->name;
        $filepath = "uploads/".$username."/".$newDate;

        $files = array();

        if(file_exists(public_path($filepath))){
            $filesInFolder  = File::files(public_path($filepath));
            foreach($filesInFolder as $path) {
                $file = pathinfo($path);
                $file['linkTarget'] = $filepath.'/'.$path->getFilename();
                $file['size'] = floor($path->getSize()/1024).' Kb';
                $files[] = $file;
            }
        }

        return view('myfile', compact('today', 'files'));

    }

    public function showfiles($date){
      $username = Auth::user()->name;
      $userdirectorypath = "uploads/".$username.'/';
      $dirlists = glob(public_path($userdirectorypath) . '*' , GLOB_ONLYDIR);
      foreach ($dirlists as $key => $value) {
        $dirlists[$key] = str_replace(public_path($userdirectorypath),"",$value);
      }
      rsort($dirlists);

      $newDate = $date;

      $filepath = "uploads/".$username."/".$newDate;

      $files = array();

      if(file_exists(public_path($filepath))){
          $filesInFolder  = File::files(public_path($filepath));
          foreach($filesInFolder as $path) {
              $file = pathinfo($path);
              $file['linkTarget'] = $filepath.'/'.$path->getFilename();
              $file['size'] = floor($path->getSize()/1024).' Kb';
              $files[] = $file;
          }
      }

      // return view('myfile', compact('today', 'files', 'dirlists'));
      return view('myfile', compact('files', 'dirlists', 'newDate'));
    }
}
