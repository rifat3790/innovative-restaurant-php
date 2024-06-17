<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link
      href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css"
      rel="stylesheet"
      type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <!-- banner start -->
     <!-- banner start -->
    <div class="hero min-h-screen" style="background-image: url(https://i.ibb.co/1Gq63CL/03.png);">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Innovative Restaurant Solution</h1>
                <p class="mb-5">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                <button class="btn btn-primary">Get Started</button>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- items start -->
    <section class="mt-20 max-w-4xl mx-auto">
        <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
            <!-- 1st card -->
            <div class="card w-90 h-80 shadow-xl image-full">
                <figure><img class="w-full" src="assets/home/slide2.jpg" alt="Pizza" /></figure>
                <div class="card-body">
                    <h2 class="card-title text-3xl">Pizza</h2>
                    <div class="card-actions justify-end"></div>
                </div>
            </div>

            <!-- 2nd card -->
            <div class="card w-90 h-80 shadow-xl image-full">
                <figure><img class="w-full" src="assets/home/slide3.jpg" alt="Soups" /></figure>
                <div class="card-body">
                    <h2 class="card-title text-3xl">Soups</h2>
                    <div class="card-actions justify-end"></div>
                </div>
            </div>

            <!-- 3rd card -->
            <div class="card w-90 h-80 shadow-xl image-full">
                <figure><img class="w-full" src="assets/home/slide4.jpg" alt="Desserts" /></figure>
                <div class="card-body">
                    <h2 class="card-title text-3xl">Desserts</h2>
                    <div class="card-actions justify-end"></div>
                </div>
            </div>

            <!-- 4th card -->
            <div class="card w-90 h-80 shadow-xl image-full">
                <figure><img class="w-full" src="assets/home/slide5.jpg" alt="Salads" /></figure>
                <div class="card-body">
                    <h2 class="card-title text-3xl">Salads</h2>
                    <div class="card-actions justify-end"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- items end -->

    <!-- menu start -->
    <section class="mt-20 ">
        <h4 class="text-center text-[#D99904]">---Check it out---</h4>
        <hr>
        <h1 class="text-center mt-10">FROM OUR MENU</h1>
        <hr>
        <div class="bg-gray-100 mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- 1st card -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div>
                            <img class="rounded-full" src="assets/menu/product2.jpg" alt="ROAST DUCK BREAST">
                        </div>
                        <div class="ml-4">
                            <h2 class="text-lg font-bold">ROAST DUCK BREAST</h2>
                            <p class="text-gray-500">Roasted duck breast (served pink) with gratin potato and a griotine cherry sauce</p>
                        </div>
                    </div>
                    <div class="text-gold-500 text-xl font-bold">$14.5</div>
                </div>
            </div>

            <!-- 2nd card  -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div>
                            <img class="rounded-full" src="assets/menu/product2.jpg" alt="ROAST DUCK BREAST">
                        </div>
                        <div class="ml-4">
                            <h2 class="text-lg font-bold">ROAST DUCK BREAST</h2>
                            <p class="text-gray-500">Roasted duck breast (served pink) with gratin potato and a griotine cherry sauce</p>
                        </div>
                    </div>
                    <div class="text-gold-500 text-xl font-bold">$14.5</div>
                </div>
            </div>

            <!-- 3rd card -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div>
                            <img class="rounded-full" src="assets/menu/product3.jpg" alt="ROAST DUCK BREAST">
                        </div>
                        <div class="ml-4">
                            <h2 class="text-lg font-bold">ROAST DUCK BREAST</h2>
                            <p class="text-gray-500">Roasted duck breast (served pink) with gratin potato and a griotine cherry sauce</p>
                        </div>
                    </div>
                    <div class="text-gold-500 text-xl font-bold">$14.5</div>
                </div>
            </div>

            <!-- 4th card -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div>
                            <img class="rounded-full" src="assets/menu/product1.jpg" alt="ROAST DUCK BREAST">
                        </div>
                        <div class="ml-4">
                            <h2 class="text-lg font-bold">ROAST DUCK BREAST</h2>
                            <p class="text-gray-500">Roasted duck breast (served pink) with gratin potato and a griotine cherry sauce</p>
                        </div>
                    </div>
                    <div class="text-gold-500 text-xl font-bold">$14.5</div>
                </div>
            </div>

            <!-- 5th card -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div>
                            <img class="rounded-full" src="assets/menu/product2.jpg" alt="ROAST DUCK BREAST">
                        </div>
                        <div class="ml-4">
                            <h2 class="text-lg font-bold">ROAST DUCK BREAST</h2>
                            <p class="text-gray-500">Roasted duck breast (served pink) with gratin potato and a griotine cherry sauce</p>
                        </div>
                    </div>
                    <div class="text-gold-500 text-xl font-bold">$14.5</div>
                </div>
            </div>

            <!-- 6th card -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div>
                            <img class="rounded-full" src="assets/menu/product3.jpg" alt="ROAST DUCK BREAST">
                        </div>
                        <div class="ml-4">
                            <h2 class="text-lg font-bold">ROAST DUCK BREAST</h2>
                            <p class="text-gray-500">Roasted duck breast (served pink) with gratin potato and a griotine cherry sauce</p>
                        </div>
                    </div>
                    <div class="text-gold-500 text-xl font-bold">$14.5</div>
                </div>
            </div>
        </div>
        <div class="mt-5 flex justify-center items-center">
            <a href="our-shop.php"><button class="btn btn-secondary">View Full Menu</button></a>
        </div>
    </section>
    <!-- end menu -->
  <!-- footer start -->
<?php include 'footer.php'; ?>
<!-- footer end -->
</body>
</html>