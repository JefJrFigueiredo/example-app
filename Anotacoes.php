<?php
# CRUD de Produtos
/*
database/migrations       -> create_products_table
app/Http/Requests         -> StoreProductRequest
                          -> UpdateProductRequest
routes/                   -> web
                          -> ProductController
app/Models                -> Product
resources/views/products/ -> create
                          -> edit
                          -> index
                          -> layouts
                          -> show

             (GET) -------------> rota -> controller -> model -> view -> request
migration -> (POST) -> request -> rota -> controller -> model -> view -> request */

# Create a Model with Migration, Resource Controller and Requests for Validation
# php artisan make:model Product -mcr --requests

# Update Product Migration
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('code')->unique();
    $table->decimal('unit_price', 8, 2);
    $table->integer('quantity');
    $table->text('description')->nullable();
    $table->timestamps();
});

# Migrate Tables to Database
# php artisan migrate

# Define Product Resource Routes
Route::resource('products', ProductController::class);

# Update Code in Product Model
protected $fillable = ['name', 'description', 'price'];

# Update Code in Product Controller
public function index()                                                  : View{}
public function create()                                                 : View{}
public function store(  StoreProductRequest $request)                    : RedirectResponse{}
public function show(   Product $product)                                : View{}
public function edit(   Product $product)                                : View{}
public function update( UpdateProductRequest $request, Product $product) : RedirectResponse{}
public function destroy(Product $product)                                : RedirectResponse{}

# Update Code in Product Store and Update Requests
public function rules(): array {
    return [
        'code' => 'required|string|max:50|unique:products,code',
        'name' => 'required|string|max:250',
        'quantity' => 'required|integer|min:1|max:10000',
        'price' => 'required',
        'description' => 'nullable|string'
    ];
}

# Create Product Resource Blade View Files 
/*
layouts.blade.php
index.blade.php
create.blade.php
edit.blade.php
show.blade.php
*/

# Run