<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0275d8;">
    <a class="navbar-brand ml-1" href="#">Laptop Choice</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('viewLoan') }}">Loan</a>
          </li>   
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('dashboardUnit') }}">Unit</a>
          </li>   
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('logout') }}">Logout</a>
          </li>
        </ul>
        <span class="nav-text"></span>
      </div>
</nav>