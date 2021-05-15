<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class GeneralNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $tries = 2;
    public $timeout = 10;
 
    
    public $subject;
    public $greeting;
    public $lines;
    public $action_name;
    public $action_url;
    public $methods;
    public $group_type;
    public $group_unique;
    public $notification_sender_id;
    public $notification_icon; 


    public function __construct( 
        $subject="فكرة تشارت",
        $greeting="مرحبا",
        $lines=array('لديك تنبيه جديد','من فكرة تشارت'),
        $action_name="منصة فكرة تشارت",
        $action_url="https://chart-idea.com/",
        $methods=['database']
    )
    { 
        $this->subject=$subject;
        $this->greeting=$greeting;
        $this->lines=implode("<br>",$lines);
        $this->action_name=$action_name;
        $this->action_url=$action_url;
        $this->methods=$methods; 
   
    }
 
    public function via($notifiable)
    {
        return $this->methods;

    }

    public function toMail($notifiable)
    {
        return (new MailMessage) 
                 ->subject($this->subject)
                    ->greeting($this->greeting) 
                    ->line('هذه رسالة يتم انشائها تلقائياً')
                    ->line($this->lines) 
                    ->action($this->action_name, $this->action_url);
                    

    } 
    
    public function toDatabase($notifiable)
    {
        
        $contet=mb_strlen($this->lines) > 300 ? mb_substr($this->lines, 0, 300) . "..." : $this->lines;

        return [ 
            'message'=>'<a href="'.$this->action_url.'" class="cairo">'.$contet.'</a>',
        ];
    } 
    public function get_template(){

       
        return (new MailMessage) 
                 ->subject($this->subject)
                    ->greeting($this->greeting) 
                    ->line('هذة رسالة يتم انشائها تلقائيا')
                    ->line($this->lines) 
                    ->action($this->action_name, $this->action_url);

/*

        $markdown = new \Illuminate\Mail\Markdown(view(), config('mail.markdown'))->level($this->level)
                 ->subject($this->subject)
                    ->greeting($this->greeting) 
                    ->line('هذة رسالة يتم انشائها تلقائيا')
                    ->line($this->lines) 
                    ->action($this->action_name, $this->action_url);

        return $markdown->render('vendor.notifications.email');*/
    }


/*    public function toArray($notifiable)
    {
        return [
          
        ];
    }*/
}
