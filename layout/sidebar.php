<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Estoque ETEC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/zoro.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Lucas Rocha</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="./home.php" class="nav-link" onclick="setActive(this)">
              <i class="nav-icon fas fa-solid fa-chart-pie"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="./estoque.php" class="nav-link" onclick="setActive(this)">
              <i class="nav-icon fas fa-solid fa-box"></i>
              <p>
                Estoque
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link" onclick="setActive(this)">
              <i class="nav-icon fas fa-solid fa-folder"></i>
              <p>
                Departamentos
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link" onclick="setActive(this)">
              <i class="nav-icon fas fa-solid fa-chart-line"></i>
              <p>
                Relatórios
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" onclick="setActive(this)">
              <i class="nav-icon fas fa-regular fa-comments"></i>
              <p>
                Suporte
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
function setActive(element) {
            // Remove a classe 'active' de todos os links
            const links = document.querySelectorAll('.nav-link');
            links.forEach(link => link.classList.remove('active'));

            // Adiciona a classe 'active' ao link clicado
            element.classList.add('active');
        }

        // Marcar o item ativo com base na URL atual
        document.addEventListener('DOMContentLoaded', () => {
            const currentUrl = window.location.href;
            const menuItems = document.querySelectorAll('.nav-link');
            menuItems.forEach(item => {
                if (item.href === currentUrl) {
                    item.classList.add('active');
                }
            });
        });
</script>
