<?php

namespace App\Notifications;


use Benwilkins\FCM\FcmMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class PropertyNotification extends Notification
{
    use Queueable;
    /**
     * @var Property
     */
    private $property;

    /**
     * Create a new notification instance.
     *
     * @param
     */
//    public function __construct(Property $property)
    public function __construct()
    {
//        $this->property = $property;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'fcm'];
//        return ['database'];
    }


    public function toDatabase($notifiable)
    {
//        return dd($this->property);
        return [
            'title' => "",
            'messsage' => ""
        ];
    }

    public function toFcm($notifiable)
    {
        $message = new FcmMessage();
        $notification = [
            'title' => "",
            'body' => '',
            'icon' => 'https://preview.pixlr.com/images/800wm/100/1/1001165291.jpg',
            'click_action' => "FLUTTER_NOTIFICATION_CLICK",
            'id' => '1',
            'status' => 'done',
        ];
        $to = [
            $this->property->user->device_token, $this->property->user->device_token];
        $message->to($to);
        $message->setHeaders([
            'project_id' => "48542497347"   // FCM sender_id
        ])->content($notification)->data($notification)->priority(FcmMessage::PRIORITY_HIGH);
        return $message;
//        return dd($message);
    }

//    public function routeNotificationForFcm($notification)
//    {
//        return $this->device_token;
//    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'property' => $this->property,
        ];
    }
}
