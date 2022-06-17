<?php

class HomeCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage('/site/index');
        $I->see('Selamat datang');

        $I->seeLink('About');
        $I->click('About');
    }
}
