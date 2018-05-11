<nav class="bs-docs-sidebar">
    <ul class="nav nav-stacked sidebar">
        <li class="{{ setActive([getAppName().'/admin/expertise','admin/expertise/*']) }}">
            <a title="Expertise" href="{{ urlAppName('/admin/expertise') }}">Expertise</a>
        </li>
        <li class="{{ setActive([getAppName().'/admin/sub-categories','admin/sub-categories/*']) }}">
            <a title="Sub-Categories" href="{{ urlAppName('/admin/sub-categories') }}">Sub-Categories</a>
        </li>
        <li class="{{ setActive([getAppName().'/admin/categories','admin/categories/*']) }}">
            <a title="Categories" href="{{ urlAppName('/admin/categories') }}">Categories</a>
        </li>
    </ul>
</nav>