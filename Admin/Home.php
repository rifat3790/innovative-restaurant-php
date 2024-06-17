<!DOCTYPE html>
<html lang="en" data-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Home</title>
    <link
      href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css"
      rel="stylesheet"
      type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <section>
      <nav>
        <div class="navbar bg-base-100">
          <div class="navbar-start">
            <div class="dropdown">
              <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
              </div>
              <ul
                tabindex="0"
                class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="Home.php">Home</a></li>
                
                <li><a href="Add-Items.php">Add Items</a></li>
                <li><a href="Update-items.php">Manage Items</a></li>
              </ul>
            </div>
            <a class="btn btn-ghost text-xl">Innovative <br> Restaurant</a>
          </div>
          <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
              <li><a href="Home.php">Home</a></li>
             
              <li><a href="Add-Items.php">Add Items</a></li>
              <li><a href="Update-items.php">Manage Items</a></li>
            </ul>
          </div>
          <div class="navbar-end">
            <a href="../index.php" class="btn">Client</a>
          </div>
        </div>
      </nav>
    </section>

    <section>
      <h1 class="text-center text-4xl font-bold">Hi, Welcome Back!</h1>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-8 gap-5">
        <!-- 1st -->
        <div class="stats shadow w-[293px] h-[150px] text-center items-center bg-gradient-to-r from-[#BB34F5] to-[#FCDBFF]">
          <div class="stat">
            <div class="stat-figure text-secondary">
              <i class="fa-solid fa-square-poll-vertical text-8xl"></i>
            </div>
            <div class="stat-value">100</div>
            <div class="stat-title">Revenue</div>
          </div>
        </div>

        <!-- 2nd -->
        <div class="stats shadow w-[293px] h-[150px] text-center items-center bg-gradient-to-r from-[#D3A256] to-[#FDE8C0]">
          <div class="stat">
            <div class="stat-figure text-secondary">
              <i class="fa-solid fa-person-military-pointing text-8xl"></i>
            </div>
            <div class="stat-value">1500</div>
            <div class="stat-title">Customers</div>
          </div>
        </div>

        <!-- 3rd -->
        <div class="stats shadow w-[293px] h-[150px] text-center items-center bg-gradient-to-r from-[#FE4880] to-[#FECDE9]">
          <div class="stat">
            <div class="stat-figure text-secondary">
              <i class="fa-solid fa-utensils text-8xl"></i>
            </div>
            <div class="stat-value">103</div>
            <div class="stat-title">Products</div>
          </div>
        </div>

        <!-- 4th -->
        <div class="stats shadow w-[293px] h-[150px] text-center items-center bg-gradient-to-r from-[#6AAEFF] to-[#B6F7FF]">
          <div class="stat">
            <div class="stat-figure text-secondary">
              <i class="fa-solid fa-car text-8xl"></i>
            </div>
            <div class="stat-value">500</div>
            <div class="stat-title">Orders</div>
          </div>
        </div>

      </div>
    </section>

    <footer class="footer p-10 bg-base-200 text-base-content mt-10">
  <nav>
    <h6 class="footer-title">Services</h6> 
    <a class="link link-hover">Branding</a>
    <a class="link link-hover">Design</a>
    <a class="link link-hover">Marketing</a>
    <a class="link link-hover">Advertisement</a>
  </nav> 
  <nav>
    <h6 class="footer-title">Company</h6> 
    <a class="link link-hover">About us</a>
    <a class="link link-hover">Contact</a>
    <a class="link link-hover">Jobs</a>
    <a class="link link-hover">Press kit</a>
  </nav> 
  <nav>
    <h6 class="footer-title">Legal</h6> 
    <a class="link link-hover">Terms of use</a>
    <a class="link link-hover">Privacy policy</a>
    <a class="link link-hover">Cookie policy</a>
  </nav> 
  <form>
    <h6 class="footer-title">Newsletter</h6> 
    <fieldset class="form-control w-80">
      <label class="label">
        <span class="label-text">Enter your email address</span>
      </label> 
      <div class="join">
        <input type="text" placeholder="username@site.com" class="input input-bordered join-item" /> 
        <button class="btn btn-primary join-item">Subscribe</button>
      </div>
    </fieldset>
  </form>
</footer>
  </body>
</html>
