/**
*  94 [ORM] Meet Eloquent ORM
*/

/**
*  95 [ORM] Model Naming Conventions
*/

name -> table name Brands -> Model name Brand 

if not maintains naming convention then detected table this way :
    protected $primaryKey='brand_id';
    protected $table='brands';

    protected $attributes = [
        'brandName' => 'default Brand',
        'brandImg' => 'default.jpg',
        ]