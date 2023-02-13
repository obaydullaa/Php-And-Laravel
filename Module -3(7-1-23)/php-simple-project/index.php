
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased font-sans">

        <div class="bg-white">

            <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl mb-20">Products</h2>

                <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                <?php
                  include_once 'data.php';
                  include_once 'libary.php';
                    // we use easy manage heardoc

                  foreach($products as $product){
                    displayProduct($product);
                  }
                  

                ?>


                   
                </div>
            </div>
        </div>

</body>

</html>