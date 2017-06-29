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

    public function testShow()
    {
        ProductCategoryFactory::populateProductCategoryTable();
        $token = null;
        $response = $this->request('GET', Config::get('web_address').'/panel/product-categories/1', $token);

        $dom = HtmlDomParser::str_get_html($response->body);
        $product_category_name = $dom->find('.product-category-name')[0];
        $product_category_description = $dom->find('.product-category-description')[0];



        Assert::expect($product_category_name->plaintext)->to_include_string("Test");
        Assert::expect($product_category_description)->to_include_string("jakis opis");
        Assert::expect($response->http_code)->to_equal(200);
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
      $crawler = $client->submit($form, array('product_category[name]' => 'fabpot', 'product_category[description]' => 'xxxxxx'));

      $response = $this->request('GET', Config::get('web_address').'/panel/product-categories/1', $token);

      $dom = HtmlDomParser::str_get_html($response->body);
      $product_category_name = $dom->find('.product-category-name')[0];
      $product_category_description = $dom->find('.product-category-description')[0];

      Assert::expect($product_category_name->plaintext)->to_include_string("fabpot");
      Assert::expect($product_category_description)->to_include_string("xxxxxx");
      Assert::expect($response->http_code)->to_equal(200);
    }
}
