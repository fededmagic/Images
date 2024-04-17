<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{

    public function getId() { return $this->attributes['id']; }
    public function getTotal() { return $this->attributes['total']; }
    public function getUser(): User { return $this->user; }   //ritorna wrapper di user()
    public function getItems() { return $this->items; }   //ritorna wrapper di items(), che ritorna una collezione
    public function getCreatedAt() { return $this->attributes['created_at']; }
    public function getUpdatedAt() { return $this->attributes['updated_at']; }

    public function setId($id) { $this->attributes['id'] = $id; }
    public function setTotal($total) { $this->attributes['total'] = $total; }
    public function setUserId($user_id) { $this->attributes['user_id'] = $user_id; }
    public function setCreatedAt($created_at) { $this->attributes['created_at'] = $created_at; }
    public function setUpdatedAt($updated_at) { $this->attributes['updated_at'] = $updated_at; }

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function items(): HasMany { return $this->hasMany(Item::class); }


    public static function validate(Request $request) {

        $request->validate([
            "total" => "required | numeric",
            "user_id" => "required | exists:users,id"
        ]);
    }

}
