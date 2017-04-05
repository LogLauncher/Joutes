<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Model of contenders table.
 *
 * @author Dessaules Loïc
 */
class Contender extends Model
{
	/**
     * Create a new belongs to relationship instance between team and contenders (to have the first contender)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @author Loïc Dessaules
     */
    public function team(){
        return $this->belongsTo(Team::class);
    }

    /**
     * Create a new has many relationship instance between games and contenders 
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @author Antoine Dessauges
     */
    public function games()
    {
        return $this->hasMany('App\Game', 'contender1_id');
    }
}
