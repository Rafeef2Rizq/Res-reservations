<?php

namespace App\Http\Controllers\frontend;

use App\Enums\TablesStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function stepOne(Request $request){
      $reservation=$request->session()->get('reservation');
      $min_date=Carbon::today();
      $max_date=Carbon::now()->addWeek();
        return  view('reservations.step-one',compact('reservation','min_date','max_date'));
      }
      public function storeStepOne(Request $request){
         $validated=$request->validate([
          'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=>['required','email'],
            'tel_number'=>['required'],
            'res_time'=>['required','date',new DateBetween,new TimeBetween],
            'guest_number'=>['required'],
         ]);
         if(empty($request->session()->get('reservation'))){
          $reservation=new Reservation();
          $reservation->fill( $validated);
          $request->session()->put('reservation',$reservation);
         }else{
          $reservation=$request->session()->get('reservation');
          $reservation->fill( $validated);
          $request->session()->put('reservation',$reservation);
         }
         return  to_route('reservations.step.two');
      }
      public function stepTwo(Request $request){
        $reservation=$request->session()->get('reservation');
        $res_table_ids=Reservation::orderBy('res_time')->get()->filter(function ($value) use($reservation){
         return  $value->res_time== $reservation->res_time;
        })->pluck('table_id');
        
       $tables=Table::where('status',TablesStatus::Available)
       ->where('guest_number','>=',$reservation->guest_number)
       ->whereNotIn('id',$res_table_ids)
       ->get();
          return  view('reservations.step-two',compact('reservation','tables'));
        }



  public function storeStepTwo(Request $request){
    $validated=$request->validate([
      'table_id'=>'required'
    ]);
    $reservation=$request->session()->get('reservation');
    $reservation->fill( $validated);
    $reservation->save();
    $request->session()->forget('Reservation');

    return view('thankyou');
  }
}
