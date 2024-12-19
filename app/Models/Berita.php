<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class Berita extends Model
{
    use HasFactory;
    use HasSEO;
    protected $guarded = ['id'];
    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->title,
            author: "Farid Anjali",
            image: $this->image_url
        );
    }
}
