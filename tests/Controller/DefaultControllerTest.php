<?php

namespace App\Tests\Controller;

use App\Tests\AssertsTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test case for default controller.
 *
 * @covers \App\Controller\DefaultController
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class DefaultControllerTest extends WebTestCase
{
    use AssertsTrait;

    public function testContactsPage()
    {
        $client = self::createClient();

        $crawler = $client->request('GET', '/contacts');

        self::assertEquals(200, $client->getResponse()->getStatusCode());

        self::assertOne(
            $crawler->filter('address')->count(),
            'Page should have address of the office'
        );
        self::assertOne(
            $crawler->filterXPath('//a[contains(@href, "tel:")]')->count(),
            'Page should have phone number'
        );
        self::assertOne(
            $crawler->filterXPath('//a[contains(@href, "mailto:")]')->count(),
            'Page should have email'
        );
    }
}
