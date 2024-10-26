<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #6ba3f7;">
    <a class="navbar-brand ml-1" href="#">{{ config('app.name') }}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        {{-- <div class="container">
          <a class="navbar-brand" href="{{ url('/')}}">
            <img src="#" alt="Logo" width="auto" height="30" class="d-inline-block align-text-top"></a>
        </div> --}}
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('viewLoan') }}">Loan</a>
          </li>   
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('dashboardUnit') }}">Unit</a>
          </li>   
          <li class="nav-item">
            <a class="nav-link text-light" href="#">Logout</a>
          </li>
        </ul>
        <span class="nav-text"></span>
      </div>
</nav>