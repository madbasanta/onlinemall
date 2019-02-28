<?php
namespace App\Traits;

trait CommonTraits {

    public function hasRelation() {
        return isset($this->relationships) && sizeof((array) $this->relationships) > 0;
    }

    public function getRelations() {
        return $this->relationships;
    }

    public function getRelationship($key) {
    	if(isset($this->relationships[$key])) 
    		return $this->relationships[$key];
    	return null;
    }    

    public function getIsActiveAttribute($status) {
        return $status ? 'active <i class="fa fa-circle text-success" style="font-size:12px;"></i>' : '-';
    }
}