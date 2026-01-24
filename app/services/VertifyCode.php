<?php
namespace App\services;
use App\Mail\VertifyMail;
use Illuminate\Support\Facades\Mail;

class VertifyCode
{
    public function Srand()
    {
        $code=rand(1000,9999);
        return $code;
    }

    public function sendCode($user)
    {   
        $code=$this->Srand();
         if($user->vertify()->count()>0)
            {
                $user->vertify()->where('uses',0)
                ->map(function($v)
                {
                    $v->update(['uses'=>1]);
                });
            }
            $user->vertify()->create([
                 'uses'=>0,
                'type'=>'email',
                 'code'=>$code,
                 'expired_at'=>now()->addHour(),
            ]);
            Mail::to($user)->send(new VertifyMail($code));

            
    }
}