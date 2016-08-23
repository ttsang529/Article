<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable=[
        'title',
        'body',
        'published_at'
    ];

    protected $dates=['published_at'];//dates be carbon parse timestamps


    public function scopePublished($query){
        $query->where('published_at','<=',Carbon::now())->orderBy('published_at', 'desc');
    }

    // Validation format setNameAttribute
    // setAddressAttribute
    public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d',$date);
    }
}
