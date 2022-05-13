<?php

namespace App\Http\Controllers;

use App\Models\Bar;
use App\Models\User;
use Illuminate\Http\Request;

class BarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::first();
        // dd($users);
        return view('admin.pages.bars.index', compact ('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $users= User::find($id);

        if($users->completed == 1)
        {
            $users->update([
                'address'=>$request->address,
                'country'=>$request->country,
                'completed'=>2
            ]);
            return redirect()->back();

        }

        elseif($users->completed == 2)

        {
            $users->update([
                'hobby'=>$request->hobby,
                'height'=>$request->height,
                'completed'=>3
            ]);
            return redirect()->back();

        }

        else
    
        {
            $users->update([
                'account_id'=>$request->account_id,
                'pin'=>$request->pin,
            ]);

            return 'all done';
        }
       
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
