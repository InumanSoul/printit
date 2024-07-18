<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Auth::user()->company_id;

        $contacts = Contacts::where('company_id', '=', $company)->paginate(10);

        return response()->json($contacts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'string|min:10|max:15',
            'email' => 'required|email',
            'address' => 'required|string',
            'document' => 'required|string|min:7|max:10',
        ]);

        try {
            $contact = new Contacts();
            $contact->name = $request->name;
            $contact->phone = $request->phone;
            $contact->email = $request->email;
            $contact->address = $request->address;
            $contact->document = $request->document;
            $contact->contacts_type = $request->contacts_type;
            $contact->company_id = Auth::user()->company_id;
            $contact->user_id = Auth::user()->id;
            $contact->save();

            return response()->json(['message' => 'Customer created', $contact], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contacts::find($id);

        return response()->json($contact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contacts::find($id);
        try {
            $contact->delete();
            return response()->json(['message' => 'Contact deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
