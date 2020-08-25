<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract_Screening extends Model
{
    protected $table = 'contract_screenings';
    protected $fillable = ['contractID', 'startDate', 'endDate', 'noOfScreenings', 'filmId'];
    protected $dates = ['startDate', 'endDate'];
}
