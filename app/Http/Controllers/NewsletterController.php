<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display the newsletter subscription form.
     *
     * @return \Illuminate\View\View
     */
    public function showSubscriptionForm()
    {
        return view('newsletter.subscribe');
    }

    /**
     * Handle the newsletter subscription form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscribeToNewsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        try {
            $subscriber = NewsletterSubscriber::create([
                'email' => $request->input('email'),
                'subscribed_at' => now(),
            ]);
    
            return response()->json([
                'message' => __('welcome.subscription_success'),
                'subscriber' => $subscriber,
            ], 201);
    
        } catch (\Exception $e) {
            return response()->json([
                'error' => __('welcome.subscription_error'),
                'details' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Handle the newsletter unsubscribe process.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function unsubscribeFromNewsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $subscriber = NewsletterSubscriber::whereEmail($request->input('email'))->first();

        if ($subscriber) {
            $subscriber->update([
                'unsubscribed_at' => now(),
            ]);

            return response()->json([
                'message' => __('welcome.unsubscribe_success'),
            ], 200);
        }

        return response()->json([
            'error' => __('welcome.unsubscribe_error'),
        ], 404);
    }
}