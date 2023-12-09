<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();

        $mostComment = Post::withCount('comments')->orderBy('comments_count', 'desc')->first();

//        echo '<pre>';
//        print_r($posts);
//        echo '</pre>';
//        die('f');

        return view('pages.welcome')
                ->withPosts($posts)
                ->withComments($mostComment);
    }

    public function getAbout() {
        $first = 'Dragor';
        $last = 'Dev';

        $fullname = $first . ' ' . $last;
        $email = 'test@gmail.com';

        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullname;

        //return view('pages.about')->withFullname($fullname)->withEmail($email);

        return view('pages.about')->withData($data);



    }

    public function getContact() {
        return view('pages.contact');
    }

    public function postContact(Request $request) {
        $this->validate($request, array(
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10',
        ));

        $data = [
            'email'       => $request->email,
            'subject'     => $request->subject,
            'bodyMessage' => $request->message,
        ];

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('vasicgoran.web@gmail.com');
            $message->subject($data['subject']);
        });

    }
}
