<?php declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $guarded = [];
    // colums in database to custom authomaticly by Laravel Carbon class
    protected $dates = ['birth'];

    /**
     * @param string $birth day of birtd
     */
    public function setBirthAttribute(string $birth)
    {
        $this->attributes['birth'] = Carbon::parse($birth);
    }

    public function setAuthorAttributes($author)
    {
        $this->attributes['author_id'] = Author::firstOfCreate([
            'name' => $author,
        ]);
    }
}
