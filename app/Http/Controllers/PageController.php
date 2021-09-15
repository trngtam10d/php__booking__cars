<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use App\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\StatusNotification;
use Illuminate\Support\Facades\DB;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\Banners;
use App\Models\Cars;
use App\Models\Contacts;
use App\Models\Locations;
use App\Models\Categories;
use App\Models\Reders;
use App\Models\Wishlists;
use App\Models\CarSales;
use App\Models\ReferralLink;
use App\Models\Bookings;
use App\Models\Historys;
use App\Models\Payment;
use App\Models\Costdate;
use App\Models\Reviews;

class PageController extends Controller
{       

        // Lịch sử giao dịch :
        public function getHistory() {
            $historys = Historys::all();
            return view('pages.history')->with('historys' , $historys);
        }
     
        public function vnpayreturn(Request $request)
        {

            $info = session()->get('info-customer');
            $book = session()->get('book');
            $car = session()->get('car');
            //Insert Booking 
            $demo = new Bookings();
            $demo->user_id = Auth::user()->id;
            $demo->car_id = $car->id;
           
            $demo->address = $book['address'];
            $demo->address_off = $book['address_off'];
            $demo->total_amount = $book['total_amount'];
            $date = substr($book['time_start'], -2, 3);
            $date1 = substr($book['time_end'], -2, 3);
            if ($date == "pm") {
                $date = substr($book['time_start'], 0, 2);
                $h_timestart = (int)$date + 12;
                $m_timestart = substr($book['time_start'], 2, 3);
                $date = $h_timestart . $m_timestart;
            } else {
                $date = substr($book['time_start'], 0, -2);
            }

            if ($date1 == "pm") {
                $date1 = substr($book['time_end'], 0, 2);
                $h_timeend = (int)$date1 + 12;
                $m_timeend = substr($book['time_end'], 2, 3);
                $date1 = $h_timeend . $m_timeend;
            } else {
                $date1 = substr($book['time_end'], 0, -2);
            }

            $demo->time_start = $date;
            $demo->time_end = $date1;
            $demo->date_start = $book['date_start'];
            $demo->date_end = $book['date_end'];
            $demo->save();
            //Insert Payment 
            $demo1 = new Payment();
            $payments = session()->get('payment');
            $demo1->p_transaction_id = $demo->id;
            $demo1->p_user_id = Auth::user()->id;
            $demo1->p_money =  $payments['vnp_Amount'];
            $demo1->p_transaction_code = $request->vnp_TxnRef;
            $demo1->p_note =  $request->vnp_OrderInfo;
            $demo1->p_vnp_response_code = $request->vnp_ResponseCode;
            $demo1->p_code_vnpay = $request->vnp_TransactionNo;
            $demo1->p_code_bank = $request->vnp_BankCode;
            $demo1->p_time = date('Y-m-d H:i', strtotime($request->vnp_PayDate));
            $demo1->save();
            //Insert History 
            $demo2 = new Historys();
            $demo2->user_id = Auth::user()->id;
            $demo2->book_id = $demo->id;
            $demo2->save();
            $own = Cars::where('id',$car->id)->first();
            return view('pages.invoice')->with('own',$own)->with('booking',$book);
           
        }
        // Thanh toán
        public function createPayment(Request $request)
        {
            $vnp_TxnRef = $request->order_id;
            $vnp_OrderInfo = $request->order_desc;
            $vnp_OrderType = $request->order_type;
            $vnp_Amount = str_replace(',', '.', $request->amount) * 100;
            $vnp_Locale = $request->language;
            $vnp_BankCode = $request->bank_code;
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            $inputData = array(
                "vnp_Version" => "2.0.0",
                "vnp_TmnCode" => 'Y4U88XFK',
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => route('vnpay.return'),
                "vnp_TxnRef" => $vnp_TxnRef,
            );

            session(['payment' => $inputData]);
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . $key . "=" . $value;
                } else {
                    $hashdata .= $key . "=" . $value;
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html' . "?" . $query;

            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', 'DTHXNFNBUMNKFKQOZVHTXUXNUQUUXMTV' . $hashdata);
            $vnp_Url .=  'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html' . 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;

            return redirect($vnp_Url);
        }

