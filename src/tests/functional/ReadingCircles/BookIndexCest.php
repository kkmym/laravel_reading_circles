<?php

class BookIndexCest
{
    public function testBookIndexNoBook(FunctionalTester $I)
    {
        $I->amOnPage('/reading-circles/books');
        $I->seeResponseCodeIs(200);
        $I->see('書籍一覧');
        $I->see('登録されている書籍はありません');
    }

    public function testBookIndexManyBooks(FunctionalTester $I)
    {
        // @todo 書籍データの仕込み
        // @todo 複数データがある場合の表示テスト
    }
}
