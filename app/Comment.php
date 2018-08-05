<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_name','email', 'text', 'parent_id'];
    public $timestamps = true;

    public function parent()
    {
        return $this->belongsTo('App\Comment', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Comment', 'parent_id', 'id')->with('children');
    }

    public function allChildrenAccounts()
    {
        return $this->children()->with('allChildrenAccounts');
    }
    public function scopeChildless($q)
    {
        $q->has('children', '=', null);
    }
}
