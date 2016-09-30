<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;
class Flyer extends Model
{
  /**
     * Find the flyer at the given address
     * @param $query
     * @param $zip
     * @param $street
     * @return mixed
     */
    public static function locatedAt($zip, $street)
    {
        $street = str_replace('-', ' ', $street);
        return static::where(compact('zip', 'street'))->firstOrFail();
    }


  public function getPriceAttribute ($price) {
    return 'THB'.number_format($price);
  }

  public function addPhoto (Photo $photo) {
    return $this->photos()->save($photo);
  }

  /**
   * Fillable fields for a flyer
   * @var array
   */
  protected $fillable = [
    'street' , 'city' , 'state' , 'country', 'zip' , 'price' , 'description'
  ];
  /**
   * A flyer is composed of many photos.
   * @return Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function photos () {
    return $this->hasMany('App\Photo');
  }

  public function owner () {
    return $this->belongsTo('App\User', 'user_id');
  }

  public function ownedBy () {
    return $this->user_id == $user->id;
  }

}
