<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TablesStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations=Reservation::all();
        return view('admin.reservations.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables=Table::where('status',TablesStatus::Available)->get();
        return view('admin.reservations.create',compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request)
    {
      $tableID=Table::findOrFail($request->table_id);
      if($request->guest_number > $tableID->guest_number){
          return back()->with('warning','please enter correct gusest number');
      }
      $requestDate = Carbon::parse($request->res_time);
$reservations = optional($tableID)->reservations ?? [];

foreach ($reservations as $res) {
    // Convert the reservation date to a Carbon object
    $reservationDate = Carbon::parse($res->res_time);

    // Check if the reservation date is the same as the requested date
    if ($reservationDate->format('Y-m-d') == $requestDate->format('Y-m-d')) {
        return back()->with('warning', 'The table is reserved for this date');
    }
}
       Reservation::create($request->validated());

       return to_route('admin.reservation.index')->with('success','Reservation added successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $tables=Table::all();
        return view('admin.reservations.edit',compact('reservation','tables'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $tableID=Table::findOrFail($request->table_id);
        if($request->guest_number > $tableID->guest_number){
            return back()->with('warning','please enter correct gusest number');
        }
        $requestDate = Carbon::parse($request->res_time);
  $reservations = optional($tableID)->reservations ?? [];
  $reservations = $tableID->reservations()->where('id','!=',$reservation->id)->get();
  foreach ($reservations as $res) {
      // Convert the reservation date to a Carbon object
      $reservationDate = Carbon::parse($res->res_time);
  
      // Check if the reservation date is the same as the requested date
      if ($reservationDate->format('Y-m-d') == $requestDate->format('Y-m-d')) {
          return back()->with('warning', 'The table is reserved for this date');
      }
        $reservation->update($request->validated());
        return to_route('admin.reservation.index')->with('success','Reservation updated successfully');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
      $reservation->delete();
      return to_route('admin.reservation.index')->with('danger','Reservation deleted successfully');
    }
}
