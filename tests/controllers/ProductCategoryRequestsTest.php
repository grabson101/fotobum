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
    public function testCreate()
    {
        $client = new Client();

        $token = null;

        $crawler = $client->request('GET', Config::get('web_address').'/panel/product-categories');


        $crawler = $client->click($crawler->filter('.create')->link());
        // select the form and fill in some values
        $form = $crawler->filter('.submit')->form();
        $crawler = $client->submit($form, array('product_category[name]' => 'fabpot', 'product_category[description]' => 'xxxxxx'));


        $response = $this->request('GET', Config::get('web_address').'/panel/product-categories', $token);
        Assert::expect($response)->to_equal(1);
        $dom = HtmlDomParser::str_get_html($response->body);
        $product_categories_elements = $dom->find('.product-category');

        Assert::expect(count($product_categories_elements))->to_equal(1);
        Assert::expect($response->http_code)->to_equal(200);
    }

    public function testShow()
    {
        ProductCategoryFactory::populateProductCategoryTable();
        $token = null;
        $response = $this->request('GET', Config::get('web_address').'/panel/product-categories/1/show', $token);


    }
}
