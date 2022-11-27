<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class EventDetails extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'event_details';
    protected $softDelete = true;
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable =['title','description','start_date','end_date'];
}
