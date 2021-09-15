<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Categories;
use App\Models\Costdate;
use App\Models\Locations;
use App\Models\Reders;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Cars::all();
        return view('backend.dasbroad.main-content')->with('cars', $cars);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Categories::all();
        $suppliers = User::where("role", "mod")->get();
        $renders = Reders::all();
        $locations = Locations::all();
        $cars = Cars::all();
        return view('backend.car.create')
            ->with('suppliers', $suppliers)
            ->with('categorys', $categorys)
            ->with('renders', $renders)
            ->with('cars', $cars)
            ->with('locations', $locations);
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
            'name' => 'string|required',
            'upload' => 'required',
            'seat' => 'required',
            'color' => 'string|required',
            'make' => 'string|required',
            'price' => 'integer|required',
            'city' => 'string|required',
            'insurance' => 'string|required',
            'rules' => 'string|required',
            'user' => 'integer|required',
            'category' => 'integer|required',
            'render' => 'integer|required',
            'location' => 'integer|required',
            'status' => 'string',
            'book_status' => 'string|required',
        ]);

        $data = $request->all();
     
        if ($request->status == null) {
            $data['status'] = "inactive";
        } else {
            $data['status'] = "active";
        }
        $data['seat'] = (int)$request->seat;
        $data['user_id'] = (int)$request->user;
        $data['cat_id'] = (int)$request->category;
        $data['red_id'] = (int)$request->render;
        $data['locat_id'] = (int)$request->location;
        $photo_name = "";
        foreach ($request->upload as $photo) {

            if ($photo) {
                $file = $photo->getClientOriginalName();
                $filePath = public_path() . '\backend\uploads\images\cars';
                $photo->move($filePath, $file);
                $photo_name .= $file . "/";
            }
        }

        $data['photo'] = $photo_name;
        $result = Cars::create($data);
        $costdate = new Costdate();
        $costdate['onetothree'] = $request->onetothree;
        $costdate['fiveonline'] = $request->fiveonline;

        $costdate['tentofourteen'] = $request->tentofourteen;
        $costdate['morefifteen'] = $request->morefifteen;
        $costdate['car_id'] = $result['id'];
        $costdate->save();

        if ($result) {
            return redirect()->route('main-content.index');
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
        $suppliers = User::where("role", "user")->get();
        $car = Cars::findOrFail($id);
        $categorys = Categories::all();
        $locations = Locations::all();
        $renders = Reders::all();
        $costdate = Costdate::where('car_id', $id)->first();

        return view('backend.car.edit')
            ->with('car', $car)
            ->with('suppliers', $suppliers)
            ->with('categorys', $categorys)
            ->with('renders', $renders)
            ->with('locations', $locations)
            ->with('costdate', $costdate);
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
        $car = Cars::findOrFail($id);
        $costdate = CostDate::where('car_id', $id)->first();
        $request->validate([
            'name' => 'string|required',
            'seat' => 'required',
            'color' => 'string|required',
            'make' => 'string|required',
            'price' => 'integer|required',
            'city' => 'string|required',
            'insurance' => 'string|required',
            'rules' => 'string|required',
            'user' => 'integer|required',
            'category' => 'integer|required',
            'render' => 'integer|required',
            'location' => 'integer|required',
            'sensors' => 'string|nullable',
            'control_parking' => 'string|nullable',
            'auto_temp' => 'string|nullable',
            'wireless_co' => 'string|nullable',
            'conditioner' => 'string|nullable',
            'navigator' => 'string|nullable',
            'status' => 'string',
            'book_status' => 'string|required',
        ]);

        $data = $request->all();
        if ($request->status == null) {
            $data['status'] = "inactive";
        } else {
            $data['status'] = "active";
        }
        $data['seat'] = (int)$request->seat;
        $data['user_id'] = (int)$request->user;
        $data['cat_id'] = (int)$request->category;
        $data['red_id'] = (int)$request->render;
        $data['locat_id'] = (int)$request->location;
        $photo_name = "";
        if ($request->upload) {
            foreach ($request->upload as $photo) {
                if ($photo) {
                    $file = $photo->getClientOriginalName();
                    $filePath = public_path() . '\backend\uploads\images\cars';
                    $photo->move($filePath, $file);
                    $photo_name .= $file . "/";
                }
            }
            $data['photo'] = $photo_name;
        } else {
            $data['photo'] = $car->photo;
        }
        $result = $car->update($data);

        $costdate['onetothree'] = $request->onetothree;
        $costdate['fiveonline'] = $request->fiveonline;
        $costdate['tentofourteen'] = $request->tentofourteen;
        $costdate['morefifteen'] = $request->morefifteen;
        $costdate->save();
        if ($result) {
            return redirect()->route('main-content.index');
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

        $response = Http::delete('http://localhost/BookCar/public/api/delete_car/' . $id);
        if ($response->status() == "200") {
            return redirect()->route('main-content.index');
        }
    }
    public function api_store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'photo' => 'required',
            'seat' => 'required',
            'color' => 'string|required',
            'make' => 'string|required',
            'price' => 'integer|required',
            'city' => 'string|required',
            'insurance' => 'string|required',
            'rules' => 'string|required',
            'user_id' => 'integer|required',
            'cat_id' => 'integer|required',
            'red_id' => 'integer|required',
            'locat_id' => 'integer|required',
            'sensors' => 'string|nullable',
            'control_parking' => 'string|nullable',
            'auto_temp' => 'string|nullable',
            'wireless_co' => 'string|nullable',
            'conditioner' => 'string|nullable',
            'navigator' => 'string|nullable',
            'start_date' => 'string|nullable',
            'end_date' => 'string|nullable',
            'start_time' => 'string|nullable',
            'end_time' => 'string|nullable',
            'status' => 'string',
            'book_status' => 'string|required',
            'onetothree' => 'integer|required',
            'fiveonline' => 'integer|required',
            'tentofourteen' => 'integer|required',
            'morefifteen' => 'integer|required',
            'car_id' => 'integer|require',
        ]);
        $data = $request->all();
        $photo_name = "";
        foreach ($request->photo as $photo) {
            if ($photo) {
                $file = $photo->getClientOriginalExtension();
                if ($file == "png" || $file == "jpeg" || $file == "jpg") {
                    $file = $photo->getClientOriginalName();
                    $filePath = public_path() . '\backend\uploads\images\cars';
                    $photo->move($filePath, $file);
                    $photo_name .= $file . "/";
                } else {
                    return response()->json(404, 'Upload Faild , only upload .png,.jpg,jpeg ');
                }
            }
        }

        $data['photo'] = $photo_name;
        $result = Cars::create($data);
        $costdate = new Costdate();
        $costdate['onetothree'] = $request->onetothree;
        $costdate['fiveonline'] = $request->fiveonline;
        $costdate['tentofourteen'] = $request->tentofourteen;
        $costdate['morefifteen'] = $request->morefifteen;
        $costdate['car_id'] = $result['id'];
        if ($result) {
            return response()->json($data, 201);
        }
    }
    public function api_show()
    {
        $cars = Cars::all();
        return response()->json($cars, 200);
    }
    public function api_delete($id)
    {
        try {
            $cars = Cars::findOrFail($id);
            $costdate = Costdate::where('car_id', $id)->first();
        } catch (\Throwable $th) {
            return response()->json("Id Not Found", 404);
        }
        $cars->delete();
        $costdate->delete();
        return response()->json("Delete Success", 200);
    }
    public function api_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|required',
            'photo' => 'required',
            'seat' => 'required',
            'color' => 'string|required',
            'make' => 'string|required',
            'price' => 'integer|required',
            'city' => 'string|required',
            'insurance' => 'string|required',
            'rules' => 'string|required',
            'user_id' => 'integer|required',
            'cat_id' => 'integer|required',
            'red_id' => 'integer|required',
            'locat_id' => 'integer|required',
            'sensors' => 'string|nullable',
            'control_parking' => 'string|nullable',
            'auto_temp' => 'string|nullable',
            'wireless_co' => 'string|nullable',
            'conditioner' => 'string|nullable',
            'navigator' => 'string|nullable',
            'start_date' => 'string|nullable',
            'end_date' => 'string|nullable',
            'start_time' => 'string|nullable',
            'end_time' => 'string|nullable',
            'status' => 'string|required',
            'book_status' => 'string|required',
            'onetothree' => 'integer|required',
            'fiveonline' => 'integer|required',
            'tentofourteen' => 'integer|required',
            'morefifteen' => 'integer|required',
            'car_id' => 'integer|require',
        ]);
        $data = $request->all();
        $photo_name = "";
        foreach ($request->photo as $photo) {
            if ($photo) {
                $file = $photo->getClientOriginalExtension();
                if ($file == "png" || $file == "jpeg" || $file == "jpg") {
                    $file = $photo->getClientOriginalName();
                    $filePath = public_path() . '\backend\uploads\images\cars';
                    $photo->move($filePath, $file);
                    $photo_name .= $file . "/";
                } else {
                    return response()->json(404, 'Upload Faild , only upload .png,.jpg,jpeg ');
                }
            }
        }

        $data['photo'] = $photo_name;
        $comment = Cars::findOrFail($id);
        $costdate = Cars::where('car_id', $id);
        if (!empty($comment)) {
            $comment->update($data);
            $costdate['onetothree'] = $request->onetothree;
            $costdate['fiveonline'] = $request->fiveonline;
            $costdate['tentofourteen'] = $request->tentofourteen;
            $costdate['morefifteen'] = $request->morefifteen;
            $costdate->save();
            //200 OK(The request has successed)
            return response()->json($comment, 200);
        }
    }
    public function api_sortLocationCar()
    {
    }
}
