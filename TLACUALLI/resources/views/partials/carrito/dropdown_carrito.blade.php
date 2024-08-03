<button id="dropdownCartButton" data-dropdown-toggle="dropDownCart" data-dropdown-placement="bottom" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2.5 pr-4 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    <!-- Material Icon -->
    <span class="material-icons text-sm mr-2">shopping_cart</span>
    Carrito
    <svg class="w-2 h-2 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg>
</button>


<!-- Dropdown menu -->
<div id="dropDownCart" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
  <ul class="h-48 py-2 overflow-y-auto text-gray-700 dark:text-gray-200" aria-labelledby="dropdownCartButton">
    <li>
      <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
        <img class="w-6 h-6 me-2 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
        Jese Leos
      </a>
    </li>
    <li>
      <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
        <img class="w-6 h-6 me-2 rounded-full" src="/docs/images/people/profile-picture-2.jpg" alt="Jese image">
        Robert Gough
      </a>
    </li>
</div>
