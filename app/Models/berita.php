<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class berita extends Model
{
    use HasFactory;
    use HasSEO;
    protected $guarded = ['id'];
    protected function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->title,
            description: "Desc",
            author: "Admin",
            image: "https://darussalam2.com/storage/file/" . $this->image_url
        );
    }
}
