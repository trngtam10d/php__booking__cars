<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\District;
use App\Models\Locations;
use App\Models\Cars;
class DistriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = json_decode(Http::get('http://localhost/BookCar/public/api/district'));
        
        return view('backend.district.index')->with('districts', $districts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Locations::all();
        $cars = Cars::all();
        return view('backend.district.create')->with('locations', $locations)->with('cars', $cars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_address' => 'required',
            'location' => 'integer|required',
            'car' => 'integer|required',
           
        ]);
        $response = Http::post('http://localhost/BookCar/public/api/district', [
            "city_address"  => $request->city_address,
            "locat_id" => (int)$request->location,
            "car_id" => (int)$request->car,
        ]);
        if ($response->status() == "201") {
            return redirect()->route('district.index');
        }
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
        $districts = District::findOrFail($id);
        $locations = Locations::all();
        $cars = Cars::all();
        return view('backend.district.edit')->with('locations', $locations)->with('cars', $cars)->with('districts', $districts);
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
        $request->validate([
            'city_address' => 'required',
            'location' => 'integer|required',
            'car' => 'integer|required',
        ]);
        $response = Http::put('http://localhost/BookCar/public/api/update-district/' . $id, [
            "city_address"  => $request->city_address,
            "locat_id" => (int)$request->location,
            "car_id" => (int)$request->car,
        ]);
        if ($response->status() == "200") {
            return redirect()->route('district.index');
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
        $district = District::findOrFail($id);
        $response = Http::delete('http://localhost/BookCar/public/api/update-district/'.$id);
        if ($response->status() == "201") {
            return redirect()->route('district.index');
        }
    }
       //API 
       public function apiStore(Request $request)
       {
          
           $this->validate(
              $request,
              [
                  'city_address' => 'required',
                  'locat_id' => 'integer|required',
                  'car_id' => 'integer|required',   
              ]
          );
        
        
          $data=$request->all();
          $result = District::create($data);
          
          if ($result) {
              return response()->json($result, 201);
          }
       }
       public function apiUpdate(Request $request , $id)
       {  
        
            $request->validate([
                'city_address' => 'required',
                'locat_id' => 'integer|required',
                'car_id' => 'integer|required',
            ]);
            $district = District::findOrFail($id);
            if (!empty($district)) {
                $district->update($request->all());
                //200 OK(The request has successed)
                return response()->json($district, 200);
            }
       }
       public function apiShow()
       {
           $district = District::all();
           return response()->json($district, 200);
       }
       public function apiDelete($id)
       {
          $district = District::findOrFail($id);
          $district->delete();
          //204 No content
          return response()->json("Delete Success", 201);
       }
}