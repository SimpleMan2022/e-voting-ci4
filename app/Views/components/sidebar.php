<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="/dashboard">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="i/dashboard">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="<?= url_is('dashboard') ? 'active' : ''; ?>"><a class="nav-link active " href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
      <li class="<?= url_is('') ? 'active' : ''; ?>"><a class="nav-link active " href="/"><i class="fas fa-columns"></i> <span>Main Page</span></a></li>
      </li>
      <li class="menu-header">Starter</li>
      <li class="<?= url_is('dashboard/voters') ? 'active' : ''; ?>"><a class="nav-link" href="/dashboard/voters"><i class="far fa-user"></i> <span>Voters</span></a></li>
      <li class="<?= url_is('dashboard/classes') ? 'active' : ''; ?>"><a class="nav-link" href="/dashboard/classes"><i class="fas fa-school"></i> <span>Classes</span></a></li>
      <li class="<?= url_is('dashboard/groups') ? 'active' : ''; ?>"><a class="nav-link" href="/dashboard/groups"><i class="fas fa-users"></i> <span>Groups</span></a></li>
      <li class="dropdown <?= url_is('dashboard/candidates*') ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown "><i class="fas fa-user"></i> <span>Candidates</span></a>
        <ul class="dropdown-menu">
          <li class="<?= url_is('dashboard/candidates') ? 'active' : ''; ?>"><a class="nav-link" href="/dashboard/candidates"><span>List Candidates</span></a></li>
          <li class="<?= url_is('dashboard/candidates/experience*') ? 'active' : ''; ?>"><a class="nav-link" href="/dashboard/candidates/experiences"><span>Candidate Experiences</span></a></li>
        </ul>
      </li>


      </li>
  </aside>
</div>