<?php

namespace App;
use Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
  protected static function boot()
  {
    static::creating(function ($photo) {
      return $photo->upload();
    });
  }
  protected $table = 'flyer_photos';
  protected $fillable = ['flyer_id' , 'name', 'thumbnail_path'];
  protected $file;
  public function flyer () {
    return $this->belongsTo('App\Flyer');
  }

  public static function named ($name) {
    return (new static)->saveAs($name);
  }

  public static function fromFile (UploadedFile $file) {
    $photo = new static;
    $photo->file = $file;
    $photo->fill([
      'name' => $photo->fileName() ,
      'path' => $photo->filePath(), 
      'thumbnail_path' => $photo->thumbnailPaht()
      ]);
  }

  public function fileName () {
    sha1( time() . $this->file->getClientOriginalName());
    $extension = $this->file->getClientOriginalExtension();
    return "{$name}.{$extension}";
  }

  public function filePath () {
    return $this->basedir() . '/' . $this->fileName();
  }

  public function thumbnailPath () {
    return $this->basedir() . '/tn-' . $this->fileName();
  }

  public function baseDir () {
    return 'images/photos';
  }

  public function upload (UploadedFile $file) 
  {
    $file->file->move($this->baseDir, $this->name);
    $this->makeThumbnail();
    return $this;
  }

  protected function makeThumbnail () 
  {
    Image::make($this->filePath())->fit(200)->save($this->thumbnailPath());
  }

  public function delete () {
    \File::delete([
      $this->path , 
      $this->thumbnailPath()
      ]);
    parent::delete();
  }

}
