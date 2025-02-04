<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {

            $data = [
                'title' => $request->title,
                'message' => $request->message,
            ];

            $status = Message::create($data);
            if ($status) {
                event(new \App\Events\MessageCreate($data));
            }

            return redirect()->back()->with('success', 'message created');
        }

        $messages = Message::orderBy('id', 'desc')->get();

        return view('message-create', compact('messages'));
    }

}
