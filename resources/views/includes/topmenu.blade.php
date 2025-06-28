<nav class="hidden md:block" :class="{'block!': showTopMenu}">
  <div class="flex top-menu gap-x-4">
    <a href="/article">
      Articles
    </a>
    <a href="/donate">
      <span role="img" aria-label="heart" class="anticon anticon-heart">
        @include('includes.icons.heart')
      </span> Donate</a>
    <div class="header-inner__toggle" @click="toggleTheme">
      <span role="img" aria-label="moon" class="anticon anticon-moon">
        @include('includes.icons.moon')
      </span>
      <span role="img" aria-label="sun" class="anticon anticon-sun">
        @include('includes.icons.sun')
      </span> Toggle theme</div>
  </div>
</nav>