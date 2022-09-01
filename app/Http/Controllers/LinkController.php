<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Links;

class LinkController extends Controller
{
   
    /**
     * List All Links.
     */
    public function listAll(){
       
        $urls = \AshAllenDesign\ShortURL\Models\ShortURL::latest()->get();
        $data = compact('urls');
        return view('home', $data);  
    }
    /**
     * List All Links.
     */
    public function list(){
           
        $urls = \AshAllenDesign\ShortURL\Models\ShortURL::latest()->get();
        return view('links/list',compact('urls'));  
        
    }
    /**
     * Store the short URL in the database.
     * 
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request){
        $parameters = $request->toArray();
        $user = Auth::id();

        $links = Links::where('user_id', '1')->get();
        
        if($links->count() < 6){
            $builder = new \AshAllenDesign\ShortURL\Classes\Builder();

            $shortURLObject = $builder->destinationUrl(request()->url)->make();
            $shortURL = $shortURLObject->default_short_url;
            $link = Links::create([
                'link_id'=> $shortURLObject->id,
                'user_id' => '1',
            ]);
            $link->user_id = 1;
            $link->link_id = $shortURLObject->id;
            $link->save();
            return back()->with('success','URL shortened successfully. ');
        
        }else {

            return back()->with('failed','limited links. ');
        }
    }
    /**
     * Delete the short URL rom the database.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id){

       Links::where('link_id', $id)->get()->first()->delete();
        $shortURLObject = \AshAllenDesign\ShortURL\Models\ShortURL::whereId($id)->first()->delete();

        return back()->with('success','URL Deleted. ');
    }
    /**
     * Delete URLs from the database after 24h.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteLinksAfterOneDay(){
        $shortURLObject = \AshAllenDesign\ShortURL\Models\ShortURL::where(
            'created_at',
            '<', 
            Carbon::now()->subDays(1)->toDateTimeString())
        ->delete();
        $link = Links::where(
            'created_at',
            '<', 
            Carbon::now()->subDays(1)->toDateTimeString())
        ->delete();
        return 'done';
    }

}
