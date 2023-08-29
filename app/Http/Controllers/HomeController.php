<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Followers;
use App\Models\Subscribers;
use App\Models\Donations;
use App\Models\MerchSales;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $offset = @$request->page <= 1 ? 0 : $request->page * 25;
        $followers = Followers::select('name','created_at','updated_at')->selectRaw("'follower' as 'type'")->offset($offset)->limit(25)->get();
        $subscriber = Subscribers::select('name','created_at','updated_at')->selectRaw("'subscriber' as 'type'")->offset($offset)->limit(25)->get();
        $donations = Donations::select('name','created_at','updated_at')->selectRaw("'donations' as 'type'")->offset($offset)->limit(25)->get();
        $merchSale = MerchSales::select('name','created_at','updated_at')->selectRaw("'merchsale' as 'type'")->offset($offset)->limit(25)->get();
        
        $list1 = $followers->concat($subscriber);
        $list2 = $list1->concat($donations);
        $list3 = $list2->concat($merchSale);
        $collect = collect($list3);

        return $collect->sortBy('created_at')->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
