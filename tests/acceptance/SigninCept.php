<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('log in as joe');
$I->amOnPage('/');
$I->fillField('username','joe');
$I->fillField('password','1234pass');
$I->click('Login');
$I->see('Welcome joe!');
