<?php

namespace MyApp\ReadingCircles\Domain\Models;

use MyApp\ReadingCircles\Domain\Exceptions\InvariantException;


class BookIsbn
{
    /**
     * @var string
     */
    protected $isbn;

    public function __construct(string $isbn)
    {
        if (!$this->_validateIsbn($isbn)) {
            throw new InvariantException('ISBNとして正しくありません');
        }

        $this->isbn = $isbn;
    }

    public function value() : string
    {
        return $this->isbn;
    }

    /**
     * @TODO こういう処理はどこに置くのがいいか？
     */
    protected function _validateIsbn(string $isbn) : bool
    {
        $tmp = $isbn;

        // 全角→半角に変換
        $tmp = mb_convert_kana($tmp, 'askhc');

        // この時点で［半角数字、もしくは半角ハイフン］以外なら false
        if (!preg_match('/^[0-9\-]+$/', $tmp)) {
            return false;
        }

        // ハイフン除去
        $tmp = str_replace('-', '', $tmp);

        // 13桁か
        if (strlen($tmp) != 13) {
            return false;
        }

        // 先頭が '978' か
        if (substr($tmp, 0, 3) != '978') {
            return false;
        }

        // 四文字めが '4' か
        if (substr($tmp, 3, 1) != '4') {
            return false;
        }

        // チェックサムが正しいか
        $odd = 0;
        $even = 0;
        for ($i=0; $i<12; $i++) {
            $d = substr($tmp, $i, 1);
            if ($i % 2 == 0) {
                $odd += $d;
            } else {
                $even += $d;
            }
        }
        $sum = $odd + ($even * 3);
        $checkdigit = 10 - ($sum % 10);
        if ($checkdigit != substr($tmp, 12, 1)) {
            return false;
        }

        return true;
    }
}
