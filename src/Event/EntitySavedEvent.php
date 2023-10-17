namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;
use App\; 
// Remplacez YourEntity par le nom de votre entité

class EntitySavedEvent extends Event
{
    private $entity;

    public function __construct(movie $movie)
    {
        $this->movie = $movie;
    }

    public function getMovie()
    {
        return $this->movie;
    }
}