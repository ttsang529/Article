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
        'published_at',
    ];

    protected $dates=['published_at'];//dates be carbon parse timestamps
    //$article-pubished_at->format('Y-m')

    //Article::published($value)
    // public function scopePublished($query,$value).....
    public function scopePublished($query){
        $query->where('published_at','<=',Carbon::now())->orderBy('published_at', 'desc');
    }

    // Validation format setNameAttribute
    // setAddressAttribute
    public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d',$date);
    }


  // getAddressAttribute for create form model
    public function getPublishedAtAttribute($date){
       //return (new Carbon($date);//remove the form format 
       //or
       return Carbon::parse($date)->format('Y-m-d');
    }
    
    /**
    * An article is owned by a user
    **/
    public function user(){
        return $this->belongsTo('App\User');
    }//$article->user //user_id

    /**
    * Get the tags associated with the given article
    *@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    **/
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }


    /**
    *Get a list of tag ids associated with the current article.
    *@return array
    **/
    public function getTagListAttribute()
    {
        //$article->tag_list
        return $this->tags->lists('id')->toarray();
    }
}
