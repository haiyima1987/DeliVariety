<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Reservation;
use App\Spot;
use App\TimeSpan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    public $spots;
    private $reserved_tables;
    private $time_spans;

    public function show_spots()
    {
        $date = Carbon::now();
        $time_span = 18;
        $this->retrieve_info($date, $time_span);

//        return view('pages.reservation', compact('spots', 'reserved_tables', 'time_spans'));
        return view('pages.reservation')->with(['spots' => $this->spots,
            'reserved_tables' => $this->reserved_tables, 'time_spans' => $this->time_spans]);
    }

    public function update_spots($date, $time_span)
    {
        $this->retrieve_info($date, $time_span);

        return view('ajax.availableTables')->with(['spots' => $this->spots,
            'reserved_tables' => $this->reserved_tables, 'time_spans' => $this->time_spans]);
    }

    public function reserve_spots(ReservationRequest $request)
    {
        $name = Session::has('email') ?
            Session::get('firstName') . ' ' . Session::get('lastName') :
            $request->firstName . ' ' . $request->lastName;
        $email = Session::has('email') ? Session::get('email') : $request->email;
        $all_saved = false;
        for ($int = 0; $int < count($request->spots); $int++) {
            $reservation = new Reservation([
                'table_id' => $request->spots[$int],
                'date' => Carbon::parse($request->date),
                'time_span' => $request->timeSpan,
                'name' => $name,
                'phone' => $request->phone,
                'email' => $email
            ]);
            $all_saved = $reservation->save() ? true : false;
        }

        if ($all_saved) {
            $reservation = Reservation::where('time_span', $request->timeSpan)->first();
            $info = [
                'name' => $name,
                'date' => Carbon::parse($request->date)->toFormattedDateString(),
                'time_span' => $reservation->TimeSpan->span,
                'spots' => $request->spots
            ];
            return view('ajax.reserveSuccess', compact('info'));
        } else {
            return view('pages.reservation');
        }
    }

    private function retrieve_info($date, $time_span)
    {
        $this->spots = Spot::all();

        $this->reserved_tables = Reservation::where([
            ['date', '=', $date],
            ['time_span', '=', $time_span]
        ])->pluck('table_id')->toArray();

        // use pluck() if you wanna retrieve only values into an array
        $this->time_spans = TimeSpan::all()->pluck('span', 'id');
    }
}
