<?php
use Sunra\PhpSimple\HtmlDomParser;
use Goutte\Client;

class ProductCategoryImageRequestsTest extends TesterCase
{
  public function FunctionName()
  {
      ProductCategoryFactory::populateProductCategoryTable();

      $client = new Client();

      $token = null;

      $crawler = $client->setHeader('TesterTestRequestBKT', 'true')->request('GET', Config::get('web_address').'/panel/product-categories/1/edit');
      $crawler = $client->click($crawler->filter('.update')->link());

      // Assert::expect($crawler->getUri())->to_include_string("/panel/product-categories/1");
      Assert::expect(count(1))->to_equal(count(ProductCategory::find(1)->images()));


  }
}
