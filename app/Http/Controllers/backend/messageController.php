<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\message;

class messageController extends Controller
{
    public function adminIndex()
    {
        $messages = message::orderBy('created_at')->get();

        return view('admin.message.liveChat', compact('messages'));
    }

    public function userIndex()
    {
        $messages = message::orderBy('created_at')->get();

        return view('frontends.liveChat', compact('messages'));
    }

    public function adminSendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);
    
        Message::create([
            'name' => '',
            'village' => '',
            'message' => $request->message,
            'admin_reply' => '',
        ]);
    
        return redirect()->back();
    }
    
    public function adminReplyMessage(Request $request, $id)
    {
        $request->validate([
            'admin_reply' => 'required',
        ]);

        $message = message::findOrFail($id);
        $message->admin_reply = $request->admin_reply;
        $message->save();

        return redirect()->back();
    }

    public function userSendMessage(Request $request)
    {
        // Cek apakah pengguna telah mengirimkan pesan pertama kali
        $userHasSentMessage = $request->session()->get('user_has_sent_message', false);
    
        if (!$userHasSentMessage) {
            $request->validate([
                'name' => 'required',
                'village' => 'required',
                'message' => 'required',
            ]);
    
            message::create([
                'name' => $request->name,
                'village' => $request->village,
                'message' => $request->message,
                'admin_reply' => '',
            ]);
    
            // Setel status pengguna ke true setelah mengirimkan pesan pertama kali
            $request->session()->put('user_has_sent_message', true);
        } else {
            // Jika pengguna telah mengirimkan pesan pertama kali, validasi hanya pada pesan
            $request->validate([
                'message' => 'required',
            ]);
    
            message::create([
                'name' => '',
                'village' => '',
                'message' => $request->message,
                'admin_reply' => '',
            ]);
        }
    
        return redirect()->back();
    }
    

    public function userReplyMessage(Request $request, $id)
    {
        $request->validate([
            'user_reply' => 'required',
        ]);

        $message = message::findOrFail($id);
        $message->user_reply = $request->user_reply;
        $message->save();

        return redirect()->back();
    }

    public function clearUserSentMessageSession(Request $request)
{
    $request->session()->forget('user_has_sent_message');

    return redirect()->back();
}

}
