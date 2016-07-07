<?php

namespace Instaphp\Instagram;
include_once 'InstagramTest.php';
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-01-22 at 20:16:55.
 * @ignore
 */
class LocationsTest extends InstagramTest
{

	/**
	 * @var Locations
	 */
	protected $object;

	/**
	 * @deprecated
	 * @var string
	 */
	protected $foursquarev2id = '4e239487d4c0d32591045a8e';

	/**
	 * @var string
	 */
	protected $facebookPlacesId = '165461756803348';
	
	protected $location_id = '3143441';
	
	protected $lat = '37.78776';
	protected $lng = '-122.489556';

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->object = new Locations($this->config);
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
		
	}
	
	public function testInstanceOf()
	{
		$this->assertInstanceOf('\Instaphp\Instagram\Instagram', $this->object);
		$this->assertInstanceOf('\Instaphp\Instagram\Locations', $this->object);
	}

	/**
	 * @covers Instaphp\Instagram\Locations::Info
	 */
	public function testInfo()
	{
		$res = $this->object->Info($this->location_id);
		$this->assertInstanceOf('\Instaphp\Instagram\Response', $res);
		$this->assertNotEmpty($res->data);
		$this->assertGreaterThan(0, count($res->data));
		$this->assertEquals('Green Flash Brewing Co.', $res->data['name']);
	}

	/**
	 * @covers Instaphp\Instagram\Locations::Recent
	 */
	public function testRecent()
	{
		$res = $this->object->Recent($this->location_id, ['count' => 10]);
		$this->assertInstanceOf('\Instaphp\Instagram\Response', $res);
		$this->assertNotEmpty($res->data);
		$this->assertGreaterThan(0, count($res->data));
		$this->assertNotEmpty($res->pagination);
	}

	/**
	 * @covers Instaphp\Instagram\Locations::Search
	 */
	public function testSearch()
	{
		$res = $this->object->Search(['count' => 10, 'facebook_places_id' => $this->facebookPlacesId]);
		$this->assertInstanceOf('\Instaphp\Instagram\Response', $res);
		$this->assertNotEmpty($res->data);
		$res = $this->object->Search(['lat' => $this->lat, 'lng' => $this->lng]);
		$this->assertInstanceOf('\Instaphp\Instagram\Response', $res);
		$this->assertNotEmpty($res->data);
		
	}

}
