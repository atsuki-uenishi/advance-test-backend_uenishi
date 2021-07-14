<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ContactController extends Controller
{
    public function index(Request $request) {
        if(!$request->name && !$request->gender && !$request->dateAfter && !$request->dateBefore && !$request->email) {
            $items = Contact::all();
            return response()->json([
            'data' => $items
            ], 200);
        } else {
            //全て(1)
            if($request->name && $request->gender && $request->dateAfter && $request->dateBefore && $request->email) {
                $items = Contact::where('fullname', $request->name)->where('gender', $request->gender)->whereDate('created_at', '>=', $request->dateAfter)->whereDate('created_at', '<=', $request->dateBefore)->where('email',$request->email)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            }
            //４つ選択(5)
            elseif($request->name && !$request->gender && $request->dateAfter && $request->dateBefore && $request->email) {
                $items = Contact::where('fullname', $request->name)->whereDate('created_at', '>=', $request->dateAfter)->whereDate('created_at', '<=', $request->dateBefore)->where('email',$request->email)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif($request->name && $request->gender && !$request->dateAfter && $request->dateBefore && $request->email) {
                $items = Contact::where('fullname', $request->name)->where('gender', $request->gender)->whereDate('created_at', '<=', $request->dateBefore)->where('email',$request->email)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif($request->name && $request->gender && $request->dateAfter && !$request->dateBefore && $request->email) {
                $items = Contact::where('fullname', $request->name)->where('gender', $request->gender)->whereDate('created_at', '>=', $request->dateAfter)->where('email',$request->email)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif($request->name && $request->gender && $request->dateAfter && $request->dateBefore && !$request->email) {
                $items = Contact::where('fullname', $request->name)->where('gender', $request->gender)->whereDate('created_at', '>=', $request->dateAfter)->whereDate('created_at', '<=', $request->dateBefore)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif(!$request->name && $request->gender && $request->dateAfter && $request->dateBefore && $request->email) {
                $items = Contact::where('gender', $request->gender)->whereDate('created_at', '>=', $request->dateAfter)->whereDate('created_at', '<=', $request->dateBefore)->where('email',$request->email)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            }
            //３つ選択(10)
            elseif($request->name && $request->gender && $request->dateAfter && !$request->dateBefore && !$request->email) {
                $items = Contact::where('fullname', $request->name)->where('gender', $request->gender)->whereDate('created_at', '>=', $request->dateAfter)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif($request->name && $request->gender && !$request->dateAfter && $request->dateBefore && !$request->email) {
                $items = Contact::where('fullname', $request->name)->where('gender', $request->gender)->whereDate('created_at', '<=', $request->dateBefore)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif($request->name && $request->gender && !$request->dateAfter && !$request->dateBefore && $request->email) {
                $items = Contact::where('fullname', $request->name)->where('gender', $request->gender)->whereDate('created_at', '>=', $request->dateAfter)->whereDate('created_at', '<=', $request->dateBefore)->where('email',$request->email)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif($request->name && !$request->gender && $request->dateAfter && $request->dateBefore && !$request->email) {
                $items = Contact::where('fullname', $request->name)->whereDate('created_at', '>=', $request->dateAfter)->whereDate('created_at', '<=', $request->dateBefore)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif($request->name && !$request->gender && $request->dateAfter && !$request->dateBefore && $request->email) {
                $items = Contact::where('fullname', $request->name)->whereDate('created_at', '>=', $request->dateAfter)->where('email',$request->email)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif($request->name && !$request->gender && !$request->dateAfter && $request->dateBefore && $request->email) {
                $items = Contact::where('fullname', $request->name)->whereDate('created_at', '<=', $request->dateBefore)->where('email',$request->email)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif(!$request->name && $request->gender && $request->dateAfter && $request->dateBefore && !$request->email) {
                $items = Contact::where('gender', $request->gender)->whereDate('created_at', '>=', $request->dateAfter)->whereDate('created_at', '<=', $request->dateBefore)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif(!$request->name && $request->gender && !$request->dateAfter && $request->dateBefore && $request->email) {
                $items = Contact::where('gender', $request->gender)->whereDate('created_at', '<=', $request->dateBefore)->where('email',$request->email)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif(!$request->name && $request->gender && $request->dateAfter && !$request->dateBefore && $request->email) {
                $items = Contact::where('gender', $request->gender)->whereDate('created_at', '>=', $request->dateAfter)->where('email',$request->email)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            }
            elseif(!$request->name && !$request->gender && $request->dateAfter && $request->dateBefore && $request->email) {
                $items = Contact::whereDate('created_at', '>=', $request->dateAfter)->whereDate('created_at', '<=', $request->dateBefore)->where('email',$request->email)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            }
            //2つ選択(10)
            elseif($request->name && $request->gender && !$request->dateAfter && !$request->dateBefore && !$request->email) {
                $items = Contact::where('fullname', $request->name)->where('gender', $request->gender)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif($request->name && !$request->gender && $request->dateAfter && !$request->dateBefore && !$request->email) {
                $items = Contact::where('fullname', $request->name)->whereDate('created_at', '>=', $request->dateAfter)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif($request->name && !$request->gender && !$request->dateAfter && $request->dateBefore && !$request->email) {
                $items = Contact::where('fullname', $request->name)->whereDate('created_at', '<=', $request->dateBefore)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif($request->name && !$request->gender && !$request->dateAfter && !$request->dateBefore && $request->email) {
                $items = Contact::where('fullname', $request->name)->where('email',$request->email)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif(!$request->name && $request->gender && $request->dateAfter && !$request->dateBefore && !$request->email) {
                $items = Contact::where('gender', $request->gender)->whereDate('created_at', '>=', $request->dateAfter)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif(!$request->name && $request->gender && !$request->dateAfter && $request->dateBefore && !$request->email) {
                $items = Contact::where('gender', $request->gender)->whereDate('created_at', '<=', $request->dateBefore)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif(!$request->name && $request->gender && !$request->dateAfter && !$request->dateBefore && $request->email) {
                $items = Contact::where('gender', $request->gender)->where('email',$request->email)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif(!$request->name && !$request->gender && $request->dateAfter && $request->dateBefore && !$request->email) {
                $items = Contact::whereDate('created_at', '>=', $request->dateAfter)->whereDate('created_at', '<=', $request->dateBefore)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif(!$request->name && !$request->gender && $request->dateAfter && !$request->dateBefore && $request->email) {
                $items = Contact::whereDate('created_at', '>=', $request->dateAfter)->where('email',$request->email)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif(!$request->name && !$request->gender && !$request->dateAfter && $request->dateBefore && $request->email) {
                $items = Contact::whereDate('created_at', '<=', $request->dateBefore)->where('email',$request->email)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } 
            //1つ選択(5)
            elseif($request->name && !$request->gender && !$request->dateAfter && !$request->dateBefore && !$request->email) {
                $items = Contact::where('fullname', $request->name)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif(!$request->name && $request->gender && !$request->dateAfter && !$request->dateBefore && !$request->email) {
                $items = Contact::where('gender', $request->gender)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif(!$request->name && !$request->gender && $request->dateAfter && !$request->dateBefore && !$request->email) {
                $items = Contact::whereDate('created_at', '>=', $request->dateAfter)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif(!$request->name && !$request->gender && !$request->dateAfter && $request->dateBefore && !$request->email) {
                $items = Contact::whereDate('created_at', '<=', $request->dateBefore)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            } elseif(!$request->name && !$request->gender && !$request->dateAfter && !$request->dateBefore && $request->email) {
                $items = Contact::where('email',$request->email)->get();
                return response()->json([
                    'data' => $items
                    ], 200);
            }
        }
    }

    public function store(Request $request) {
        $item =Contact::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);
    }

    public function destroy(Contact $contact) {
        $item = Contact::where('id', $contact->id)->delete();
        if($item) {
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}