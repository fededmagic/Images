<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Image extends Model
{
    /** 
    * IMAGES ATTRIBUTES
    * $this->attributes['id'] - int - contains the image primary key (id)
    * $this->attributes['name'] - string - contain the image name
    * $this->attributes['description'] - string - contains the description of the image
    * $this->attributes['url'] - string - contains image url
    * $this->attributes['value'] - int - contains the mark attributed to the image
    * $this->attributes['created_at'] - timestamp 
    * $this->attributes['updated_at'] - timestamp 
    */

    public function getId() { return $this->attributes['id']; }
    public function getName() { return strtoupper($this->attributes['name']); }
    public function getDescription() { return $this->attributes['description']; }
    public function getUrl() { return $this->attributes['url']; }
    public function getValue() { return $this->attributes['value']; }
    public function getAvailability() { return $this->attributes['availability']; }
    public function getCreatedAt() { return $this->attributes['created_at']; }
    public function getUpdatedAt() { return $this->attributes['updated_at']; }

    public function setId($id) { $this->attributes['id'] = $id; }
    public function setName($name) { $this->attributes['name'] = $name; }
    public function setDescription($description) { $this->attributes['description'] = $description; }
    public function setUrl($url) { $this->attributes['url'] = $url; }
    public function setValue($value) { $this->attributes['value'] = $value; }
    public function setAvailability($availability) { $this->attributes['availability'] = $availability; }
    public function setCreatedAt($created_at) { $this->attributes['created_at'] = $created_at; }
    public function setUpdatedAt($updated_at) { $this->attributes['updated_at'] = $updated_at; }

    public static function calculateTotal($imagesDetail, $imagesInSession) {

        $totale = 0;

        foreach($imagesDetail as $image) {

            //$totale += $image->getValue() * $imagesInSession[$image->getId()];
            $totale += $imagesInSession[$image->getId()] * 10;
        }

        return $totale;
    }

    public function items(): HasMany {
        return $this->hasMany(Item::class);
    }
}
