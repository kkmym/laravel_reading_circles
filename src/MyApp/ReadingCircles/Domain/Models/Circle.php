<?php

namespace MyApp\ReadingCircles\Domain\Models;

class Circle
{
    /**
     * @var Book
     */
    protected $readingBook;

    /**
     * @var array
     */
    protected $organizers;

    /**
     * @var array
     */
    protected $urls;

    public function __construct(Book $readingBook, array $organizers, array $urls = null)
    {
        // $organizers が Member の配列であることを確認
        $isMemberInstance = function($instance) {
            return ($instance instanceof Member);
        };
        if (in_array(false, array_map($isMemberInstance, $organizers))) {
            throw new \Exception('Memberのみ受付');
        }

        // $urls が Url の配列であることを確認
        if (!empty($urls)) {
            $isUrlInstance = function($instance) {
                return ($instance instanceof Url);
            };
            if (in_array(false, array_map($isUrlInstance, $urls))) {
                throw new \Exception('Urlのみ受付');
            }
        }

        $this->readingBook = $readingBook;
        $this->organizers = $organizers;
        $this->urls = $urls;
    }

    public function getReadingBook() : Book
    {
        return $this->readingBook;
    }

    public function getOrganaizers() : array
    {
        return $this->organizers;
    }

    public function getOrganizer(int $memberId) : ?Member
    {
        $filtered = array_filter($this->organizers , function($organizer) use ($memberId) {
            $id = $organizer->id();
            return ($id == $memberId);
        });

        if (empty($filtered)) {
            return null;
        }

        $keys = array_keys($filtered);
        return $filtered[$keys[0]];
    }

    public function getUrls() : ?array
    {

    }
}
