<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class DailyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $city;
    public $weatherData;

    /**
     * Create a new message instance.
     */
    public function __construct($city = 'Hồ Chí Minh')
    {
        $this->city = $city;
        $apiKey = 'ca1510b9fee441738ad114601241107';
        $url = "https://api.weatherapi.com/v1/current.json?key={$apiKey}&q={$city}";
        $response = Http::get($url);
        if ($response->successful()) {
            $this->weatherData = $response->json();
        } else {
            $this->weatherData = null;
        }
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Daily Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'dailyEmail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
