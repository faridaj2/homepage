<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected function getDynamicSEOData(): SEOData
{
    return new SEOData(
        title: $this->title,
        description: $this->excerpt,
        author: "Admin",
        image: "https://darussalam2.com/storage/file/" . $this->image_url
    );
}
}
