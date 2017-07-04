<?php
use Sunra\PhpSimple\HtmlDomParser;
use Goutte\Client;

class ProductCategoryRequestsTest extends TesterCase
{
    public function testIndex()
    {
        ProductCategoryFactory::populateProductCategoryTable();
        $token = null;
        $response = $this->request('GET', Config::get('web_address').'/panel/product-categories', $token);

        $dom = HtmlDomParser::str_get_html($response->body);
        $product_categories_elements = $dom->find('.product-category');

        Assert::expect(count($product_categories_elements))->to_equal(3);
        Assert::expect($response->http_code)->to_equal(200);
    }

    public function testEmptyIndex()
    {
        $token = null;
        $response = $this->request('GET', Config::get('web_address').'/panel/product-categories', $token);

        $dom = HtmlDomParser::str_get_html($response->body);
        $product_categories_elements = $dom->find('.error');

        Assert::expect(count($product_categories_elements))->to_equal(1);
        Assert::expect($response->http_code)->to_equal(200);
    }

    public function testCreate()
    {
        $client = new Client();

        $token = null;

        $crawler = $client->setHeader('TesterTestRequestBKT', 'true')->request('GET', Config::get('web_address').'/panel/product-categories');


        $crawler = $client->click($crawler->filter('.create')->link());
        // select the form and fill in some values
        $form = $crawler->filter('.submit')->form();
        $crawler = $client->submit($form, array('product_category[name]' => 'fabpot', 'product_category[description]' => 'xxxxxx'));


        $response = $this->request('GET', Config::get('web_address').'/panel/product-categories', $token);

        $dom = HtmlDomParser::str_get_html($response->body);
        $product_categories_elements = $dom->find('.product-category');

        Assert::expect(count($product_categories_elements))->to_equal(1);
        Assert::expect($response->http_code)->to_equal(200);
    }

    public function testInvalidCreate()
    {
        $client = new Client();

        $token = null;

        $crawler = $client->setHeader('TesterTestRequestBKT', 'true')->request('GET', Config::get('web_address').'/panel/product-categories');
        $crawler = $client->click($crawler->filter('.create')->link());
        // select the form and fill in some values
        $form = $crawler->filter('.submit')->form();
        $crawler = $client->submit($form, array('product_category[name]' => '', 'product_category[description]' => 'xxxxxx'));

        Assert::expect($crawler->getUri())->to_include_string("/panel/product-categories");
        Assert::expect($client->getResponse()->getStatus())->to_equal(422);

    }

    public function testUpdate()
    {
        ProductCategoryFactory::populateProductCategoryTable();

        $client = new Client();

        $token = null;

        $crawler = $client->setHeader('TesterTestRequestBKT', 'true')->request('GET', Config::get('web_address').'/panel/product-categories/1');
        $crawler = $client->click($crawler->filter('.update')->link());
        // select the form and fill in some values
        $form = $crawler->filter('.submit')->form();
        $crawler = $client->submit($form, array('product_category[name]' => 'fabpot', 'product_category[description]' => 'xxxxxx', 'product_category[status]' => 'active'));

        $response = $this->request('GET', Config::get('web_address').'/panel/product-categories/1', $token);

        $dom = HtmlDomParser::str_get_html($response->body);
        $product_category_name = $dom->find('.product-category-name')[0];
        $product_category_description = $dom->find('.product-category-description')[0];
        $product_category_status = $dom->find('.product-category-status')[0];

        Assert::expect($product_category_name->plaintext)->to_include_string("fabpot");
        Assert::expect($product_category_description)->to_include_string("xxxxxx");
        Assert::expect($product_category_status)->to_include_string("active");
        Assert::expect($response->http_code)->to_equal(200);
    }

    public function testInvalidUpdate()
    {
        ProductCategoryFactory::populateProductCategoryTable();

        $client = new Client();

        $token = null;

        $crawler = $client->setHeader('TesterTestRequestBKT', 'true')->request('GET', Config::get('web_address').'/panel/product-categories/1/edit');
        // $crawler = $client->click($crawler->filter('.update')->link());
        // select the form and fill in some values
        $form = $crawler->filter('.submit')->form();
        $crawler = $client->submit($form, array('product_category[name]' => '', 'product_category[description]' => 'xxxxxx'));


        Assert::expect($crawler->getUri())->to_include_string("/panel/product-categories/1");
        Assert::expect($client->getResponse()->getStatus())->to_equal(422);
    }

    public function testDelete()
    {
      ProductCategoryFactory::populateProductCategoryTable();
      $before_product_categories_count = count(ProductCategory::all());
      $client = new Client();

      $token = null;

      $crawler = $client->setHeader('TesterTestRequestBKT', 'true')->request('GET', Config::get('web_address').'/panel/product-categories/1/edit');
      $form = $crawler->filter('.delete')->form();
      $crawler = $client->submit($form, array());

      $product_categories_count = count(ProductCategory::all());
      Assert::expect($product_categories_count)->to_equal($before_product_categories_count-1);
    }
}
