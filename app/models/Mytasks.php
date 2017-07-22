<?php

class Mytasks extends Eloquent {

    public $timestamps = false;
    protected $fillable = array('name','done');

}