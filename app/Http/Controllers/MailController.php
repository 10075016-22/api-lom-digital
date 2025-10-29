<?php

namespace App\Http\Controllers;

use App\Interface\ResponseClass;
use Illuminate\Http\Request;
use Resend\Laravel\Facades\Resend;

class MailController extends Controller
{
    protected $response;
    public function __construct(ResponseClass $response)
    {
        $this->response = $response;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    

    public function sendEmail(Request $request) 
    {
        try {
            /**
             * Request data
             * fullname
             * email
             * message
             */

            // $emailTo = "sell3.thiago@gmail.com";
            $emailTo = env('EMAIL_TO');
            $subject = "Formulario de contacto - Lom Digital";

            Resend::emails()->send([
                'from' => env('MAIL_FROM_ADDRESS'),
                'to' => [$emailTo],
                'subject' => $subject,
                'html' => view('mail', [
                    'name' => $request->fullname,
                    'email' => $request->email,
                    'date' => now()->format('d/m/Y H:i'),
                    'message' => $request->message,
                    'website_url' => env('APP_URL_BASE'),
                ])->render(),
            ]);

            return $this->response->success('Se ha enviado la notificación, pronto nos pondremos en contacto contigo.');
        } catch (\Throwable $th) {
            return $this->response->error('Ha ocurrido un error al enviar el email '. $th->getMessage());
        }
    }
}
