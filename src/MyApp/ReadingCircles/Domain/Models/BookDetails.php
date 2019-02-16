<?php

namespace MyApp\ReadingCircles\Domain\Models;

/**
 * 外部APIを使って取得した書籍の詳細な情報
 * @todo こういうのはどう表現するべきか？実装に依っているのでInfrastracture？
 */
class BookDetails
{
    /**
     * @var string
     */
    protected $title;
    /**
     * @var BookIsbn
     */
    protected $bookIsbn;
    /**
     * @var string
     */
    protected $auther;
    /**
     * @var string
     */
    protected $publisher;
    /**
     * @var string
     */
    protected $salesDate;
    /**
     * @var int
     */
    protected $price;
    /**
     * @var string
     */
    protected $imageUrl;

    public function __construct(
        string $title
        ,BookIsbn $bookIsbn
        ,string $auther
        ,string $publisher
        ,string $salesDate
        ,int $price
        ,string $imageUrl
    )
    {
        $this->title = $title;
        $this->bookIsbn = $bookIsbn;
        $this->auther = $auther;
        $this->publisher = $publisher;
        $this->salesDate = $salesDate;
        $this->price = $price;
        $this->imageUrl = $imageUrl;
    }

    public function title() : string
    {
        return $this->title;
    }

    public function getBookIsbn() : BookIsbn
    {
        return $this->bookIsbn;
    }

    public function isbn() : string
    {
        return $this->bookIsbn->value();
    }

    public function auther() : string
    {
        return $this->auther;
    }

    public function publisher() : string
    {
        return $this->publisher;
    }

    public function salesDate() : string
    {
        return $this->salesDate;
    }

    public function price() : int
    {
        return $this->price;
    }

    public function imageUrl() : string
    {
        return $this->imageUrl;
    }
}