        /*payment car*/ 
        public static function getReffect()
        {
            $refect = User::all();
            return view('pages.refeffect',['refect' => $refect]);
        }
       //Hóa đơn : 
       public function getInvoice() {
            return view('pages.invoice');
       }
       //Danh sách mã khuyến mãi danh cho mỗi khách hàng : 
       public function getCoupny()  {
           $carsale = DB::table('car_sales')->where('user_id' , Auth::user()->id)->paginate(3);
           return view('pages.coupy')->with('carsale' , $carsale);
       }
        //Blog tìm kiếm
        public function couponSearch(Request $request)
        {
           
            $tukhoa = $request->get('keyword');
            $carsale = CarSales::where('zipcode',  'LIKE', "%$tukhoa%")->take(30)->paginate(4)->appends(['tukhoa' => $tukhoa]);
            return view('pages.coupy', ['carsale' => $carsale, 'tukhoa' => $tukhoa]);
        }
       //Wishlist
       public function addWishList($carID)
       {
           $wishList = new Wishlists;
           $wishList->user_id = Auth::user()->id;
           $wishList->car_id = $carID;
           $wishList->save();
           return back();
       }
   
       public function showWishList()
       {
          
           $cars = Wishlists::with('render')       
            ->leftJoin('cars', 'wishlists.car_id', '=', 'cars.id')
            ->join('users', 'users.id', '=', 'wishlists.user_id')
            ->selectRaw('users.id as id_user, users.name as name_user, cars.*, wishlists.id as id_wishlist')
            ->where('wishlists.user_id', Auth::user()->id)
            ->orderBy('id','DESC')->paginate(6);
            
            // dd($cars);
             return view('pages.favorite', compact('cars'));
       }
       public function removeWishList($carID)
       {
           //echo  $id;
           DB::table('wishlists')->where('car_id', '=', $carID)->delete();
           return back()->with('msg', 'San pham da duoc xoa khoi danh muc yeu thich');
       }
        //Trang đổi password cua user
        public function changeUserPassword()
        {
            $profile = Auth()->user();
            return view('login.userPasswordChange')->with('profile', $profile);
        }
        /* Trang contact */
        public function pageContact() {
            return view('pages.contact');
        } 
        //Lưu liên hệ: 
        public function saveContact(Request $request)
        {
        
            $request->validate([
            'name' => 'string|required',
            'email' => 'string|required',
            'message' => 'string|nullable',
            ]);
            $response = Http::post('http://localhost/BookCar/public/api/contact', [
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);
            if ($response->status() == "201") {
                return redirect()->route('home');
            }
        }

        /* Trang about */
        public function pageAbout() {
            return view('pages.about');
        } 
        /* Trang about */
        public function pageService() {
            return view('pages.serivice');
        } 
        /* Trang cars */
        public function pageCar() {
            $locations = Locations::all();
            $cars = Cars::with('render')->paginate(6);
            $seats = DB::table('cars')->distinct()->get('seat');
            $renders = Reders::all();
            return view('pages.car' ,  ['cars' => $cars , 'locations' => $locations , 'renders' => $renders , 'seats' => $seats]);
        } 
        //liệt kê xe theo khu vực
        public function getRenderCarById($id)
        {
            $locations = Locations::all();
            $seats = DB::table('cars')->distinct()->get('seat');
            $renders = Reders::all();
            $cars = Cars::where('locat_id', $id)->paginate(6);
            return view('pages.car-location', ['cars' => $cars, 'renders' => $renders , 'locations' => $locations , 'seats' => $seats]);
        }
        
        /*Trang home*/ 
        public function pagehome() {

            $banner = Banners::where('status', 'on')->first();
            $locations = Locations::all();
            $drivingCar = Cars::where('book_status', 1)->where('status','active')->orderBy('id', 'DESC')->get();
            $driverCar = Cars::where('book_status', 2)->where('status','active')->orderBy('id', 'DESC')->get();
        
            return view('home')->with('banner' , $banner)
                                ->with('locations',$locations)
                                ->with('drivingCar',$drivingCar)
                                ->with('driverCar',$driverCar);
                                
            
        } 
        
        /*detail car*/ 
        public static function getCarbookID($id)
        {
            $cars = Cars::where('id', $id)->first();

            $costdate = Costdate::where('car_id', $id)->first();

            $locations = Locations::all();

            $booking = Bookings::with('cars');
            //Review : 
            $car_reviews = Reviews::getAllReview();
            
            return view('pages.car-single', ['cars' => $cars , 'costdate' => $costdate , 
                                            'car_reviews' => $car_reviews , 'booking' => $booking ,'locations' => $locations]);    
        }
       
        /*booking car*/ 
        public static function getBookings($id)
        {
            $cars = Cars::where('id', $id)->first();
            
            $zipcode = CarSales::where('user_id' , Auth::user()->id)->get();
            return view('pages.choose-time', ['cars' => $cars , 'zipcode' => $zipcode]);
        }
        public static function getPayment($id, Request $request)
        {
            $book = $request->all();
            $cars = Cars::where('id', $id)->first();
            
           
            session(['book' => $book, 'car' => $cars]);
            return view('pages.pament', ['cars' => $cars, 'book' => $book]);
        }
        //Payment
        public function Payment(Request $request, $id)
        {
            $payment = $request->all();
            session(['info-customs' => $payment]);
            return view('vnpay.index')->with('payment', $payment)->with('id', $id);
        }

    
    //    search home 
        public function sortLocationCar(Request $request)
        {
            $request->validate([
                'start_date' => 'required|after:yesterday',
                'end_date' => 'required|after:start_date'
            ]);
            
            $start_date = date('Y-m-d', $request->start_date = strtotime($request->start_date));
            $end_date = date('Y-m-d', $request->end_date = strtotime($request->end_date));
            $locations = Locations::all();
            $seats = DB::table('cars')->distinct()->get('seat');
            $renders = Reders::all();
            $cars = Cars::with('render')->where('city', 'like', '%' . $request->address . '%')
                ->where('start_date', '<=', $start_date)
                ->where('end_date', '>=', $end_date)
                ->paginate(6);

            return view('pages.car', ['cars' => $cars , 'locations' => $locations , 'renders' => $renders , 'seats' => $seats]);
        }
        


        public function sortCar(Request $request)
        {
            $sort = $request->all();
            $results = array();
            //Sort one where
            if ($sort['render'] != "render") {
                $results = Cars::with('render')->join('reders', 'red_id', '=',  'reders.id')
                    ->where('red_id', '=', $request->render)->select('cars.*')->paginate(6)
                    ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
            }
            if ($sort['seat'] != "seat") {
                $results = Cars::with('render')->where('seat', '=', $request->seat)

                    ->paginate(6)
                    ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
            }
            if ($sort['locations'] != "locations") {
                $results = Cars::with('render')->join('locations', 'locat_id', '=',  'locations.id')
                    ->select('cars.*')
                    ->where('locat_id', '=', $request->locations)->paginate(6)
                    ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
            }

            if ($sort['price'] != "price") {
                if ($sort['price'] == "1") {
                    $results = Cars::with('render')->orderBy('price', 'ASC')
                        ->paginate(6)
                        ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
                } else {
                    $results = Cars::with('render')->orderBy('price', 'DESC')
                        ->paginate(6)
                        ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
                }
            }
            //Sort two where
            if ($sort['render'] != "render" && $sort['seat'] != "seat") {
                $results = Cars::with('render')->join('reders', 'red_id', '=',  'reders.id')
                    ->where('red_id', '=', $sort['render'])->where('seat', '=', $sort['seat'])
                    ->select('cars.*')
                    ->paginate(6)
                    ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
            }
            if ($sort['render'] != "render" && $sort['locations'] != "locations") {
                $results = Cars::with('render')->join('reders', 'red_id', '=',  'reders.id')
                    ->join('locations', 'locat_id', '=', 'locations.id')->where('red_id', '=', $sort['render'])->where('locat_id', '=', $sort['locations'])
                    ->select('cars.*')
                    ->paginate(6)
                    ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
            }
            if ($sort['render'] != "render" && $sort['price'] != "price") {
                if ($sort['price'] == "1") {
                    $results = Cars::with('render')->join('reders', 'red_id', '=',  'reders.id')->where('red_id', '=', $sort['render'])
                        ->orderBy('price', 'ASC')
                        ->select('cars.*')
                        ->paginate(6)
                        ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
                } else {
                    $results = Cars::with('render')->join('reders', 'red_id', '=',  'reders.id')->where('red_id', '=', $sort['render'])
                        ->orderBy('price', 'DESC')
                        ->select('cars.*')
                        ->paginate(6)
                        ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
                }
            }
            if ($sort['seat'] != "seat" && $sort['locations'] != "locations") {
                $results = Cars::with('render')->join('locations', 'locat_id', '=',  'locations.id')
                    ->where('locat_id', '=', $sort['locations'])->where('seat', '=', $sort['seat'])
                    ->select('cars.*')
                    ->paginate(6)
                    ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
            }
            if ($sort['seat'] != "seat" && $sort['price'] != "price") {
                if ($sort['price'] == "1") {
                    $results = Cars::with('render')->where('seat', '=', $sort['seat'])->orderBy('price')
                        ->select('cars.*')
                        ->paginate(6)
                        ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
                } else {
                    $results = Cars::with('render')->where('seat', '=', $sort['seat'])->orderByDesc('price')
                        ->select('cars.*')
                        ->paginate(6)
                        ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
                }
            }
            if ($sort['locations'] != "locations" && $sort['price'] != "price") {
                if ($sort['price'] == "1") {
                    $results = Cars::with('render')->join('locations', 'locat_id', '=',  'locations.id')->where('locat_id', '=', $sort['locations'])
                        ->orderBy('price', 'ASC')
                        ->select('cars.*')
                        ->paginate(6)
                        ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
                } else {
                    $results = Cars::with('render')->join('locations', 'locat_id', '=',  'locations.id')->where('locat_id', '=', $sort['locations'])
                        ->orderBy('price', 'DESC')
                        ->select('cars.*')
                        ->paginate(6)
                        ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
                }
            }
            //Sort three where
            if ($sort['render'] != "render" && $sort['seat'] != "seat" && $sort['locations'] != "locations") {
                $results = Cars::with('render')
                    ->join('reders', 'red_id', '=',  'reders.id')
                    ->join('locations', 'locat_id', '=', 'locations.id')
                    ->select('cars.*')
                    ->where('red_id', '=', $sort['render'])
                    ->where('locat_id', '=', $sort['locations'])
                    ->where('seat', '=', $sort['seat'])
                    ->paginate(6)
                    ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
            }
            if ($sort['render'] != "render" && $sort['locations'] != "locations" && $sort['price'] != "price") {
                if ($sort['price'] == "1") {
                    $results = Cars::with('render')
                        ->join('reders', 'red_id', '=',  'reders.id')
                        ->join('locations', 'locat_id', '=', 'locations.id')
                        ->select('cars.*')
                        ->where('red_id', '=', $sort['render'])
                        ->where('locat_id', '=', $sort['locations'])
                        ->orderBy('price', 'ASC')
                        ->paginate(6)
                        ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
                } else {
                    $results = Cars::with('render')
                        ->join('reders', 'red_id', '=',  'reders.id')
                        ->join('locations', 'locat_id', '=', 'locations.id')
                        ->where('locat_id', '=', $sort['locations'])
                        ->orderBy('price', 'DESC')
                        ->paginate(6)
                        ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
                }
            }
            if ($sort['render'] != "render" && $sort['seat'] != "seat" && $sort['price'] != "price") {
                if ($sort['price'] == "1") {
                    $results = Cars::with('render')
                        ->join('reders', 'red_id', '=',  'reders.id')
                        ->where('red_id', '=', $sort['render'])
                        ->where('seat', '=', $sort['seat'])
                        ->select('cars.*')
                        ->orderBy('price', 'ASC')
                        ->paginate(6)
                        ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
                } else {
                    $results = Cars::with('render')
                        ->join('reders', 'red_id', '=',  'reders.id')
                        ->where('red_id', '=', $sort['render'])
                        ->where('seat', '=', $sort['seat'])
                        ->orderBy('price', 'DESC')
                        ->paginate(6)
                        ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
                }
            }
            if ($sort['locations'] != "locations" && $sort['seat'] != "seat" && $sort['price'] != "price") {
                if ($sort['price'] == "1") {
                    $results = Cars::with('render')
                        ->join('locations', 'locat_id', '=',  'locations.id')
                        ->where('locat_id', '=', $sort['locations'])
                        ->where('seat', '=', $sort['seat'])
                        ->orderBy('price', 'ASC')
                        ->paginate(6)
                        ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
                } else {
                    $results = Cars::with('render')
                        ->join('locations', 'locat_id', '=',  'locations.id')
                        ->where('locat_id', '=', $sort['locations'])
                        ->where('seat', '=', $sort['seat'])
                        ->orderBy('price', 'DESC')
                        ->paginate(6)
                        ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
                }
            }
            //Sort four where
            if ($sort['render'] != "render" && $sort['locations'] != "locations" && $sort['seat'] != "seat" && $sort['price'] != "price") {
                if ($sort['price'] == "1") {
                    $results = Cars::with('render')
                        ->join('reders', 'red_id', '=',  'reders.id')
                        ->join('locations', 'locat_id', '=',  'locations.id')
                        ->where('red_id', '=', $sort['render'])
                        ->where('locat_id', '=', $sort['locations'])
                        ->where('seat', '=', $sort['seat'])
                        ->select('cars.*')
                        ->orderBy('price', 'ASC')
                        ->paginate(6)
                        ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
                } else {
                    $results = Cars::with('render')
                        ->join('reders', 'red_id', '=',  'reders.id')
                        ->join('locations', 'locat_id', '=',  'locations.id')
                        ->where('red_id', '=', $sort['render'])
                        ->where('locat_id', '=', $sort['locations'])
                        ->where('seat', '=', $sort['seat'])
                        ->select('cars.*')
                        ->orderBy('price', 'DESC')
                        ->paginate(6)
                        ->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
                }
            } else if ($sort['render'] == "render" && $sort['locations'] == "locations" && $sort['seat'] == "seat" && $sort['price'] == "price") {
                $results = Cars::with('render')->paginate(6)->appends(['render' => $request->render, 'seat' => $request->seat, 'locations' => $request->locations, 'price' => $request->price]);
            }
            $locations = Locations::all();
            $seats = DB::table('cars')->distinct()->get('seat');
            $renders = Reders::all();
            
            return view('pages.find-car', ['results' => $results , 'locations' => $locations , 'renders' => $renders , 'seats' => $seats , 'sorts' => $sort]);
        }
        
        public function getProfile($id)
        {
            $user = User::where('id', $id)->first();
            
            return view('login.profile')->with('user', $user);
        }
        public function userLogin() {
            return view('login.login');
        }
        public function userRegister() {
            return view('login.register');
        }
        public function userRegisterRef($ref) {

            $user = User::where('country_code', $ref)->first();
            return view('login.ref',['user' => $user]);
        }
        public function userSubmitOTP(Request $request)
        {
            
            $this->validate(
                $request,
                [
                    'name' => 'string|required|min:6',
                    'email' => 'string|required|unique:users,email',
                    'password' => 'required|min:6|confirmed',
                    'referral_code' => 'string|required',
                    'remember_token' => '',
                    
                ]
            );
          

            $dataAll = $request->all();
            $dataAll['password'] = bcrypt($request->password);
            $dataAll['referral_code'] = $request->referral_code;

            $otp = rand(0, 99999999);

            $data = [
                'otp' => $otp,
            ];

            Mail::send('login.sendmail', $data, function ($message) use ($dataAll) {
                $message->from('phantinh1209@gmail.com', 'Xác thực tài khoản thuê xe');
                $message->to($dataAll['email']);
                $message->subject('Thư xác thực tài khoản thuê xe');
            });

            return view('login.otp')->with('data', $data)->with('dataAll', $dataAll);
        }
        
        //Xu ly du lieu register
        public function userRegisterSubmit(Request $request)
        {
            $data = $request->all();

            $otp =[
                'otp' => $request->otpRegister,
            ];
           // Mã giới thiệu
           $code = strtoupper(substr(md5(time()), 0, 8));

            if ($request->otpRegister == $request->otp) {
            
                $data['name'] = $request->name;
                $data['email'] = $request->email;
                $data['password'] = $request->password;
                $data['otp'] = $request->otpRegister;
                $data['country_code'] = $code;
                $data['referral_code'] = $request->referral_code;
                
                $status = User::create($data);
                
                if ($status) {
                    request()->session()->flash('success', 'Successfully registered!Please confrfirm your email!');
                    return redirect('/ui/login');
                }
            }else{
                request()->session()->flash('error1', 'Wrong OTP');
                return view('login.otp')->with('data', $otp)->with('dataAll', $data);
            }
        }
        //Xu ly user logout
        public function userLogout()
        {
            Auth::logout();
            return redirect('/');
        }
        //Xu ly du lieu login
        public function userLoginSubmit(Request $request)
        {
            $data = $request->all();
            $remember_token = ($request->has('remember_token')) ? true : false; // add
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'active'] , $remember_token)) {
                
                Session::put('user', $data['email']);
                request()->session()->flash('success', 'Successfully login');
                return redirect('/');
            } else {
                request()->session()->flash('error', 'Invalid email and password pleas try again!');
                return redirect()->back();
            }
        }
}