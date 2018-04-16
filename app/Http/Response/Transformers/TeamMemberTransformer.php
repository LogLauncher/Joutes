<?php
namespace App\Http\Response\Transformers;

use App\Participant;
use League\Fractal\TransformerAbstract;

class TeamMemberTransformer extends TransformerAbstract
{
    public function transform(Participant $participant) {

        return [
            'id' => $participant->id,
            'firstname' => $participant->first_name,
            'lastname'  => $participant->last_name,
        ];
    }
}
