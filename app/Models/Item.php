<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    public function getId() { return $this->attributes['id']; }
    public function getQuantity() { return $this->attributes['quantity']; }
    public function getValue() { return $this->attributes['value']; }
    public function getOrder() { return $this->order; }
    public function getImage() { return $this->image; }
    public function getCreatedAt() { return $this->attributes['created_at']; }
    public function getUpdatedAt() { return $this->attributes['updated_at']; }

    public function setId($id) { $this->attributes['id'] = $id; }
    public function setQuantity($quantity) { $this->attributes['quantity'] = $quantity; }
    public function setValue($value) { $this->attributes['value'] = $value; }
    public function setOrderId($order) { $this->attributes['order_id'] = $order; }
    public function setImageId($image) { $this->attributes['image_id'] = $image; }
    public function setCreatedAt($created_at) { $this->attributes['created_at'] = $created_at; }
    public function setUpdatedAt($updated_at) { $this->attributes['updated_at'] = $updated_at; }

    public function order(): BelongsTo { return $this->belongsTo(Order::class); }
    public function image(): BelongsTo { return $this->belongsTo(Image::class); }

    public static function validate(Request $request) {

        $request->validate([
            "value" => "numeric | gt:0",
            "quantity" => "numeric | gt:0",
            "image_id" => "required | exists:images,id",
            "order_id" => "required | exists:order,id",
        ]);
    }
}
