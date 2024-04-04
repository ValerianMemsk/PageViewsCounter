<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $url
 * @property int $views_count
 */
class PageView extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'views_count',
    ];
}
