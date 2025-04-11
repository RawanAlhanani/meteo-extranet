<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::all();
        return response()->json($reservations);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|integer',
            'id_book' => 'required|integer',
            'reservation_date' => 'required|date',
            'expiration_date' => 'nullable|date',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $reservation = Reservation::create($request->all());
        return response()->json([
            'message' => 'Reservation created successfully',
            'reservation' => $reservation
        ]);
    }


    public function show(Reservation $reservation)
    {

        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }
        return response()->json($reservation);
    }

    public function update(Request $request,Reservation $reservation)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|integer',
            'id_book' => 'required|integer',
            'reservation_date' => 'required|date',
            'expiration_date' => 'nullable|date',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }
        $reservation->update($request->all());
        return response()->json($reservation);
    }


    public function destroy(Reservation $reservation)
    {
        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }
        $reservation->delete();
        return response()->json(['message' => 'Reservation deleted successfully']);
    }
}
