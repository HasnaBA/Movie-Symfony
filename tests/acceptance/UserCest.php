<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class UserCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('email','h.bourajoini@gmail.com');
        $I->makeHtmlSnapshot();
        $I->fillField('password','clavie');
        $I->click('Se connecter');
        $I->see('LISTE DES FILMS');
    }

    public function tryToLoginFail(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('email','h.bo@gmail.com');
        $I->fillField('password','aaa');
        $I->click('Se connecter');
        $I->see('Invalid credentials.');
    }
}
