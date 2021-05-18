<?php

namespace App\Http\Controllers;

use App\Models\BookedSeat;
use App\Models\BookedSeatInfo;
use App\Models\BookingUserInfo;
use App\Models\Classes;
use App\Models\ClassGenerate;
use App\Models\Compartment;
use App\Models\CompartmentSchedule;
use App\Models\Route;
use App\Models\Seat;
use App\Models\SpecialPrice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SeatBookingController extends Controller
{
    public function index()
    {
        $routes = Route::get();
        $classes = Classes::get();
        return view('book_seat.search_seat', compact('routes', 'classes'));
    }

    public function search()
    {
        $routes = Route::get();
        $classes = Classes::get();
        $start_point =  $_GET['start_point'];
        $end_point =  $_GET['end_point'];
        $date =  $_GET['date'];
        $class =  $_GET['class'];
        Session::put('journey_date', $date);

        $compartments = Compartment::join('re_class_in_compartment', 're_compartments.id', 're_class_in_compartment.compartment_id')
                                    ->join('re_compartment_schedules', 're_compartments.id', 're_compartment_schedules.compartment_id')
                                    ->where('re_compartment_schedules.route_start', '=', $start_point)
                                    ->where('re_compartment_schedules.route_end', '=', $end_point)
                                    ->where('re_class_in_compartment.class_id', '=', $class)
                                    ->select('re_compartments.*',
                                        're_compartment_schedules.route_start',
                                        're_compartment_schedules.route_end',
                                        're_compartment_schedules.start_date',
                                        're_compartment_schedules.end_date',
                                        're_compartment_schedules.start_time',
                                        're_compartment_schedules.end_time'
                                    )
                                    ->get();

        return view('book_seat.search_result', compact('start_point', 'end_point', 'date', 'routes', 'classes', 'compartments'));
    }

    public function bookTicket($date, $id, $start, $end)
    {
        $classes = Classes::join('re_class_in_compartment', 're_classes.id', 're_class_in_compartment.class_id')
            ->join('re_compartments', 're_compartments.id', 're_class_in_compartment.compartment_id')
            ->where('re_class_in_compartment.compartment_id', '=', $id)
            ->select('re_classes.*')
            ->get();
        $total_seat = Compartment::where('id', '=', $id)->pluck('total_seat')->first();
        $compartment = Compartment::join('re_class_in_compartment', 're_compartments.id', 're_class_in_compartment.compartment_id')
            ->join('re_compartment_schedules', 're_compartments.id', 're_compartment_schedules.compartment_id')
            ->join('re_generate_seat', 're_compartments.id', 're_generate_seat.compartment_id')
            ->where('re_compartment_schedules.route_start', '=', $start)
            ->where('re_compartment_schedules.route_end', '=', $end)
            ->where('re_compartments.id', '=', $id)
            ->select('re_compartments.*',
                're_compartment_schedules.route_start',
                're_compartment_schedules.route_end',
                're_compartment_schedules.start_date',
                're_compartment_schedules.end_date',
                're_compartment_schedules.start_time',
                're_compartment_schedules.end_time',
                're_class_in_compartment.compartment_id as class_in_compartment'
            )
            ->first();
        $seats = Seat::orderBy('id', 'ASC')->pluck('id')->take($total_seat);
        $class_in_seats = ClassGenerate::join('re_classes', 're_generate_seat.class_id', 're_classes.id')
            ->where('compartment_id', '=', $id)
            ->select('re_classes.color','re_generate_seat.seat_id','re_generate_seat.class_id','re_classes.seat_price')
            ->get();
        $booked_seats = ClassGenerate::join('re_booked_seats', 're_generate_seat.id', 're_booked_seats.generate_seat_id')
            ->join('re_booked_seat_status', 're_booked_seats.user_id', 're_booked_seat_status.user_id')
            ->where('re_generate_seat.compartment_id', '=', $id)
            ->select('re_generate_seat.seat_id','re_booked_seat_status.*')
            ->get();

        // logged in visitors
        if(auth()->user()){
            $user_info = BookingUserInfo::where('user_id', '=', auth()->user()->id)->first();
        }else{
            $user_info = [];
        }

        return view('book_seat.book_ticket', compact('compartment','classes','seats','id','date','start','end','class_in_seats','user_info','booked_seats'));
    }

    public function storeTicket(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        if(auth()->user() != null){
            $this->validate($request, [
                'email' => 'required|email|unique:users,email,'. auth()->user()->id
            ],[
                'email.unique' => 'The email has already registered. Please login now.'
            ]);
        }else{
            $this->validate($request, [
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|confirmed'
            ],[
                'email.unique' => 'The email has already registered. Please login now.'
            ]);
        }

        if(auth()->user() != null){
            User::where('id', auth()->user()->id)->update(['email' => $request->email]);

            $user_id = auth()->user()->id;
            $update_user_info = BookingUserInfo::where('user_id', $user_id)->first();
            if($update_user_info != null){
                BookingUserInfo::where('user_id', $user_id)->update(
                    ['first_name' => $request->first_name],
                    ['last_name' => $request->last_name],
                    ['phone' => $request->phone],
                    ['address' => $request->address]
                );
            }else{
                $update_user_info = new BookingUserInfo;
                $update_user_info->user_id = $user_id;
                $update_user_info->first_name = $request->first_name;
                $update_user_info->last_name = $request->last_name;
                $update_user_info->phone = $request->phone;
                $update_user_info->address = $request->address;
                $update_user_info->save();
            }
        }else{
            User::create([
                'name' => $request->first_name.' '.$request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user_ids = User::orderBy('id', 'DESC')->first();
            $user_id = $user_ids->id;

            $update_user_info = new BookingUserInfo;
            $update_user_info->user_id = $user_id;
            $update_user_info->first_name = $request->first_name;
            $update_user_info->last_name = $request->last_name;
            $update_user_info->phone = $request->phone;
            $update_user_info->address = $request->address;
            $update_user_info->save();

        }

        $seat_id = explode(',',$request->seat_id);
        $regular_price= 0;
        $s_price = 0;
        for($i = 0; $i < count($seat_id); $i++){
            $generated_seat_id = ClassGenerate::where('seat_id', '=', $seat_id[$i])
                                                ->where('compartment_id', '=', $id)->first();
            $insert_book = new BookedSeat();
            $insert_book->generate_seat_id = $generated_seat_id->id;
            $insert_book->user_id = $user_id;
            $insert_book->save();
            $s_price_class = SpecialPrice::where('class_id', '=', $generated_seat_id->class_id)->select('price')->first();
            $class = Classes::where('id', '=', $generated_seat_id->class_id)->select('seat_price')->first();

            if($s_price_class != null){
                $s_price+= $s_price_class->price;
            }
            $regular_price+= $class->seat_price;
        }

        $journey_time = CompartmentSchedule::where('route_start', '=', $request->start)
            ->where('route_start', '=', $request->start)
            ->where('route_end', '=', $request->end)
            ->where('compartment_id', '=', $id)
            ->select('start_time')
            ->first();
        $book_seat = new BookedSeatInfo();
        $book_seat->user_id = $user_id;
        $book_seat->route_start = $request->start;
        $book_seat->route_end = $request->end;
        $book_seat->journey_date = Session::get('journey_date');
        $book_seat->journey_time = $journey_time->start_time;
        $book_seat->compartment_id = $id;
        $book_seat->price = $regular_price;
        $book_seat->s_price = $s_price;
        $book_seat->booking_status = 1;
        $book_seat->payment_status = 2;
        $book_seat->payment_gateway = $request->payment_method;
        $book_seat->save();

        $booking_id = BookedSeatInfo::orderBy('id', 'DESC')->first();
        $compartment = Compartment::where('id', '=', $id)->select('name')->first();

        $details = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'booking_status' => 1,
            'payment_status' => 2,
            'payment_method' => $request->payment_method,
            'compartment' => $compartment->name,
            'price' => $regular_price,
            's_price' => $s_price,
            'seat_id' => $request->seat_id,
            'booking_id' => $booking_id->id,
            'created' => $booking_id->created_at,
        ];

        \Mail::to($request->email)->send(new \App\Mail\TicketStatusMail($details));
        Session::put('details',$details);

        return redirect('success')->with('success', 'Booked success!');
    }

    public function successMessage()
    {
        $details = Session::get('details');
        return view('book_seat.success_message', compact('details'));
    }
}
