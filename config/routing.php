<?php
$router = new AltoRouter();
$router->setBasePath('');

// // Clients
// $router->map('GET','/clients', 'ClientsController#index', 'clients_path');
// $router->map('GET','/clients/[i:id]', 'ClientsController#show', 'client_path');
// $router->map('GET','/clients/new', 'ClientsController#new', 'new_client_path');
// $router->map('GET','/clients/[i:id]/edit', 'ClientsController#edit', 'edit_client_path');
// $router->map('POST','/clients', 'ClientsController#create', 'create_client_path');
// $router->map('PUT','/clients/[i:id]', 'ClientsController#update', 'update_client_path');

$router->map('GET','/', 'StaticPagesController#start', 'root_path');
$router->map('GET','/regulamin', 'StaticPagesController#regulamin', 'regulamin_path');

$router->map('GET','/panel/product-categories', 'ProductCategoriesController#index', 'product_categories_path');
$router->map('GET','/panel/product-categories/new', 'ProductCategoriesController#new', 'product_categories_new_path');
$router->map('POST','/panel/product-categories', 'ProductCategoriesController#create', 'product_categories_create_path');
$router->map('GET','/panel/product-categories/[i:id]', 'ProductCategoriesController#show', 'product_categories_show_path');


Config::set('router', $router);

$method = $_SERVER['REQUEST_METHOD'];
if (isset($_POST) and isset($_POST['_method'])) {
    $method = $_POST['_method'];
}
// Match the current request
$match = $router->match(null, $method);
