<div class="vertical-menu">

    <div data-simplebar class="h-100">



        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="index.html" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('home.slider')}}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Home Slider</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-info-circle"></i>
                        <span>About Page</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('about.info.page')}}">Add About</a></li>
                        <li><a href="{{route('add.skills.images')}}">Add Skill Images</a></li>
                        <li><a href="{{route('all.skill.images')}}">About Skill Images</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-briefcase"></i>
                        <span>Portofolio</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('add.portofolio')}}">Add Portofolio</a></li>
                        <li><a href="{{route('list.portofolio')}}">Portofolio List</a></li>
                     
                    </ul>
                </li>
            

                <li class="menu-title">Blogs</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fab fa-blogger"></i>
                        <span>Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('blog.create.category')}}">Add Blog Category</a></li>
                        <li><a href="{{route('blog.categories')}}">Category List</a></li>
                        
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fab fa-blogger text-info"></i>
                        <span>Blogs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('blog.create')}}">Add Blog</a></li>
                        <li><a href="{{route('all.blog.list')}}">All Blogs</a></li>
                        
                    </ul>
                </li>

                <li class="menu-title">Footer</li>
                
                <li>
                    <a href="{{route('footer')}}" class="has-arrow waves-effect">
                        <i class="fas fa-sort-amount-down-alt"></i>
                        <span>Footer</span>
                    </a>
                    
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
