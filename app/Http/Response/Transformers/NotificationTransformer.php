<?php
namespace App\Http\Response\Transformers;

use App\Notification;
use League\Fractal\TransformerAbstract;

class NotificationTransformer extends TransformerAbstract
{
    public function transform(Notification $notification) {

        return [
            'id'            => $notification->id,
            'title'         => $notification->title,
            'description'   => $notification->description
        ];
    }
}
