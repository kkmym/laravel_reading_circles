<?php

namespace MyApp\ReadingCircles\Domain\Models;

/**
 * 外部APIを使って取得した書籍の詳細な情報
 * @todo こういうのはどう表現するべきか？実装に依っているのでInfrastracture？
 */
class BookDetails
{
    protected $title;
    protected $isbn;
    protected $auther;
    protected $publisher;
    protected $salesDate;
    protected $price;
    protected $imageUrl;
}
