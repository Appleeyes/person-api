<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function store(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new person
        $person = new Person;
        $person->name = $validatedData['name'];
        // Set other fields as needed
        $person->save();

        return response()->json(['message' => 'Person Created Successfully'], 201);
    }

    public function show($id)
    {
        $person = Person::find($id);

        if (!$person) {
            return response()->json(['message' => 'Person Not Found'], 404);
        }

        return response()->json($person);
    }

    public function update(Request $request, $id)
    {
        $person = Person::find($id);

        if (!$person) {
            return response()->json(['message' => 'Person Not Found'], 404);
        }

        // Update the person's information
        $person->name = $request->input('name');
        // Update other fields as needed
        $person->save();

        return response()->json(['message' => 'Person Updated Successfully']);
    }

    public function destroy($id)
    {
        $person = Person::find($id);

        if (!$person) {
            return response()->json(['message' => 'Person Not Found'], 404);
        }

        // Delete the person
        $person->delete();

        return response()->json(['message' => 'Person Deleted Successfully']);
    }
}
