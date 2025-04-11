<?php

namespace App\Http\Controllers;

use App\Models\BorrowRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BorrowRecordController extends Controller
{

   
    public function index()
    {
        $borrowRecords = BorrowRecord::all();
        return response()->json($borrowRecords);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|integer',
            'id_book' => 'required|integer',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $borrowRecord = BorrowRecord::create($request->all());
        return response()->json([
            'message' => 'Borrow record created successfully',
            'borrow_record' => $borrowRecord
        ]);
    }

  
    public function show(BorrowRecord $borrowRecord)
    {
      
        if (!$borrowRecord) {
            return response()->json(['message' => 'Borrow record not found'], 404);
        }
        return response()->json($borrowRecord);
    }
  
    public function update(Request $request,BorrowRecord $borrowRecord )
    {
       
        if (!$borrowRecord) {
            return response()->json(['message' => 'Borrow record not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_user' => 'sometimes|required|integer',
            'id_book' => 'sometimes|required|integer',
            'borrow_date' => 'sometimes|required|date',
            'return_date' => 'sometimes|nullable|date',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $borrowRecord->update($request->all());
        return response()->json([
            'message' => 'Borrow record updated successfully',
            'borrow_record' => $borrowRecord
        ]);
    }

    public function destroy(BorrowRecord $borrowRecord)
    {
        if (!$borrowRecord) {
            return response()->json(['message' => 'Borrow record not found'], 404);
        }
        $borrowRecord->delete();
        return response()->json(['message' => 'Borrow record deleted successfully']);
    }
}
