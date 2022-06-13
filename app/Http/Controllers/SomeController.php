<?php

namespace App\Http\Controllers;

use App\Models\InfoBlock;
use App\Models\LinkBlock;
use Illuminate\Http\Request;

class SomeController extends Controller
{
    public function home(){
        return view("pages/home");
    }

    public function info(){
        return view("pages/info");
    }

    public function lib1($chapter)
    {

        if (in_array($chapter, ['character', 'inventory'])) {

            $path = storage_path() . '\app\public\\'.$chapter.".json";
            $json = json_decode(file_get_contents($path), true);
            $blocks = [];

            foreach ($json[$chapter] as $block) {
                $obj = new LinkBlock($block["id"], $block["name"], $block["image"], $block["link"]);
                $blocks[] = $obj;
            }

            return view("pages/link_lib")->with("blocks", $blocks);

        }
        else{

            $this->lib2($chapter);

        }

    }

    public function lib2($table)    {

        $blocks=[];

        $path = storage_path() . '\app\public\\'.$table.".json";
        $json = json_decode(file_get_contents($path), true);


        foreach ($json[$table] as $block) {
            $obj = new InfoBlock($block["id"], $block["name"], $block["image"], $block["info"]);
            $blocks[] = $obj;
        }

        return view("pages/lib")->with("blocks", $blocks);

    }

    public function lib3($table, Request $request)    {



        $find = "/".$request["find"]."/";


        $path = storage_path() . '\app\public\\'.$table.".json";
        $json = json_decode(file_get_contents($path), true);
        $blocks = [];

        foreach ($json[$table] as $block) {
            if(preg_match($find, $block["name"])){
                $obj = new InfoBlock($block["id"], $block["name"], $block["image"], $block["info"]);
                $blocks[] = $obj;
            }

        }

        return view("pages/lib")->with("blocks", $blocks);



    }



}

