<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Person
 *
 * @property int $id
 * @property int $user_id
 * @property int $published
 * @property string|null $s3_url
 * @property string $first_name
 * @property string $last_name
 * @property string $about
 * @property string $interests
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\PersonFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Person newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Person newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Person query()
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereInterests($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereS3Url($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Person whereUserId($value)
 * @mixin \Eloquent
 */
class Person extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 's3_url', 'published', 'first_name', 'last_name', 'about', 'interests'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
