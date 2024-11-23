 <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
 
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="index.html">
                        <img src="{{ asset('assets/images/btr.jpg') }}" alt="logo" /> 
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                        <img src="assets/images/logo-mini.svg" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item fw-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">hello, <span class="text-black fw-bold">Ahari Ardiansyah</span></h1>
                        <h3 class="welcome-sub-text"> Administrator  </h3>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <!-- Dropdown Profil Pengguna -->
                    <li class="nav-item dropdown user-dropdown">
                      <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="img-xs rounded-circle" src="{{ asset('assets/images/faces/user.jpg') }}" alt="Profile image">
                      </a>
                      <div class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="UserDropdown">
                        <!-- Header Profil -->
                        <div class="dropdown-header text-center bg-light py-3">
                          <img class="img-md rounded-circle mb-2" src="{{ asset('assets/images/faces/user.jpg') }}" alt="Profile image">
                          <p class="mb-1 mt-2 fw-bold text-dark">Ahari Ardiansyah</p>
                          <p class="fw-light text-muted mb-0">Ahariardiansyah@gmail.com</p>
                        </div>
                       
                        </a>
                        <!-- Form Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <button type="submit" class="dropdown-item d-flex align-items-center">
                            <i class="mdi mdi-power text-danger me-2"></i>
                            Sign Out
                          </button>
                        </form>
                      </div>
                    </li>
                  </ul>
                 
                  
            </div>
        </nav>