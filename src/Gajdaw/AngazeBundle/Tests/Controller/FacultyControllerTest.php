<?php

namespace Gajdaw\AngazeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FacultyControllerTest extends WebTestCase
{
    public function testUrlIndex()
    {
        $client = static::createClient(); //a tutaj komentarz pierwszy
        $crawler = $client->request('GET', '/faculty/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /faculty/");
        $this->assertEquals(1, $crawler->filter('td:contains("NaukHumanistycznych")')->count(), 'Missing element td:contains("NaukHumanistycznych")');
        $this->assertEquals(1, $crawler->filter('td:contains("Matematyczno-Przyrodniczy")')->count(), 'Missing element td:contains("Matematyczno-Przyrodniczy")');
        $this->assertEquals(1, $crawler->filter('td:contains("Dziennikarstwa")')->count(), 'Missing element td:contains("Dziennikarstwa")');

        $rekordy = array();
        $crawler = $crawler->filter('table.records_list > tbody > tr > td:nth-child(2)');
        foreach ($crawler as $domElement) {
            $rekordy[] = $domElement->nodeValue;
        }

        //wyniki, które znamy
        //na podstawie pliku yaml
        $expected = array(
            'Dziennikarstwa',
            'Matematyczno-Przyrodniczy',
            'NaukHumanistycznych'
        );
        $this->assertEquals($expected, $rekordy, 'Rekordy: faculty');

        //Fill in the form and submit it
//        $form = $crawler->selectButton('Create a new entry')->form(array('gajdaw_angazebundle_facultytype[name]'  => 'Test',
//            // ... other fields to fill
//        ));
//        $client->submit($form);

    }
    /*
    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/faculty/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /faculty/");
        $crawler = $client->click($crawler->selectLink('Create a new entry')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'gajdaw_angazebundle_facultytype[field_name]'  => 'Test',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check data in the show view
        $this->assertGreaterThan(0, $crawler->filter('td:contains("Test")')->count(), 'Missing element td:contains("Test")');

        // Edit the entity
        $crawler = $client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Edit')->form(array(
            'gajdaw_angazebundle_facultytype[field_name]'  => 'Foo',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check the element contains an attribute with value equals "Foo"
        $this->assertGreaterThan(0, $crawler->filter('[value="Foo"]')->count(), 'Missing element [value="Foo"]');

        // Delete the entity
        $client->submit($crawler->selectButton('Delete')->form());
        $crawler = $client->followRedirect();

        // Check the entity has been delete on the list
        $this->assertNotRegExp('/Foo/', $client->getResponse()->getContent());
    }

    */
}
