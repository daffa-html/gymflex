<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandAmbassador extends Model
{
    use HasFactory;

    protected $table = 'brand_ambassadors';

    protected $fillable = ['nama', 'profesi', 'foto', 'bio', 'instagram', 'urutan'];

    protected $casts = [
        'urutan' => 'integer',
    ];
}
