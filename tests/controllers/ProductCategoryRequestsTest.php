<?php
class ProductCategoryRequestsTest extends TesterCase
{
    use Sunra\PhpSimple\HtmlDomParser;

    public function testIndex()
    {
        ProductCategoryFactory::populateProductCategoryTable();

        $token = null;
        $response = $this->request('GET', Config::get('api_url').'/panel/product-categories', $token);
        $dom = HtmlDomParser::str_get_html($response);
        $product_categories_elements = $dom->find('.product-category');

        Assert::expect(count($product_categories_elements))->to_equal(3);
        Assert::expect($response->http_code)->to_equal(200);
    }
}
