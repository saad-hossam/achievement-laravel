<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;

class MessageController extends Controller
{

    public function index()
    {
        $messages=Message::orderBy('created_at', 'DESC')->get();
        return view('dashboard.messages.index',['messages'=>$messages]);
    }

    public function create()
    {
        return view('dashboard.messages.create');
     }

    public function store(StoreMessageRequest $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
           'message'=>'required'
        ]);
        // using Eloquent Model
        $message=Message::create($request->all());
        return redirect()->back();


        // $message=Message::create($request->all());
        // dd($message);
        // Mail::to('salimeslam55@gmail.com')->send(new UserMessage($request));
        // return redirect()->back();
    }

    public function edit(Message $message)
    {
        return view('dashboard.messages.edit',['message'=>$message]);
    }

    public function update(UpdateMessageRequest $request, Message $message)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
           'message'=>'required'
        ]);
        $message->update($request->all());
        return redirect()->route('messages.index');
    }

// Controller Method
public function destroy(Message $message)
{
    try {
        $message->delete();
        return redirect()->route('messages.index')->with('success', 'Message deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->route('messages.index')->with('error', 'Failed to delete the message.');
    }
}

}
