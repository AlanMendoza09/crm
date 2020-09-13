<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'date_start', 'final_price', 'stimated_cost'
    ];

    public function getViewDate(){
        if(!$this->date_start) {
            return "";
        }
        $date = date_create($this->date_start);
        return date_format($date, 'd-m-Y');
    }
}
