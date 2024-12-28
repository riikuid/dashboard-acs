{{-- <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>

 <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full py-4 overflow-y-auto bg-white-50 ">
       <ul class="space-y-2 font-medium">
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg group">
                <svg class="w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                   <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                   <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                </svg>
                <span class="ms-3">Dashboard</span>
             </a>
          </li>


          <li>
            <x-side-link :href="route('dashboard.person.index')" :active="request()->routeIs('dashboard.person.*')" wire:navigate>
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                 </svg>
                 <span class="flex-1 ms-3 text-large whitespace-nowrap">Person</span>
            </x-side-link>
          </li>

       </ul>
    </div>
 </aside> --}}

<nav class="navbar bg-base-100 max-sm:rounded-box max-sm:shadow sm:border-b border-base-content/25 sm:z-[1] relative">
    <button type="button" class="btn btn-text max-sm:btn-square sm:hidden me-2" aria-haspopup="dialog"
        aria-expanded="false" aria-controls="default-sidebar" data-overlay="#default-sidebar">
        <span class="icon-[tabler--menu-2] size-5"></span>
    </button>
    <div class="flex flex-1 items-center">
        <a class="link text-base-content/90 link-neutral text-xl font-semibold no-underline" href="#">
            FlyonUI
        </a>
    </div>
    <div class="navbar-end flex items-center gap-4">
        <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
            <button id="dropdown-scrollable" type="button"
                class="dropdown-toggle btn btn-text btn-circle dropdown-open:bg-base-content/10 size-10"
                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <div class="indicator">
                    <span class="indicator-item bg-error size-2 rounded-full"></span>
                    <span class="icon-[tabler--bell] text-base-content size-[1.375rem]"></span>
                </div>
            </button>
            <div class="dropdown-menu dropdown-open:opacity-100 hidden" role="menu" aria-orientation="vertical"
                aria-labelledby="dropdown-scrollable">
                <div class="dropdown-header justify-center">
                    <h6 class="text-base-content/90 text-base">Notifications</h6>
                </div>
                <div
                    class="vertical-scrollbar horizontal-scrollbar rounded-scrollbar text-base-content/80 max-h-56 overflow-auto max-md:max-w-60">
                    <div class="dropdown-item">
                        <div class="avatar away-bottom">
                            <div class="w-10 rounded-full">
                                <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar 1" />
                            </div>
                        </div>
                        <div class="w-60">
                            <h6 class="truncate text-base">Charles Franklin</h6>
                            <small class="text-base-content/50 truncate">Accepted your connection</small>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="avatar">
                            <div class="w-10 rounded-full">
                                <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-2.png" alt="avatar 2" />
                            </div>
                        </div>
                        <div class="w-60">
                            <h6 class="truncate text-base">Martian added moved Charts & Maps task to the done board.
                            </h6>
                            <small class="text-base-content/50 truncate">Today 10:00 AM</small>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="avatar online-bottom">
                            <div class="w-10 rounded-full">
                                <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-8.png" alt="avatar 8" />
                            </div>
                        </div>
                        <div class="w-60">
                            <h6 class="truncate text-base">New Message</h6>
                            <small class="text-base-content/50 truncate">You have new message from Natalie</small>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="avatar placeholder">
                            <div class="bg-neutral text-neutral-content w-10 rounded-full p-2">
                                <span class="icon-[tabler--user] size-full"></span>
                            </div>
                        </div>
                        <div class="w-60">
                            <h6 class="truncate text-base">Application has been approved 🚀</h6>
                            <small class="text-base-content/50 text-wrap">Your ABC project application has been
                                approved.</small>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="avatar">
                            <div class="w-10 rounded-full">
                                <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-10.png" alt="avatar 10" />
                            </div>
                        </div>
                        <div class="w-60">
                            <h6 class="truncate text-base">New message from Jane</h6>
                            <small class="text-base-content/50 text-wrap">Your have new message from Jane</small>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="avatar">
                            <div class="w-10 rounded-full">
                                <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-3.png" alt="avatar 3" />
                            </div>
                        </div>
                        <div class="w-60">
                            <h6 class="truncate text-base">Barry Commented on App review task.</h6>
                            <small class="text-base-content/50 truncate">Today 8:32 AM</small>
                        </div>
                    </div>
                </div>
                <a href="#" class="dropdown-footer justify-center gap-1">
                    <span class="icon-[tabler--eye] size-4"></span>
                    View all
                </a>
            </div>
        </div>
        <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
            <button id="dropdown-scrollable" type="button" class="dropdown-toggle flex items-center"
                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <div class="avatar">
                    <div class="size-9.5 rounded-full">
                        <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar 1" />
                    </div>
                </div>
            </button>
            <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" role="menu"
                aria-orientation="vertical" aria-labelledby="dropdown-avatar">
                <li class="dropdown-header gap-2">
                    <div class="avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar" />
                        </div>
                    </div>
                    <div>
                        <h6 class="text-base-content/90 text-base font-semibold">John Doe</h6>
                        <small class="text-base-content/50">Admin</small>
                    </div>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <span class="icon-[tabler--user]"></span>
                        My Profile
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <span class="icon-[tabler--settings]"></span>
                        Settings
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <span class="icon-[tabler--receipt-rupee]"></span>
                        Billing
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <span class="icon-[tabler--help-triangle]"></span>
                        FAQs
                    </a>
                </li>
                <li class="dropdown-footer gap-2">
                    <a class="btn btn-error btn-soft btn-block" href="#">
                        <span class="icon-[tabler--logout]"></span>
                        Sign out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<aside id="default-sidebar"
    class="overlay sm:shadow-none overlay-open:translate-x-0 drawer drawer-start hidden max-w-64 sm:absolute sm:z-0 sm:flex sm:translate-x-0 pt-16"
    role="dialog" tabindex="-1">
    <div class="drawer-body px-2 pt-4">
        <ul class="menu p-0">
            <li>
                <a href="#">
                    <span class="icon-[tabler--home] size-5"></span>
                    Home
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon-[tabler--user] size-5"></span>
                    Account
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon-[tabler--message] size-5"></span>
                    Notifications
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon-[tabler--mail] size-5"></span>
                    Email
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon-[tabler--calendar] size-5"></span>
                    Calendar
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon-[tabler--shopping-bag] size-5"></span>
                    Product
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon-[tabler--login] size-5"></span>
                    Sign In
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon-[tabler--logout-2] size-5"></span>
                    Sign Out
                </a>
            </li>
        </ul>
    </div>
</aside>
