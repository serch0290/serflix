<header class="site-header green-bg">
   <div class="container h-60">
   <!--<i class="fa-solid fa-align-justify"></i>-->
      <div class="row justify-content align-center-items-lg align-center-lt-lg h-100-p">
       <div>
         <!--Aqui va el logo-->
            <a href="/serflix">
              <img src="/serflix-seo/assets/images/logo.png" class="px-8" />
            </a>
       </div>
       <div>
         <!--Aqui va el buscador-->
         <input type="text" placeholder="Buscar" class="input-search" />
       </div>
       <div class="nav-active">
         <div class="show-mobile-menu white-fg">
            <i class="fa-solid fa-align-justify pointer" onClick="expandMenu();"></i>
         </div>
         <!--Aqui va el menu de opciones-->
         <ul class="menu">
            <li class="link-menu">
                <a href="#menuA" >
                    <span class="menu-title">MenuC</span>
                </a>
                <ul class="menu-dropdown">
                    <li>
                        <a href="#submenua">submenu a</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#menuB" class="link-menu">
                  <span class="menu-title">MenuC</span>
                </a>
            </li>
            <li>
                <a href="#menuC" class="link-menu">
                   <span class="menu-title">MenuC</span>
                </a>
            </li>
            <li>
                <a href="#menuA" class="link-menu">
                    <span class="menu-title">MenuC</span>
                </a>
            </li>
            <li>
                <a href="#menuA" class="link-menu">
                    <span class="menu-title">MenuD</span>
                </a>
            </li>
            <li>
                <a href="#menuA" class="link-menu">
                    <span class="menu-title">MenuE</span>
                </a>
            </li>
         </ul>

          <!--Menú responsivo-->
          <div class="slide-menu green-bg">
            <div class="slide-menu-header">
                <div class="col-10 flex-center">
                    <strong class="white-fg font-size-20">Menú</strong>
                </div>
                <div class="col-2 flex-center">
                   <i class="fa-sharp fa-solid fa-circle-xmark icon-menu pointer font-size-20 white-fg" onclick="expandMenu();"></i>
                </div>
            </div>
            <div class="slide-menu-flex">
                <div class="mobile-menu">
                    <ul class="main-mobile-nav">
                        <li class="has-sub" onclick="expandSubMenu(this)">
                            <a >MenuC</a>
                               <ul class="sub-menu m-sub">
                                    <li>
                                        <a  href="#submenuA">submenu a</a>
                                    </li>
                                    <li>
                                        <a>submenu b</a>
                                    </li>
                                    <li>
                                        <a>submenu c</a>
                                    </li>
                                    <li>
                                        <a>submenu d</a>
                                    </li>
                                </ul>
                            <div class="submenu-toggle"></div>
                        </li>
                        <li>
                            <a>
                               MenuC
                            </a>
                        </li>
                        <li>
                            <a>
                               MenuC
                            </a>
                        </li>
                        <li>
                            <a>
                               MenuC
                            </a>
                        </li>
                        <li>
                            <a>
                               MenuC
                            </a>
                        </li>
                    </ul>
                
                </div>
            </div>
          </div>
       </div>
      </div>
   </div>
</header>