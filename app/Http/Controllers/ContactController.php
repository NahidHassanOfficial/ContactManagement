<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        try {
            $validatedRequest = $request->validated();
            if ($validatedRequest) {
                Contact::create([
                    'name' => $validatedRequest['name'],
                    'email' => $validatedRequest['email'],
                    'phone' => $validatedRequest['phone'],
                    'address' => $validatedRequest['address'],
                ]);
                return response(['message' => 'Contact Created successfully'], 200);
            }

        } catch (Exception $e) {
            return response(['message' => 'Error Creating Contact'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            return $contact;
        } else {
            return response(['error' => 'Contact not found'], 404);
        }
    }
    public function renderContact(Request $request)
    {
        $contact = (object) $request->all();
        return view('components.show', compact('contact'))->render();
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, $id)
    {
        try {
            $validatedRequest = $request->validated();
            if ($validatedRequest && $id) {
                $contact = Contact::find($id);
                if ($contact) {
                    $contact->fill([
                        'name' => $validatedRequest['name'],
                        'email' => $validatedRequest['email'],
                        'phone' => $validatedRequest['phone'],
                        'address' => $validatedRequest['address'],
                    ]);
                    if ($contact->isDirty()) {
                        $contact->save();
                        return response(['message' => 'Contact updated successfully'], 200);
                    } else {
                        return response(['message' => 'No changes made'], 409);
                    }
                } else {
                    return response(['error' => 'Contact not found'], 404);
                }
            } else {
                return response(['error' => 'Contact not found'], 404);
            }
        } catch (Exception $e) {
            return response(['error' => 'Contact not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            return response(['status' => 'success'], 200);
        } else {
            return response(['error' => 'Contact not found'], 404);
        }
    }
}
