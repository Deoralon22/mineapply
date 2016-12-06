<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function getStatus() {
    	return $this->status;
    }

    public function getLastUpdatedDiff() {
        $last = $this->updated_at;

        $dt = Carbon::parse($last);

        Carbon::setLocale('en');
        return $dt->diffForHumans();
    }
}
