<?php

class BookIndexCest
{
    protected $initData1 = [
        'isbn' => '9784772695626',
        'title' => 'アナログの逆襲',
    ];
    protected $initData2 = [
        'isbn' => '9784621088364',
        'title' => 'SF映画で学ぶインタフェースデザイン',
    ];

    public function testBookIndexNoBook(FunctionalTester $I)
    {
        $I->amOnPage('/reading-circles/books');
        $I->seeResponseCodeIs(200);
        $I->see('書籍一覧');
        $I->see('登録されている書籍はありません');
    }

    public function testBookIndexManyBooks(FunctionalTester $I)
    {
        // 書籍データの仕込み
        $this->_initData($I);
        // @todo 複数データがある場合の表示テスト
        $I->amOnPage('/reading-circles/books');
        $I->seeResponseCodeIs(200);
        $I->see('書籍一覧');
        $I->see($this->initData1['title']);
        $I->see($this->initData2['title']);
    }

    protected function _initData(FunctionalTester $I)
    {
        $I->haveRecord('books', $this->initData1);
        $I->haveRecord('books', $this->initData2);
    }
}
