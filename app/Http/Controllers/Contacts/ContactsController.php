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
    public function index(Request $request)
    {
        $company = Auth::user()->company_id;
        $query = Contacts::where('company_id', '=', $company);

        if ($request->has('contacts_type')) {
            $query->where('contacts_type', $request->input('contacts_type'));
        }

        if ($request->has('query')) {
            $search = $request->input('query');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('phone', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('document', 'LIKE', "%{$search}%");
            });
        }

        $contacts = $query->paginate(10);
        $lastUpdate = Contacts::where('company_id', '=', $company)->max('updated_at');
        $recentlyAdded = Contacts::where('company_id', '=', $company)->where('created_at', '>=', now()->subDays(3))->count();

        return response()->json([
            'data' => $contacts->toArray(),
            'recently_added' => $recentlyAdded,
            'last_update' => $lastUpdate,
        ]);
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
