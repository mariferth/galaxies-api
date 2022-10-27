<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SolarSystem extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'solar_systems';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'galaxy_id',
        'name',
        'dimension',
        'number_of_planets',
        'main_star'
    ];

    /**
     * The attributes that should be dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * Get the galaxy that owns the solar system.
     */
    public function galaxy()
    {
        return $this->belongsTo(Galaxy::class);
    }

    /**
     * Get the planets for the solar system.
     */
    public function planets()
    {
        return $this->hasMany(Planet::class);
    }
}
